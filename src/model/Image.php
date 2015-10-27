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

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getExtension()
	{
		return $this->extension;
	}
}
