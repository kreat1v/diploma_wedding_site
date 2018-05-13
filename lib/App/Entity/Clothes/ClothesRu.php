<?php

namespace App\Entity\Clothes;

class ClothesRu extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'clothes_ru';
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
			'text',
			'contacts',
			'id_language'
		];
	}
}
