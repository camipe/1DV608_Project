<?php

namespace bildflode\view;

use bildflode\model\Image;
use bildflode\model\FileUpload;

class UploadView
{
	private static $file = 'UploadView::File';
	private static $upload = 'UploadView::Upload';
	private static $messageID = "RegisterView::Message";

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

	public function setInvalidFile()
	{
		$this->message = "File type is invalid. Must be .jpeg or .gif.";
	}

	public function createForm()
	{
		$formHTML = "
            <form method='post' enctype='multipart/form-data'>
				<p id='".self::$messageID."'>" . $this->message . "</p>
              	<label for='" . self::$file . "' >Image :</label>
              	<input type='file' name='" . self::$file . "' id='" . self::$file . "' value='' />
              	<input id='' type='submit' name='" . self::$upload . "'  value='Upload' />
			</form>";

		return $formHTML;
    }
}
