<?php
namespace bildflode\controller;

use bildflode\view\UploadView;
use bildflode\model\ImageUploader;

class MainController
{
	private $uploadView;
	private $imageUploader;

	public function __construct()
	{
		$this->uploadView = new UploadView();
		$this->imageUploader = new ImageUploader();
	}

	public function run()
	{
		if ($this->uploadView->wantsToUpload()) {
			$raw = $this->uploadView->getRawUpload();
			$this->imageUploader->upload($raw);
		}
		return $this->uploadView->createForm();
	}
}
