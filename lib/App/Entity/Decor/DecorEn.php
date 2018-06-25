<?php

namespace App\Entity\Decor;

class DecorEn extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'decor_en';
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
			'id_decor',
			'title',
			'text',
			'contacts',
			'id_language'
		];
	}
}
