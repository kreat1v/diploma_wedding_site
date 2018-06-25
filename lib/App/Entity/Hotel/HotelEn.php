<?php

namespace App\Entity\Hotel;

class HotelEn extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'hotel_en';
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
			'id_hotel',
			'title',
			'text',
			'contacts',
			'id_language'
		];
	}
}
