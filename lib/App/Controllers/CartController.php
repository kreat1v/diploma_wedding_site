<?php

namespace App\Controllers;

use App\Entity\Category\CategoryMain;
use App\Entity\Decor\DecorMain;
use App\Entity\Clothes\ClothesMain;
use App\Entity\Auto\AutoMain;
use App\Entity\Filming\FilmingMain;
use App\Entity\Leading\LeadingMain;
use App\Entity\Cake\CakeMain;
use App\Entity\Hotel\HotelMain;
use App\Core\App;
use App\Core\Session;

class CartController extends Base
{
	private $categoryMainModel;
	private $decorMainModel;
	private $clothesMainModel;
	private $autoMainModel;
	private $filmingMainModel;
	private $leadingMainModel;
	private $cakeMainModel;
	private $hotelMainModel;

	public function __construct(array $params = [])
	{
		parent::__construct($params);

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
		// Если пользователь - админ, то мы не пускаем его в раздел юзера.
		if (App::getRouter()->getController(true) == 'Cart' && App::getSession()->get('role') == 'admin') {
			$this->page404();
		}

		// Получаем список активных категорий.
		$this->data['category'] = $this->categoryMainModel->languageList(['active' => 1]);

		// Получаем корзину из сессии.
		$cart = Session::get('cart') ? Session::get('cart') : [];

		// Проходимся циклом по массиву корзины.
		foreach ($cart as $key => $value) {

			// Имя модели.
			$nameCategoty = $key . 'MainModel';

			// Получаем нужные нам модели услуг.
			$model = $this->$nameCategoty->languageList(['id' => $value['id_products']])[0];

			// Дополняем корзину названиями услуг.
			$cart[$key]['title'] = $model['title'];

		}

		// Отдаём корзину.
		$this->data['cart'] = $cart;
	}

	public function addCartAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			try {

				// Имя категории.
				$nameCategory = $_POST['category'];

				// Получаем данные.
				$this->data = [
					'id_products' => $_POST['id_products'],
					'category' => $nameCategory
				];

				// Если массив корзины в сессии не пустой - дополним его данными, иначе создадим его и заполним.
				if (!empty(Session::get('cart'))) {

					// Получаем данные корзины.
					$cart = Session::get('cart');

					// Вставляем данные.
					$cart[$nameCategory] = $this->data;

					// Вставляем все обратно в сессию.
					Session::set('cart', $cart);

				} else {

					// Создадим массив корзины с данными.
					Session::set('cart', [$nameCategory => $this->data]);

				}

				echo json_encode([
					'result' => 'success'
				]);

				die();

			} catch (\Exception $exception) {

				echo json_encode([
					'result' => 'error',
					'msg' => $exception->getMessage()
				]);

				die();

			}

		}
	}

	// Метод удаления услуг из корзины.
	public function deleteAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			try {

				// Получаем пришедшие данные.
				$name = $_POST['name'];

				$this->data['cart'] = Session::get('cart');

				// Если лайк не найден, то сохраним его в БД, иначе наоборот удалим его из БД.
				if ($this->data['cart'][$name]) {

					unset($this->data['cart'][$name]);

					Session::set('cart', $this->data['cart']);

					echo json_encode([
						'result' => 'success'
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

	public function viewAction()
	{
		// Получаем список активных категорий.
		$category = $this->categoryMainModel->languageList(['active' => 1]);

		foreach ($category as $key => $value) {

			$name = $value['category_name'];

			$category[$key]['link'] = App::getRouter()->buildUri(".$name");

		}

		// Получаем корзину из сессии.
		$cart = Session::get('cart') ? Session::get('cart') : [];

		// Проходимся циклом по массиву корзины.
		foreach ($cart as $key => $value) {

			// Имя модели.
			$nameCategoty = $key . 'MainModel';

			// Получаем нужные нам модели услуг.
			$model = $this->$nameCategoty->languageList(['id' => $value['id_products']])[0];

			// Дополняем корзину названиями услуг.
			$cart[$key]['title'] = $model['title'];

			// Дополняем корзину ссылками на услугу.
			$cart[$key]['link'] = App::getRouter()->buildUri("$key.view", [$model['id']]);

		}

		// Отдаём данные.
		$this->data['category'] = $category;
		$this->data['cart'] = $cart;

		echo json_encode($this->data);
		die();
	}

	public function orderingAction()
	{
		// Если пользователь - админ, то мы не пускаем его в раздел юзера.
		if (App::getRouter()->getController(true) == 'Cart' && App::getSession()->get('role') == 'admin') {
			$this->page404();
		}

		// Получаем корзину из сессии.
		$cart = Session::get('cart') ? Session::get('cart') : [];

		// Формируем цены.
		$fullPrice = 0;
		$stockPrice = 0;

		// Проходимся циклом по массиву корзины.
		foreach ($cart as $key => $value) {

			// Имя модели.
			$nameCategoty = $key . 'MainModel';

			// Получаем нужные нам модели услуг.
			$model = $this->$nameCategoty->languageList(['id' => $value['id_products']])[0];

			// Дополняем корзину нужными данными.
			$cart[$key]['title'] = $model['title'];
			$cart[$key]['price'] = $model['price'];
			$cart[$key]['stock'] = $model['stock'];

			// Считаем итоговые стоимости.
			if ($model['stock']) {
				$stockPrice += $model['stock'];
			} else {
				$stockPrice += $model['price'];
			}

			$fullPrice += $model['price'];

		}

		// Получаем список активных категорий.
		$category = $this->categoryMainModel->languageList(['active' => 1]);

		foreach ($category as $key => $value) {

			if (array_key_exists($value['category_name'], $cart)) {

				$cart[$value['category_name']]['category_title'] = $value['title'];

			}

		}

		// Отдаём корзину.
		$this->data['cart'] = $cart;
		$this->data['fullPrice'] = $fullPrice;
		$this->data['stockPrice'] = $stockPrice;
	}
}
