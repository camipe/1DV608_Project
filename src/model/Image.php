<?php

namespace bildflode\model;

class Image
{
	private $name = '';
	private $description = '';

	public function __construct($name, $description = '')
	{
		if (mb_strlen($name) <= 0) {
			throw new \Exception("Name cannot be empty.");
		}
		$this->name = $name;
		$this->description = $description;
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
}
