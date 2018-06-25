<?php

namespace App\Entity\Clothes;

class ClothesEn extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'clothes_en';
	}

	public function checkFields($data)
	{
		foreach ($data as $value) {
			if (empty($value) && !strlen($value) && $value !== null) {
				throw new \Exception(__('form.field'));
			}
		}
	}

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
