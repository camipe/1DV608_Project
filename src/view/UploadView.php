<?php

namespace bildflode\view;

use bildflode\model\Image;

class UploadView
{
	private static $file = 'UploadView::File';
	private static $upload = 'UploadView::Upload';

	public function wantsToUpload()
	{
		return isset($_POST[self::$upload]);
	}

	public function getRawUpload()
	{
		return $_FILES[self::$file];
	}

	public function createForm()
	{
		$formHTML = "
            <form method='post' enctype='multipart/form-data'>
              	<label for='" . self::$file . "' >Image :</label>
              	<input type='file' name='" . self::$file . "' id='" . self::$file . "' value='' />
              	<input id='' type='submit' name='" . self::$upload . "'  value='Upload' />
			</form>";

		return $formHTML;
    }
}
