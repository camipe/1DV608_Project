<?php

namespace bildflode\model;

class UploadFailedException extends \Exception {};
class EmptyUploadException extends \Exception {};
class FileSizeException extends \Exception {};

class FileUpload
{
	private $name;
	private $type;
	private $extension;
	private $size;
	private $tempName;

	public function __construct(Array $file)
	{
		// Check if upload is empty
		if ($file['size'] <= 0) {
			throw new EmptyUploadException();
		}
		// Check upload went OK
		if ($file['error'] != UPLOAD_ERR_OK) {
			throw new UploadFailedException();
		}
		// Validate filesize
		if ($file['size'] > \Settings::MAX_FILE_SIZE) {
			throw new FileSizeException();
		}

		$this->name = $file['name'];
		$this->type = $file['type'];
		$this->extension = pathinfo($file['name'], PATHINFO_EXTENSION);
		$this->size = $file['size'];
		$this->tempName = $file['tmp_name'];
	}

	public function getName()
	{
		return $this->name;
	}

	public function getType()
	{
		return $this->name;
	}

	public function getExtension()
	{
		return $this->extension;
	}

	public function getSize()
	{
		return $this->type;
	}

	public function getTempName()
	{
		return $this->tempName;
	}
}
