<?php

namespace bildflode\model\DAL;

use bildflode\model\Image;
use bildflode\model\DAL\DbConnection;

class ImageDAL
{
	/**
	 * Connection used to save and get image objects from database.
	 * @var bildflode\model\DAL\DbConnection
	 */
	private $connection;

	public function __construct()
	{
		$conn = new DbConnection();
		$this->connection = $conn->getConnection();
	}
	/**
	 * Saves image to database.
	 * @param  Image  $image
	 * @return void
	 */
	public function save(Image $image)
	{
		$stmt = $this->connection->prepare('INSERT INTO image (name, description, extension) VALUE (?,?,?)');
    	$stmt->execute(array($image->getName(), $image->getDescription(), $image->getExtension()));
	}

	/**
	 * Retrieves all images from database.
	 * @return array An array of all images.
	 */
	public function getAll()
	{
		$images = array();

		$stmt = $this->connection->prepare('SELECT * FROM image ORDER BY id DESC');
		$stmt->execute();

		while ($image = $stmt->fetchObject()) {
			$images[] = new Image($image->name, $image->description, $image->extension);
		}

		return $images;
	}
}
