<?php

namespace bildflode\model;

use bildflode\model\DAL\ImageDAL;
use bildflode\model\Image;

class ImageUploader
{

	private $dal;

	public function __construct()
	{
		$this->dal = new ImageDAL();
	}

	public function upload($fileArray)
	{
		$image = new Image();
		$image->setName($fileArray['tmp_name']);

		$this->dal->save($image);
	}
}
