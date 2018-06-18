<?php

namespace App\Entity\Auto;

class AutosEn extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'auto_en';
	}

	public function checkFields($data)
	{}

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
