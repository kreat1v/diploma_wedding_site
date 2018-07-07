<?php

namespace App\Controllers;

use App\Entity\About;
use App\Core\App;

class AboutController extends Base
{
	private $aboutModel;

	public function __construct(array $params = [])
	{
		parent::__construct($params);

		$this->aboutModel = new About(App::getConnection());
	}

	public function indexAction()
	{
		// Получаем язык.
		$lang = App::getRouter()->getLang();

		// Получаем данные о категории.
		$about = $this->aboutModel->list()[0];

		// Получаем имя языкового поля.
		$langField = $lang . '_text';

		// Отдаём данные.
		$this->data = $about[$langField];
	}
}
