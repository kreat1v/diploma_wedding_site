<?php

namespace App\Entity;

class OrdersProducts extends Base
{
	public function getTableName()
	{
		return 'orders_products';
	}

	public function checkFields($data)
	{}

	public function getFields()
	{
		return [
			'id',
			'id_orders',
			'id_products',
			'category'
		];
	}
}
