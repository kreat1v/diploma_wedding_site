<?php

namespace App\Entity\Category;

class CategoryRu extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'category_ru';
	}

	public function checkFields($data)
	{
		foreach ($data as $value) {
			if (empty($value) && !strlen($value)) {
				throw new \Exception(__('form.field'));
			}
		}
	}

	public function getFields()
	{
		return [
			'id',
			'id_category',
			'title',
			'full_title',
			'first_text',
			'second_text',
			'id_language'
		];
	}
}
