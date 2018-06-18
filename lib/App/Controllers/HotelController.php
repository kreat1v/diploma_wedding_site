<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Localization;
use App\Core\Config;
use App\Core\Pagination;
use App\Core\Session;
use App\Entity\User;
use App\Entity\Favorites;
use App\Entity\Category\CategoryMain;
use App\Entity\Hotel\HotelMain;
use App\Entity\Hotel\HotelReviews;

class HotelController extends Base
{
	private $userModel;
	private $favoritesModel;
	private $categoryMainModel;
	private $hotelMainModel;
	private $hotelRreviewsModel;

	public function __construct(array $params = [])
	{
		parent::__construct($params);

		$this->userModel = new User(App::getConnection());
		$this->favoritesModel = new Favorites(App::getConnection());
		$this->categoryMainModel = new CategoryMain(App::getConnection());
		$this->hotelMainModel = new HotelMain(App::getConnection());
		$this->hotelRreviewsModel = new HotelReviews(App::getConnection());
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
				if (array_key_exists('price', $_GET)) {
					$price = explode('-', trim($_GET['price'], '-'));
					$price = array_map('intval', $price);
					$maxVal = $this->hotelMainModel->getMaxPrice();

					if ($price[0] <= $price[1] && $price[1] <= $maxVal && $price[1] != 0) {
						$get['price'] = $price;
					} else {
						$get['price'] = [0, $maxVal['max']];
					}
				}

				if (array_key_exists('stars', $_GET)) {
					$stars = explode('-', $_GET['stars']);
					$get['stars'] = $stars;
				}
			}

			// Пагинация.
			$page = isset($this->params[0]) ? $this->params[0] : 1;
			$productsCount = count($this->hotelMainModel->languageList($get));

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

			// id юзера.
			$id_user = Session::get('id');

			// Получаем закладки юзера.
			$favorites = $this->favoritesModel->list(['id_users' => $id_user]);
			$favoritesArr = [];
			foreach ($favorites as $key => $value) {
				$favoritesArr[] = $value['id_products'] . $value['category'];
			}

			// Формируем data.
			$this->data['title'] = $category['full_title'];
			$this->data['text'] = $category['second_text'];
			$this->data['page'] = $page;
			$this->data['product'] = $this->hotelMainModel->languageList($get, [Config::get('pagLimit'), $offset]);
			$this->data['favorites'] = $favoritesArr;
			$this->data['category'] = $controller;

			if (isset($get)) {
				$this->data['get'] = $get;
			}

			// Получаем коллекции изображений.
			foreach ($this->data['product'] as $key => $value) {

				// Если директория с id товара существует - то находим в ней изображения.
				if (file_exists(Config::get('hotelImgRoot') . $value['id'])) {
					$this->data['product'][$key]['galery'] = array_values(array_diff(scandir(Config::get('hotelImgRoot') . $value['id']), ['.', '..']));
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
			$maxVal = $this->hotelMainModel->getMaxPrice();
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
			$product = $this->hotelMainModel->languageList(['id' => $id]);

			// Получение изображения товара, а так же класса стиля для этого изображения.
			if (file_exists(Config::get('hotelImgRoot') . $id)) {
				$paths = array_values(array_diff(scandir(Config::get('hotelImgRoot') . $id), ['.', '..']));
				$avatar = Config::get('hotelImg') . $id . DS . $paths[0];

				$imageRoot = Config::get('hotelImgRoot') . $id . DS . $paths[0];
				$imageArr = getimagesize($imageRoot);
				if ($imageArr[0] < $imageArr[1]) {
					$avatarClass = 'avatar-width';
				} else {
					$avatarClass = 'avatar-height';
				}
			}

			// Получаем отзывы.
			$reviews = $this->hotelRreviewsModel->reviews(['id_product' => $id, 'active' => 1], [5, 0]);

			// Получаем имя категории.
			$category = lcfirst(App::getRouter()->getController(true));

			// Отдаём данные.
			if (!empty($product)) {
				$this->data['avatar'] = $avatar;
				$this->data['avatar-class'] = $avatarClass;
				$this->data['title'] = $product[0]['title'];
				$this->data['reviews'] = $reviews;
				$this->data['category'] = $category;
				$this->data['id_product'] = $id;
			} else {
				$this->page404();
			}

		} else {

			App::getRouter()->redirect(App::getRouter()->buildUri('.hotel'));

		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {

				// Получаем id юзера.
				$id_users = App::getSession()->get('id');

				// Отправка отзыва.
				if (isset($_POST['button']) && $_POST['button'] == 'send') {
					$this->data = [
						'id_product' => $id,
						'id_users' => $id_users,
						'reviews' => $_POST['reviews'],
						'date' => date('Y-m-d H:i:s'),
						'active' => '1'
					];

					$this->hotelRreviewsModel->save($this->data);

					App::getSession()->addFlash(__('reviews.mes1'));
					App::getRouter()->redirect(App::getRouter()->buildUri('hotel.reviews', [$id]));
				}

			} catch (\Exception $exception) {

				App::getSession()->addFlash($exception->getMessage());
				App::getRouter()->redirect(App::getRouter()->buildUri('hotel.reviews', [$id]));

			}
		}
	}

	public function getReviewsAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			// Получаем начало и конец выборки, а также id продукта.
			$start = $_POST['start'];
			$limit = $_POST['limit'];
			$id_product = $_POST['id_product'];

			// Получаем отзывы юзеров.
			$reviews = $this->hotelRreviewsModel->reviews(['id_product' => $id_product,'active' => 1], [$limit, $start]);

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

	public function viewAction()
	{
		// Получаем параметры.
		$params = App::getRouter()->getParams();

		// Если в параметрах присутствует id - то собираем и отдаем данные для просмотра товара, иначе делаем переадресацию на страницу всех товаров.
		if (!empty($params)) {

			// Получем id товара.
			$id = $params[0];

			// Получаем данные товара.
			$product = $this->hotelMainModel->languageList(['id' => $id]);

			// id юзера.
			$id_user = Session::get('id');

			// Получаем закладки юзера.
			$favorites = $this->favoritesModel->list(['id_users' => $id_user]);
			$favoritesArr = [];
			foreach ($favorites as $key => $value) {
				$favoritesArr[] = $value['id_products'];
			}

			// Получаем коллекцию изображений. Если директория с id товара существует - то находим в ней изображения.
			if (file_exists(Config::get('hotelImgRoot') . $id)) {
				$galery = array_values(array_diff(scandir(Config::get('hotelImgRoot') . $id), ['.', '..']));
			} else {
				$galery = false;
			}

			// Отдаём данные.
			if (!empty($product)) {
				$this->data['product'] = $product[0];
				$this->data['galery'] = $galery;
				$this->data['favorites'] = $favoritesArr;
			} else {
				$this->page404();
			}

		} else {

			App::getRouter()->redirect(App::getRouter()->buildUri('.hotel'));

		}
	}
}