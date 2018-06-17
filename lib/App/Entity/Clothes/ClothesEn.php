<?php

namespace App\Entity\Clothes;

class ClothesEn extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'clothes_en';
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
