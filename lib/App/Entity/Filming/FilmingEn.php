<?php

namespace App\Entity\Filming;

class FilmingEn extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'filming_en';
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
