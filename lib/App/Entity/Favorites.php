<?php

namespace App\Entity;

class Favorites extends Base
{
	public function getTableName()
	{
		return 'favorites';
	}

	public function checkFields($data)
	{
		// foreach ($data as $value) {
		// 	if (empty($value) && !strlen($value)) {
		// 		throw new \Exception('Form fields can not be empty');
		// 	}
		// }
	}

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
