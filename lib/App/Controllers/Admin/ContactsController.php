<?php

namespace App\Controllers\Admin;

use \App\Entity\Contacts;
use \App\Core\App;

class ContactsController extends \App\Controllers\Base

{
	private $contactsModel;

	public function __construct($params = [])
	{
		parent::__construct($params);

		$this->contactsModel = new Contacts(App::getConnection());
	}

	public function indexAction()
	{
		// Получаем нужный текст.
		$contactsModel = $this->contactsModel->list();

		// Данные.
		$this->data = $contactsModel[0];

		// Если есть post запрос, обарабатываем и сохраняем полученные данные.
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {

				if (isset($_POST['button']) && $_POST['button'] == 'send') {

					// Формируем массив для сохранения.
					$this->data = [
						'ru_text' => $_POST['ru_text'],
						'en_text' => $_POST['en_text'],
						'ru_address' => $_POST['ru_address'],
						'en_address' => $_POST['en_address'],
						'email' => $_POST['email'],
						'tel1' => $_POST['tel1'],
						'tel2' => !empty($_POST['tel2']) ? $_POST['tel2'] : null,
						'tel3' => !empty($_POST['tel3']) ? $_POST['tel3'] : null,
						'fb' => !empty($_POST['fb']) ? $_POST['fb'] : null,
						'instagram' => !empty($_POST['instagram']) ? $_POST['instagram'] : null,
						'telegram' => !empty($_POST['telegram']) ? $_POST['telegram'] : null
					];

					// Сохраняем данные.
					$this->contactsModel->save($this->data, ['id' => 1]);

					App::getSession()->addFlash(__('admin_category.mes3'));
					App::getRouter()->redirect(App::getRouter()->buildUri('.contacts'));
				}

			} catch (\Exception $exception) {

				App::getSession()->addFlash($exception->getMessage());

			}
		}
	}
}
