<?php

namespace App\Entity\Clothes;

class ClothesSize extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'clothes_size';
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
			's',
			'm',
			'l',
			'xl'
		];
	}
}
