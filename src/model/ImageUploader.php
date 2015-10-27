<?php

namespace bildflode\model;

use bildflode\model\DAL\ImageDAL;
use bildflode\model\FileUpload;
use bildflode\model\Image;

class InvalidImageTypeException extends \Exception {};

class ImageUploader
{

	private $dal;

	public function __construct()
	{
		$this->dal = new ImageDAL();
	}

	private function storeImage(FileUpload $file, $newFilename)
	{
		if ($this->verifyImage($file)) {
			$tempPath = $file->getTempName();
			$newPath = \Settings::IMAGEFOLDER . $newFilename;

			return move_uploaded_file($tempPath, $newPath);
		} else {
			return false;
		}

	}

	private function verifyImage(FileUpload $file)
	{
		$imageinfo = getimagesize($file->getTempName());
		if ($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') {
			throw new InvalidImageTypeException();
		}
		return true;
	}

	public function upload(FileUpload $file, $description = null)
	{
		$newFilename = sha1_file($file->getTempName()) . '.' . $file->getExtension();
		try {
			$image = new Image($newFilename, $description, $file->getExtension());
		} catch (Exception $e) {
			throw $e;
		}

		if ($this->storeImage($file, $newFilename)) {
			$this->dal->save($image);
		}
	}
}
