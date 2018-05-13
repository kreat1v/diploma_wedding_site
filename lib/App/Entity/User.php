<?php

namespace App\Entity;

use App\Core\Password;
use \PDO;

class User extends Base
{
	public function getTableName()
	{
		return 'users';
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
			'firstName',
			'secondName',
			'sex',
			'email',
			'tel',
			'role',
			'password',
			'active'
		];
	}

	public function register(array $data)
	{
		if ($this->getBy('email', $data['email'])) {
			throw new \Exception(__('register.error1'));
		}

		if ($data['password'] != $data['confirm_password']) {
			throw new \Exception(__('register.error2'));
		}

		$data['password'] = md5(new Password($data['password']));

		$this->save($data);
	}

	public function login(array $data)
	{
		$this->checkFields($data);

		$user = $this->getBy('email', $data['email']);

		if (!$user) {
			throw new \Exception(__('login.error1'));
		}

		if ($user['password'] != md5(new Password($data['password']))) {
			throw new \Exception(__('login.error2'));
		}

		if (!$user['active']) {
			throw new \Exception(__('login.error3'));
		}

		return $user;
	}

	public function edit(array $data, $id)
	{
		if ($this->getBy('email', $data['email'])) {
			throw new \Exception('User with this email already registered');
		}

		$this->save($data, $id);
	}

	public function editPassword(array $data, $id)
	{
		$this->checkFields($data);

		$user = $this->getBy('id', $id);

		if ($user['password'] != md5(new Password($data['oldPassword']))) {
			throw new \Exception('The old password is not correct.');
		}

		if ($user['password'] == md5(new Password($data['password']))) {
			throw new \Exception('The new password can not be the same as the old one.');
		}

		if ($data['password'] != $data['confirmPassword']) {
			throw new \Exception('Passwords do not match');
		}

		$data['password'] = md5(new Password($data['password']));

		$this->save($data, $id);
	}
}
