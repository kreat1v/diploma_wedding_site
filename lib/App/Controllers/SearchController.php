<?php

namespace App\Controllers;

use \App\Core\App;
use \App\Core\Pagination;
use \App\Core\Config;
use \App\Entity\Stories\StoriesMain;
use \App\Entity\Category\CategoryMain;
use App\Entity\Decor\DecorMain;
use App\Entity\Clothes\ClothesMain;
use App\Entity\Auto\AutoMain;
use App\Entity\Filming\FilmingMain;
use App\Entity\Leading\LeadingMain;
use App\Entity\Cake\CakeMain;
use App\Entity\Hotel\HotelMain;

class SearchController extends Base

{
	private $storiesMainModel;
	private $categoryMainModel;
	private $decorMainModel;
	private $clothesMainModel;
	private $autoMainModel;
	private $filmingMainModel;
	private $leadingMainModel;
	private $cakeMainModel;
	private $hotelMainModel;

	public function __construct($params = [])
	{
		parent::__construct($params);

		$this->storiesMainModel = new StoriesMain(App::getConnection());
		$this->categoryMainModel = new CategoryMain(App::getConnection());
		$this->decorMainModel = new DecorMain(App::getConnection());
		$this->clothesMainModel = new ClothesMain(App::getConnection());
		$this->autoMainModel = new AutoMain(App::getConnection());
		$this->filmingMainModel = new FilmingMain(App::getConnection());
		$this->leadingMainModel = new LeadingMain(App::getConnection());
		$this->cakeMainModel = new CakeMain(App::getConnection());
		$this->hotelMainModel = new HotelMain(App::getConnection());
	}

	public function indexAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			// Получаем строку поиска.
			$string = $_GET['query'];

			// Если строка не пустая - начинаем поиск.
			if (strlen($string) > 0) {

				// Обрабатываем истории.
				// Получаем истории с нужными заголовками.
				$stories = $this->storiesMainModel->search($string);

				$arrResult = [];

				// Проходимся по ним циклом и дополняем массив ссылками на истории.
				foreach ($stories as $key => $value) {

					// Получаем id истории.
					$idStories = $value['id_stories'];

					// Дополняем массив ссылкой.
					$stories[$key]['link'] = App::getRouter()->buildUri('stories.view', [$idStories]);

				}

				// Наполняем наш итоговый массив.
				$arrResult['stories'] = $stories;

				// Обрабатываем категории товаров.
				// Получаем список активных категорий.
				$category = $this->categoryMainModel->list(['active' => 1]);

				// Проходимся по нему циклом.
				foreach ($category as $key => $value) {

					// Получаем имя модели.
					$modelName = $value['category_name'] . 'MainModel';

					// Получаем данные модели.
					$result = $this->$modelName->search($string);

					// Проходимся по ним циклом и дополняем массив ссылками на услуги.
					foreach ($result as $key2 => $value2) {

						// Получаем название id.
						$idString = 'id_' . $value['category_name'];

						// Получаем id услуги.
						$idResult = $value2[$idString];

						// Получаем имя для ссылки.
						$link = $value['category_name'];

						// Дополняем массив ссылкой.
						$result[$key2]['link'] = App::getRouter()->buildUri("$link.view", [$idResult]);
					}

					// Наполняем наш итоговый массив.
					$arrResult[$value['category_name']] = $result;

				}

				// Формируем единый массив результатов.
				$this->data = [];

				foreach($arrResult as $value) {

					$this->data = array_merge($this->data, $value);

				}

			}
		}
	}

	public function searchStringAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			try {

				// Получаем строку поиска.
				$string = $_POST['string'];

				// Если строка не пустая - начинаем поиск.
				if (strlen($string) > 0) {

					// Обрабатываем истории.
					// Получаем истории с нужными заголовками.
					$stories = $this->storiesMainModel->search($string);

					$arrResult = [];

					// Проходимся по ним циклом и дополняем массив ссылками на истории.
					foreach ($stories as $key => $value) {

						// Получаем id истории.
						$idStories = $value['id_stories'];

						// Дополняем массив ссылкой.
						$stories[$key]['link'] = App::getRouter()->buildUri('stories.view', [$idStories]);

					}

					// Наполняем наш итоговый массив.
					$arrResult['stories'] = $stories;

					// Обрабатываем категории товаров.
					// Получаем список активных категорий.
					$category = $this->categoryMainModel->list(['active' => 1]);

					// Проходимся по нему циклом.
					foreach ($category as $key => $value) {

						// Получаем имя модели.
						$modelName = $value['category_name'] . 'MainModel';

						// Получаем данные модели.
						$result = $this->$modelName->search($string);

						// Проходимся по ним циклом и дополняем массив ссылками на услуги.
						foreach ($result as $key2 => $value2) {

							// Получаем название id.
							$idString = 'id_' . $value['category_name'];

							// Получаем id услуги.
							$idResult = $value2[$idString];

							// Получаем имя для ссылки.
							$link = $value['category_name'];

							// Дополняем массив ссылкой.
							$result[$key2]['link'] = App::getRouter()->buildUri("$link.view", [$idResult]);
						}

						// Наполняем наш итоговый массив.
						$arrResult[$value['category_name']] = $result;

					}

					// Формируем единый массив результатов.
					$this->data = [];

					foreach($arrResult as $value) {

						$this->data = array_merge($this->data, $value);

					}

					// Создаем ссылку на страницу поиска.
					$link = App::getRouter()->buildUri(".search" . '?query=' . $string);

					// Отдаём данные.
					echo json_encode([
						'result' => 'success',
						'data' => $this->data,
						'link' => $link
					]);

					die();

				}

			} catch (\Exception $exception) {

				echo json_encode([
					'result' => 'error',
					'msg' => $exception->getMessage()
				]);

				die();

			}

		}
	}
}
