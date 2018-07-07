<?php

namespace App\Entity;

class Contacts extends Base
{
	public function getTableName()
	{
		return 'contacts';
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
			'ru_text',
			'en_text',
			'ru_address',
			'en_address',
			'email',
			'tel1',
			'tel2',
			'tel3',
			'fb',
			'instagram',
			'telegram'
		];
	}
}
