<?php

namespace App\Entity;

class MessagesUser extends Base
{
	public function getTableName()
	{
		return 'messages_user';
	}

	public function checkFields($data) {
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
			'id_users',
			'message',
			'date',
			'active'
		];
	}
}
