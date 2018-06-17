<?php

namespace App\Entity\Decor;

class DecorRu extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'decor_ru';
	}

	public function checkFields($data)
	{}

	public function getFields()
	{
		return [
			'id',
			'id_caregory',
			'title',
			'text',
			'contacts',
			'service',
			'id_language'
		];
	}
}
