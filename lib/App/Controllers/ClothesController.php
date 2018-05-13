<?php

namespace App\Controllers;

use \App\Core\App;
use \App\Core\Localization;
use \App\Entity\Clothes\ClothesMain;

class ClothesController extends Base
{
	private $language;
	private $nameModel;
	private $clothesMainModel;

	public function __construct(array $params = [])
	{
		parent::__construct($params);

		$this->clothesMainModel = new ClothesMain(App::getConnection());
	}

	public function indexAction()
	{
		$get = [];

		// если есть GET-запрос, то формируем данные из него
		if (!empty($_GET)) {
			if (array_key_exists('sex', $_GET)) {
				$get['sex'] = $_GET['sex'];
			}

			if (array_key_exists('price', $_GET)) {
				$price = explode('-', trim($_GET['price'], '-'));
				$price = array_map('intval', $price);
				$maxVal = $this->clothesMainModel->getMaxPrice();

				if ($price[0] <= $price[1] && $price[1] <= $maxVal && $price[1] != 0) {
					$get['price'] = $price;
				} else {
					$get['price'] = [0, $maxVal['max']];
				}
			}

			if (array_key_exists('brand', $_GET)) {
				$brand = explode('-', $_GET['brand']);
				$get['brand'] = $brand;
			}

			if (array_key_exists('size', $_GET)) {
				$size = explode('-', $_GET['size']);
				$get['size'] = $size;
			}
		}

		$this->data['filter']['brand'] = $this->clothesMainModel->getBrand();
		$this->data['filter']['size'] = ['s', 'm', 'l', 'xl'];
		$this->data['info'] = $this->clothesMainModel->selectLanguageList($this->language, 'id_clothes', $get);

		if (isset($get)) {
			$this->data['get'] = $get;
		}
	}

	public function priceFilterAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$maxVal = $this->clothesMainModel->getMaxPrice();
			echo json_encode($maxVal);
			die();
		}
	}
}
