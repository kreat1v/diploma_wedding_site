<?php

namespace App\Controllers;

use App\Entity\Contacts;
use App\Core\App;

class ContactsController extends Base
{
	private $contactsModel;

	public function __construct(array $params = [])
	{
		parent::__construct($params);

		$this->contactsModel = new Contacts(App::getConnection());
	}

	public function indexAction()
	{
		// Получаем данные о категории.
		$contacts = $this->contactsModel->list()[0];

		// Отдаём данные.
		$this->data = $contacts;
	}

	public function getContacts()
	{
		// Отдаём данные.
		$this->data = $this->contactsModel->list()[0];

		return $this->data;
	}
}
