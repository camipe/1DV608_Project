<?php

namespace bildflode\model;

class Image
{
	private $name = '';
	private $description = '';
	private $extension = '';

	public function __construct($name, $description = '', $extension = '')
	{
		if (mb_strlen($name) <= 0) {
			throw new \Exception("Name cannot be empty.");
		}
		$this->name = $name;
		$this->description = $description;
		$this->extension = $extension;
	}

	/**
	 * Returns the image name.
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Returns the image description.
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Returns the image file extension.
	 * @return string 
	 */
	public function getExtension()
	{
		return $this->extension;
	}
}
