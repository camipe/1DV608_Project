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

	/**
	 * Takes a file upload array ($_FILES) and saves the different
	 * elements to private variables.
	 * Also runs some validation.
	 * @param Array $file
	 */
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

	/**
	 * Returns the name of the uploaded file.
	 * @return [string]
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Returns the MIME type of the uploaded file.
	 * @return string
	 */
	public function getType()
	{
		return $this->name;
	}

	/**
	 * Returns the file extension of the uploaded file.
	 * @return string
	 */
	public function getExtension()
	{
		return $this->extension;
	}

	/**
	 * Returns the size of the uploaded file in bytes.
	 * @return int
	 */
	public function getSize()
	{
		return $this->type;
	}
	/**
	 * Returns the path where the uploaded file is temporarily saved.
	 * @return string
	 */
	public function getTempName()
	{
		return $this->tempName;
	}
}
