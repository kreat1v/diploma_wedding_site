<?php

namespace App\Entity\Auto;

class AutoRu extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'auto_ru';
	}

	public function checkFields($data)
	{}

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
