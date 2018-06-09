<?php

namespace App\Controllers;

use \App\Core\App;
use \App\Core\Localization;
use \App\Core\Config;
use \App\Core\Pagination;
use App\Entity\User;
use \App\Entity\Category\CategoryMain;
use \App\Entity\Clothes\ClothesMain;
use \App\Entity\Clothes\ClothesReviews;

class ClothesController extends Base
{
	private $userModel;
	private $categoryMainModel;
	private $clothesMainModel;
	private $clothesRreviewsModel;

	public function __construct(array $params = [])
	{
		parent::__construct($params);

		$this->userModel = new User(App::getConnection());
		$this->categoryMainModel = new CategoryMain(App::getConnection());
		$this->clothesMainModel = new ClothesMain(App::getConnection());
		$this->clothesReviewsModel = new ClothesReviews(App::getConnection());
	}

	public function indexAction()
	{
		// Получаем данные о категории.
		$controller = lcfirst(App::getRouter()->getController(true));
		$category = $this->categoryMainModel->languageList(['category_name' => $controller])[0];

		if ($category['active'] != 0) {

			// Если есть GET-запрос, то формируем данные из него.
			$get = [];
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

			// Пагинация.
			$page = isset($this->params[0]) ? $this->params[0] : 1;
			$productsCount = count($this->clothesMainModel->languageList($get));

			$pag = new Pagination();
			$pagination = $pag->getLinks(
				$productsCount,
				Config::get('pagLimit'),
				$page,
				Config::get('pagButtonLimit'));

			if (!empty($pagination)) {
				$this->data['pagination'] = $pagination;
			} else {
				$this->data['pagination'] = null;
			}
			$offset = $this->data['pagination'] ? $pagination['middle'][$page] : 0;

			// Формируем data.
			$this->data['filter']['brand'] = $this->clothesMainModel->getBrand();
			$this->data['filter']['size'] = ['s', 'm', 'l', 'xl'];
			$this->data['title'] = $category['full_title'];
			$this->data['text'] = $category['second_text'];
			$this->data['page'] = $page;
			$this->data['product'] = $this->clothesMainModel->languageList($get, [Config::get('pagLimit'), $offset]);

			if (isset($get)) {
				$this->data['get'] = $get;
			}

			// Получаем коллекции изображений.
			foreach ($this->data['product'] as $key => $value) {

				// Если директория с id товара существует - то находим в ней изображения.
				if (file_exists(Config::get('clothesImgRoot') . $value['id'])) {
					$this->data['product'][$key]['galery'] = array_values(array_diff(scandir(Config::get('clothesImgRoot') . $value['id']), ['.', '..']));
				} else {
					$this->data['product'][$key]['galery'] = false;
				}

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

	public function reviewsAction()
	{
		// Получаем параметры.
		$params = App::getRouter()->getParams();

		// Если в параметрах присутствует id - то собираем и отдаем данные для просмотра товара, иначе делаем переадресацию на страницу всех товаров.
		if (!empty($params)) {

			// Получем id товара.
			$id = $params[0];

			// Получаем данныt товара.
			$product = $this->clothesMainModel->languageList(['id' => $id])[0];

			// Получение изображения товара.
			$paths = array_values(array_diff(scandir(Config::get('clothesImgRoot') . $id), ['.', '..']));
			$avatar = Config::get('clothesImg') . $id . DS . $paths[0];

			// Получаем отзывы.
			$reviews = $this->clothesReviewsModel->reviews(1, [5, 0]);

			// Отдаём данные.
			$this->data['avatar'] = $avatar;
			$this->data['title'] = $product['title'];
			$this->data['reviews'] = $reviews;

		} else {

			App::getRouter()->redirect(App::getRouter()->buildUri('.clothes'));

		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {

				// Получаем id юзера.
				$id_users = App::getSession()->get('id');

				// Отправка отзыва.
				if (isset($_POST['button']) && $_POST['button'] == 'send') {
					$this->data = [
						'id_users' => $id_users,
						'reviews' => $_POST['reviews'],
						'date' => date('Y-m-d H:i:s'),
						'active' => '1'
					];

					$this->clothesReviewsModel->save($this->data);

					App::getSession()->addFlash(__('reviews.mes1'));
					App::getRouter()->redirect(App::getRouter()->buildUri('clothes.reviews', [$id]));
				}

			} catch (\Exception $exception) {

				App::getSession()->addFlash($exception->getMessage());
				App::getRouter()->redirect(App::getRouter()->buildUri('clothes.reviews', [$id]));

			}
		}
	}

	public function getReviewsAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$start = $_POST['start'];
			$limit = $_POST['limit'];

			// Получаем отзывы юзеров.
			$reviews = $this->clothesReviewsModel->reviews(1, [$limit, $start]);

			// Если полученный массив не пустой - дополняем его ссылки на фото юзеров.
			if(!empty($reviews)) {
				foreach ($reviews as $key => $value) {
					$id = $value['id'];

					if (!file_exists(Config::get('userImgRoot') . $id)) {
						$reviews[$key]['avatar'] = Config::get('systemImg') . 'user.png';
					} else {
						$paths = array_values(array_diff(scandir(Config::get('userImgRoot') . $id), ['.', '..']));
						$reviews[$key]['avatar'] = Config::get('userImg') . $id . DS . $paths[0];
					}
				}
			}

			$arr['data'] = $reviews;

			echo json_encode($arr);
			die();

		}
	}
}
