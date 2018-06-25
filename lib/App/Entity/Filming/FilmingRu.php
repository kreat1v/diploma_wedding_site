<?php

namespace App\Entity\Filming;

class FilmingRu extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'filming_ru';
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
