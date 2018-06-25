<?php

namespace App\Entity\Filming;

class FilmingEn extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'filming_en';
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
			'id_filming',
			'title',
			'text',
			'contacts',
			'service',
			'id_language'
		];
	}
}
