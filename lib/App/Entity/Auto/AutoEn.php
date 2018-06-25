<?php

namespace App\Entity\Auto;

class AutoEn extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'auto_en';
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
			'id_auto',
			'title',
			'text',
			'contacts',
			'id_language'
		];
	}
}
