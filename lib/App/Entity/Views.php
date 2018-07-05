<?php

namespace App\Entity;

class Views extends Base
{
	public function getTableName()
	{
		return 'views';
	}

	public function checkFields($data)
	{}

	public function getFields()
	{
		return [
			'id',
			'id_stories',
			'ip',
			'id_users'
		];
	}
}
