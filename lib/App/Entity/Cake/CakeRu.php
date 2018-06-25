<?php

namespace App\Entity\Cake;

class CakeRu extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'cake_ru';
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
			'id_cake',
			'title',
			'text',
			'contacts',
			'service',
			'id_language'
		];
	}
}
