<?php

namespace App\Entity;

class Favorites extends Base
{
	public function getTableName()
	{
		return 'favorites';
	}

	public function checkFields($data)
	{}

	public function getFields()
	{
		return [
			'id',
			'id_products',
			'category',
			'id_users'
		];
	}
}
