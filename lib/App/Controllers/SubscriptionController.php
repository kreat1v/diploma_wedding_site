<?php

namespace App\Controllers;

use App\Entity\Subscription;
use App\Core\App;

class SubscriptionController extends Base
{
	private $subscriptionModel;

	public function __construct(array $params = [])
	{
		parent::__construct( $params );

		$this->subscriptionModel = new Subscription(App::getConnection());
	}

	public function indexAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {

				$this->data = [
					'email' => $_POST['email']
				];

				$this->subscriptionModel->save($this->data);

				App::getSession()->addFlash(__('subscription.mes2'));
				App::getRouter()->redirect(App::getRouter()->buildUri('.'));

			} catch (\Exception $exception) {

				App::getSession()->addFlash($exception->getMessage());

			}
		}
	}

	public function checkEmailAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$email = strip_tags($_POST['email']);

			if ($this->subscriptionModel->getBy('email', $email)) {
				echo true;
				die();
			} else {
				echo false;
				die();
			}
		}
	}
}
