<?php

namespace App\Entity;

class Orders extends Base
{
	public function getTableName()
	{
		return 'orders';
	}

	public function checkFields($data)
	{}

	public function getFields()
	{
		return [
			'id',
			'date',
			'id_users',
			'message',
			'payment',
			'price',
			'active'
		];
	}
}
