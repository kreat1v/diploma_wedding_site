<?php

namespace App\Entity\Clothes;

class ClothesRu extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'clothes_ru';
	}

	public function checkFields($data)
	{}

	public function getFields()
	{
		return [
			'id',
			'id_clothes',
			'title',
			'text',
			'contacts',
			'id_language'
		];
	}
}
