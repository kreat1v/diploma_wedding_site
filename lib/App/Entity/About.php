<?php

namespace App\Entity;

class About extends Base
{
	public function getTableName()
	{
		return 'about';
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
			'en_text'
		];
	}
}
