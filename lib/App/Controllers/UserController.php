<?php

namespace App\Controllers;

use App\Entity\User;
use App\Core\App;

class UserController extends Base
{
	private $userModel;

	public function __construct(array $params = [])
	{
		parent::__construct( $params );

		$this->userModel = new User(App::getConnection());
	}

	public function indexAction()
	{
		$this->data = $this->userModel->getBy('id', App::getSession()->get('id'));
	}

	public function settingsAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {

				if (isset($_POST['button']) && $_POST['button'] == 'avatar') {
					print_r($_POST);
					print_r($_FILES);

					// App::getSession()->addFlash(__('register.reg_mes'));
					// App::getRouter()->redirect(App::getRouter()->buildUri('.login'));
				}

			} catch (\Exception $exception) {
				App::getSession()->addFlash($exception->getMessage());
			}
		}
	}

	public function editAction() {
		if (App::getSession()->get('id')) {
			$this->data = $this->userModel->getBy('id', App::getSession()->get('id'));
		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {
				$id = App::getSession()->get('id') ? App::getSession()->get('id') : null;

				$this->data = [
					'firstName' => $_POST['firstName'],
					'secondName' => $_POST['secondName'],
					'email' => $_POST['email'],
				];

				if (App::getSession()->get('email') == $this->data['email']) {
					unset($this->data['email']);
				}

				$this->userModel->edit($this->data, $id);

				if (isset($this->data['email'])) {
					App::getSession()->set('email', $this->data['email']);
				}

				App::getSession()->addFlash('Your data has been saved successfully.');
				App::getRouter()->redirect(App::getRouter()->buildUri('user.index'));
			} catch (\Exception $exception) {
				App::getSession()->addFlash($exception->getMessage());
			}
		}
	}

	public function editPasswordAction() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {
				$id = App::getSession()->get('id') ? App::getSession()->get('id') : null;

				$this->data = [
					'oldPassword' => $_POST['oldPassword'],
					'password' => $_POST['password'],
					'confirmPassword' => $_POST['confirmPassword'],
				];

				$this->userModel->editPassword($this->data, $id);

				App::getSession()->addFlash('Your new password has been saved successfully.');
				App::getRouter()->redirect(App::getRouter()->buildUri('user.index'));
			} catch (\Exception $exception) {
				App::getSession()->addFlash($exception->getMessage());
			}
		}
	}

	public function logoutAction()
	{
		App::getSession()->destroy();
		App::getRouter()->redirect(App::getRouter()->buildUri('.category'));
	}
}
