<?php

namespace bildflode\view;

use bildflode\model\DAL\ImageDAL;
use bildflode\model\Image;

class FeedView
{
	private $dal;

	public function __construct()
	{
		$this->dal = new ImageDAL();
	}

	public function getImageTag(Image $image)
	{
		return '<img src="' . \Settings::IMAGEFOLDER . $image->getName() .  '" alt="MDN">';
	}

	public function render()
	{
		$html = '<div>';

		$images = $this->dal->getAll();
		foreach ($images as $image)  {
			$html .= '<div class="">';
			$html .= $this->getImageTag($image);
		}

		$html .= '</div';
		return $html;
	}
}
