<?php

namespace App\Entity\Decor;

class DecorEn extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'decor_en';
	}

	public function checkFields($data)
	{}

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
