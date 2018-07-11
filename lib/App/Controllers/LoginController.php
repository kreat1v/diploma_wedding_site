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
							$message = __('login_hello.night');
							break;

						case $time < 12:
							$message =  __('login_hello.morning');
							break;

						case $time < 18:
							$message =  __('login_hello.day');
							break;

						case $time < 24:
							$message =  __('login_hello.evening');
							break;

						default:
							$message =  __('login_hello.hi');
							break;
					}

					App::getSession()->set('id', $user['id']);
					App::getSession()->set('email', $user['email']);
					App::getSession()->set('role', $user['role']);
					if (isset($user['firstName'])) {
						App::getSession()->set('name', $user['firstName']);
					}

					App::getSession()->addFlash($message . ' ' .  __('login_hello.mes'));

					if ($user['role'] == 'user') {
						App::getRouter()->redirect(App::getRouter()->buildUri('.user'));
					}

					if ($user['role'] == 'admin') {
						App::getRouter()->redirect(App::getRouter()->buildUri('.admin'));
					}
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
				App::getRouter()->redirect(App::getRouter()->buildUri('.login'));

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
