<?php

namespace App\Entity\Clothes;

class ClothesSize extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'clothes_size';
	}

	public function checkFields($data)
	{}

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
