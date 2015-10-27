<?php

namespace bildflode\view;

use bildflode\model\Image;
use bildflode\model\FileUpload;

class UploadView
{
	private static $file = 'UploadView::File';
	private static $description = 'UploadView::Description';
	private static $upload = 'UploadView::Upload';
	private static $messageID = 'RegisterView::Message';

	private static $sessionSaveLocation = "\\view\\message";

	private $message = '';

	public function redirect() {
		$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		header("Location: $actual_link");
	}

	public function wantsToUpload()
	{
		return isset($_POST[self::$upload]);
	}

	public function getFileUpload()
	{
		try {
			return new FileUpload($_FILES[self::$file]);
		} catch (\bildflode\model\EmptyUploadException $e) {
			$this->message = "File field can not be empty. Please select a file.";
		} catch (\bildflode\model\UploadFailedException $e) {
			$this->message = "Upload failed. Try again or contact support.";
		} catch (\bildflode\model\FileSizeException $e) {
			$this->message = "File is too big.";
		}
		return null;
	}

	public function getDescription()
	{
		if (isset($_POST[self::$description])) {
			return htmlspecialchars($_POST[self::$description]);
		}
		return '';
	}

	public function setInvalidFile()
	{
		$this->message = "File type is invalid. Must be .jpeg or .gif.";
	}

	public function createForm()
	{
		$formHTML = "
		<div class='form-container'>
            <form method='post' enctype='multipart/form-data' class='upload-form'>
				<p id='" .self::$messageID. "'>" . $this->message . "</p>
				<div class='form-group'>
              		<label for='" . self::$file . "' >Upload an image</label>
              		<input type='file' name='" . self::$file . "' id='" . self::$file . "' value='' />
				</div>
				<div class='form-group'>
              		<label for='" . self::$description . "' >Add an optional description</label>
              		<input type='text' name='" . self::$description . "' class='form-control' id='" . self::$description . "' value='' />
				</div>
				<input id='' type='submit' name='" . self::$upload . "' class='btn btn-default'  value='Upload' />
			</form>
		</div>";

		return $formHTML;
    }
}
