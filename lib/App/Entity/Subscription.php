<?php

namespace App\Entity;

class Subscription extends Base
{
	public function getTableName()
	{
		return 'subscription';
	}

	public function checkFields($data)
	{
		foreach ($data as $value) {
			if (empty($value) && !strlen($value)) {
				throw new \Exception(__('form.field'));
			}
		}
	}

	public function getFields()
	{
		return [
			'id',
			'email',
			'date'
		];
	}
}
