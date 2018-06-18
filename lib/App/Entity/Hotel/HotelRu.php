<?php

namespace App\Entity\Hotel;

class HotelRu extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'hotel_ru';
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
			'id_language'
		];
	}
}
