<?php

namespace App\Entity\Leading;

class LeadingRu extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'leading_ru';
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
