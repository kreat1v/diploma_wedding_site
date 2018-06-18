<?php

namespace App\Entity\Filming;

class FilmingRu extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'filming_ru';
	}

	public function checkFields($data)
	{}

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
