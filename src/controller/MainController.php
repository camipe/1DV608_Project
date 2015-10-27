<?php
namespace bildflode\controller;

use bildflode\view\UploadView;
use bildflode\view\FeedView;
use bildflode\model\ImageUploader;

class MainController
{
	private $uploadView;
	private $feedView;
	private $imageUploader;

	public function __construct()
	{
		$this->uploadView = new UploadView();
		$this->feedView = new FeedView();
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
		$html = $this->uploadView->createForm();

		$html .= $this->feedView->render();

		return $html;
	}
}
