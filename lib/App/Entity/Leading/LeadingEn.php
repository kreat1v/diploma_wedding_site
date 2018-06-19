<?php

namespace App\Entity\Leading;

class LeadingEn extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'leading_en';
	}

	public function checkFields($data)
	{}

	public function getFields()
	{
		return [
			'id',
			'id_leading',
			'title',
			'text',
			'contacts',
			'service',
			'id_language'
		];
	}
}
