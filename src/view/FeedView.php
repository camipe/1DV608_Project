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

	private function getImageTag(Image $image)
	{
		return '<img src="' . \Settings::IMAGEFOLDER . $image->getName() . '.' . $image->getExtension() .  '">';
	}

	private function getDescriptionTag(Image $image)
	{
		return '<blockquote><p>' . $image->getDescription() . '</p></blockquote>';

	}

	public function render()
	{
		$html = '<div class="feed">';

		$images = $this->dal->getAll();
		foreach ($images as $image)  {
			$html .= '<div class="feed-element">';
			$html .= $this->getImageTag($image);

			if ($image->getDescription()) {
				$html .= '<div class="desc-container">';
				$html .= $this->getDescriptionTag($image);
				$html .= '</div>';
			}

			$html .= '</div>';
		}

		$html .= '</div';
		return $html;
	}
}
