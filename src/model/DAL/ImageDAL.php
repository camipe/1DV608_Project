<?php

namespace bildflode\model\DAL;

use bildflode\model\Image;
use bildflode\model\DAL\DbConnection;

class ImageDAL
{
	private $connection;

	public function __construct()
	{
		$conn = new DbConnection();
		$this->connection = $conn->getConnection();
	}

	public function save(Image $image)
	{
		$stmt = $this->connection->prepare('INSERT INTO image (name, description) VALUE (?,?)');
    	$stmt->execute(array($image->getName(), $image->getDescription()));
	}

	public function getAll()
	{
		$images = array();

		$stmt = $this->connection->prepare('SELECT * FROM image ORDER BY id');
		$stmt->execute();

		while ($image = $stmt->fetchObject()) {
			$images[] = new Image($image->name, $image->description);
		}

		return $images;
	}
}
