<?php

namespace App\Entity\Leading;

class LeadingRu extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'leading_ru';
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
			'id_leading',
			'title',
			'text',
			'contacts',
			'service',
			'id_language'
		];
	}
}
