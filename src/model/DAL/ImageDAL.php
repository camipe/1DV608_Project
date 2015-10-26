<?php

namespace bildflode\model\DAL;

use bildflode\model\Image;

class ImageDAL extends DbConnection
{
	public function save(Image $image)
	{
		$stmt = $this->db->prepare('INSERT INTO image (name, description) VALUE (?,?)');
    	$stmt->execute(array($image->getName(), $image->getDescription()));
	}
}
