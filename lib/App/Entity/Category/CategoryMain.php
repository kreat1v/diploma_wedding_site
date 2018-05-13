<?php

namespace App\Entity\Category;

class CategoryMain extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'category_main';
	}

	public function checkFields($data)
	{
		// if (!is_string($data['title']) || !strlen($data['title'])) {
		// 	throw new \Exception('Category title can\'t be empty');
		// }
	}

	public function getFields()
	{
		return [
			'id',
			'active'
		];
	}
}
