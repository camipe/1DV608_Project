<?php

namespace bildflode\model;

use bildflode\model\DAL\ImageDAL;
use bildflode\model\FileUpload;
use bildflode\model\Image;

class InvalidImageTypeException extends \Exception {};

class ImageUploader
{
	/**
	 * Used to save the image to the database.
	 * @var bildflode\model\DAL\ImageDAL
	 */
	private $dal;

	public function __construct()
	{
		$this->dal = new ImageDAL();
	}

	/**
	 * Checks if the file extension is of a valid type (gif or jpeg).
	 * @param  FileUpload $file
	 * @return bool          Returns true if the image is OK.
	 */
	private function verifyImage(FileUpload $file)
	{
		$imageinfo = getimagesize($file->getTempName());
		if ($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') {
			throw new InvalidImageTypeException();
		}
		return true;
	}
	/**
	 * Verifies that the image is correct and move it to storage.
	 * @param  FileUpload $file        The file to be stored
	 * @param  string     $newFilename The new filename after it has been moved.
	 * @return bool		If everything is OK, returns true else false
	 */
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

	/**
	 * Uploads image to the storage and saves information the database.
	 * The file name is the hash of the file to avoid duplicates of the same
	 * file even if they have different names originally.
	 * @param  FileUpload $file        File to be uploaded.
	 * @param  [type]     $description Optional description
	 * @return void
	 */
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
