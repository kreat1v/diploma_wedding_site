<?php

namespace App\Entity;

class MessagesAdmin extends Base
{
	private $user;

	private function getUser()
	{
		if (empty($this->user)) {
			$this->user = new User($this->conn);
		}

		return $this->user;
	}

	public function getTableName()
	{
		return 'messages_admin';
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
			'date'
		];
	}
}
