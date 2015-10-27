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
			$upload = $this->uploadView->getFileUpload();
			if (is_null($upload) == false) {
				try {
					$this->imageUploader->upload($upload);
					$this->uploadView->redirect();
				} catch (\bildflode\model\InvalidImageTypeException $e) {
					$this->uploadView->setInvalidFile();
				}


			}
		}
		return $this->uploadView->createForm();
	}
}
