<?php

namespace App\Controllers;

use App\Entity\About;
use App\Core\App;
use App\Core\Session;

class CartController extends Base
{
	private $aboutModel;

	public function __construct(array $params = [])
	{
		parent::__construct($params);

		$this->aboutModel = new About(App::getConnection());
	}

	public function indexAction()
	{
		pre(Session::get('cart'));

		// // Получаем язык.
		// $lang = App::getRouter()->getLang();
		//
		// // Получаем данные о категории.
		// $about = $this->aboutModel->list()[0];
		//
		// // Получаем имя языкового поля.
		// $langField = $lang . '_text';
		//
		// // Отдаём данные.
		// $this->data = $about[$langField];
	}
}
