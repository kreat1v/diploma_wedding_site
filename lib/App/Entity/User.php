<?php

namespace App\Entity;

use App\Core\Password;

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
			'secretkey',
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

		$secret_key = uniqid();

		$data['password'] = md5(new Password($data['password'], $secret_key));
		$data['secretkey'] = $secret_key;

		$this->save($data);
	}

	public function login(array $data)
	{
		$this->checkFields($data);

		$user = $this->getBy('email', $data['email']);

		// Проверяем корректность введенных данных.
		if (!$user) {
			throw new \Exception(__('login.error1'));
		}

		if ($user['password'] != md5(new Password($data['password'], $user['secretkey']))) {
			throw new \Exception(__('login.error2'));
		}

		if (!$user['active']) {
			throw new \Exception(__('login.error3'));
		}

		// Обновляем пароль.
		$secret_key = uniqid();

		$data['password'] = md5(new Password($data['password'], $secret_key));
		$data['secretkey'] = $secret_key;

		$this->save($data, $user['id']);

		return $user;
	}

	public function edit(array $data, $id)
	{
		if ($this->getBy('email', $data['email'])) {
			throw new \Exception(__('user_settings.error4'));
		}

		$this->save($data, $id);
	}

	public function editPassword(array $data, $id)
	{
		$this->checkFields($data);

		$user = $this->getBy('id', $id);

		if ($user['password'] != md5(new Password($data['oldPassword'], $user['secretkey']))) {
			throw new \Exception(__('user_settings.error5'));
		}

		if ($user['password'] == md5(new Password($data['password'], $user['secretkey']))) {
			throw new \Exception(__('user_settings.error6'));
		}

		if ($data['password'] != $data['confirmPassword']) {
			throw new \Exception(__('user_settings.error7'));
		}

		$secret_key = uniqid();

		$data['password'] = md5(new Password($data['password'], $secret_key));
		$data['secretkey'] = $secret_key;

		$this->save($data, $id);
	}
}
