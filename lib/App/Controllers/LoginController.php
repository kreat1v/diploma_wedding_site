<?php

namespace App\Controllers;

use App\Entity\User;
use App\Core\App;

class LoginController extends Base
{
	private $userModel;

	public function __construct(array $params = [])
	{
		parent::__construct( $params );

		$this->userModel = new User(App::getConnection());
	}

	public function indexAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {
				if (isset($_POST['button']) && $_POST['button'] == 'login') {
					$this->data = [
						'email' => $_POST['email'],
						'password' => $_POST['password']
					];

					$user = $this->userModel->login($this->data);

					$time = date('H');
					switch ($time) {
						case $time < 5:
							$message = 'Доброй ночи!';
							break;

						case $time < 12:
							$message = 'Доброе утро!';
							break;

						case $time < 18:
							$message = 'Добрый день!';
							break;

						case $time < 24:
							$message = 'Добрый вечер!';
							break;

						default:
							$message = 'Привет!';
							break;
					}

					App::getSession()->set('id', $user['id']);
					App::getSession()->set('email', $user['email']);
					App::getSession()->set('role', $user['role']);

					App::getSession()->addFlash("$message Мы рады вас видеть!");
					App::getRouter()->redirect(App::getRouter()->buildUri('.user'));
				}

				if (isset($_POST['button']) && $_POST['button'] == 'register') {
					$this->data = [
						'email' => $_POST['email'],
						'password' => $_POST['password'],
						'confirm_password' => $_POST['confirm_password'],
						'role' => 'user'
					];

					$this->userModel->register($this->data);

					App::getSession()->addFlash(__('register.reg_mes'));
					App::getRouter()->redirect(App::getRouter()->buildUri('.login'));
				}

			} catch (\Exception $exception) {
				App::getSession()->addFlash($exception->getMessage());
			}
		}
	}

	public function checkEmailAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$email = strip_tags($_POST['email']);

			if ($this->userModel->getBy('email', $email)) {
				echo true;
				die();
			} else {
				echo false;
				die();
			}
		}
	}
}
