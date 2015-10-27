<?php
namespace bildflode\controller;

use bildflode\view\UploadView;
use bildflode\view\FeedView;
use bildflode\model\ImageUploader;

class MainController
{
	/**
	* @var bildflode\view\UploadView
	*/
	private $uploadView;
	/**
	* @var bildflode\view\FeedView
	*/
	private $feedView;
	/**
	* @var bildflode\model\ImageUploader
	*/
	private $imageUploader;

	public function __construct()
	{
		$this->uploadView = new UploadView();
		$this->feedView = new FeedView();
		$this->imageUploader = new ImageUploader();
	}

	/**
	 * Runs the file upload process and returns the file upload form
	 * and the image feed as html.
	 * @return string HTML
	 */
	public function run()
	{
		if ($this->uploadView->wantsToUpload()) {
			$upload = $this->uploadView->getFileUpload();
			$description = $this->uploadView->getDescription();

			if (is_null($upload) == false) {
				try {
					$this->imageUploader->upload($upload, $description);
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
