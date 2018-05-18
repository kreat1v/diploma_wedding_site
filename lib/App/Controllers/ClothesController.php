<?php

namespace App\Controllers;

use \App\Core\App;
use \App\Core\Localization;
use \App\Core\Config;
use \App\Entity\Category\CategoryMain;
use \App\Entity\Clothes\ClothesMain;

class ClothesController extends Base
{
	private $categoryMainModel;
	private $clothesMainModel;

	public function __construct(array $params = [])
	{
		parent::__construct($params);

		$this->categoryMainModel = new CategoryMain(App::getConnection());
		$this->clothesMainModel = new ClothesMain(App::getConnection());
	}

	public function indexAction()
	{
		// получаем данные о категории
		$controller = lcfirst(App::getRouter()->getController(true));
		$category = $this->categoryMainModel->languageList(['category_name' => $controller])[0];

		// echo '<pre>';
		// print_r($category);

		if ($category['active'] != 0) {
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

			// формируем data
			$this->data['title'] = $category['full_title'];
			$this->data['text'] = $category['second_text'];
			$this->data['filter']['brand'] = $this->clothesMainModel->getBrand();
			$this->data['filter']['size'] = ['s', 'm', 'l', 'xl'];
			$this->data['info'] = $this->clothesMainModel->languageList($get);

			foreach ($this->data['info'] as $key => $value) {
				if (isset($value['img_dir'])) {
					$this->data['info'][$key]['galery'] = array_values(array_diff(scandir(Config::get('gallery_clothes') . $value['img_dir']), ['.', '..']));
				} else {
					$this->data['info'][$key]['galery'] = null;
				}
			}

			if (isset($get)) {
				$this->data['get'] = $get;
			}
		} else {
			$this->page404();
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
