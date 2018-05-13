<?php

namespace App\Entity\Category;

class CategoryEn extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'category_en';
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
			'id_caregory',
			'title',
			'full_title',
			'first_text',
			'second_text',
			'id_language'
		];
	}
}
