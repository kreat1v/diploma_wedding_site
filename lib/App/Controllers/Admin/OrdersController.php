<?php

namespace App\Controllers\Admin;

use App\Entity\User;
use App\Entity\Orders;
use App\Entity\OrdersProducts;
use App\Entity\Decor\DecorMain;
use App\Entity\Clothes\ClothesMain;
use App\Entity\Auto\AutoMain;
use App\Entity\Filming\FilmingMain;
use App\Entity\Leading\LeadingMain;
use App\Entity\Cake\CakeMain;
use App\Entity\Hotel\HotelMain;
use App\Entity\Category\CategoryMain;
use App\Core\App;
use App\Core\Config;
use App\Core\Pagination;

class OrdersController extends \App\Controllers\Base

{
	private $userModel;
	private $ordersModel;
	private $ordersProductsModel;
	private $decorMainModel;
	private $clothesMainModel;
	private $autoMainModel;
	private $filmingMainModel;
	private $leadingMainModel;
	private $cakeMainModel;
	private $hotelMainModel;
	private $categoryMainModel;

	public function __construct($params = [])
	{
		parent::__construct($params);

		$this->userModel = new User(App::getConnection());
		$this->ordersModel = new Orders(App::getConnection());
		$this->ordersProductsModel = new OrdersProducts(App::getConnection());
		$this->decorMainModel = new DecorMain(App::getConnection());
		$this->clothesMainModel = new ClothesMain(App::getConnection());
		$this->autoMainModel = new AutoMain(App::getConnection());
		$this->filmingMainModel = new FilmingMain(App::getConnection());
		$this->leadingMainModel = new LeadingMain(App::getConnection());
		$this->cakeMainModel = new CakeMain(App::getConnection());
		$this->hotelMainModel = new HotelMain(App::getConnection());
		$this->categoryMainModel = new CategoryMain(App::getConnection());
	}

	public function indexAction()
	{
		// Задаем модульное сообщение.
		App::getSession()->addModal(__('admin_orders.modal'));

		// Пагинация.
		$page = isset($this->params[0]) ? $this->params[0] : 1;
		$ordersCount = count($this->ordersModel->list());

		$pag = new Pagination();
		$pagination = $pag->getLinks(
			$ordersCount,
			Config::get('pagLimit'),
			$page,
			Config::get('pagButtonLimit'));

		if (!empty($pagination) && !$pagination['page404']) {
			$this->data['pagination'] = $pagination;
		} else {
			$this->data['pagination'] = null;
		}
		$offset = $this->data['pagination'] ? $pagination['middle'][$page] : 0;

		// Формируем data. Если метка 404й страницы равна false - то отдаём данные.
		if (!$pagination['page404']) {

			// Получаем заказы.
			$orders = $this->ordersModel->list([], [Config::get('pagLimit'), $offset], 'date');

			// Получаем список категорий.
			$category = $this->categoryMainModel->languageList();

			// Дополсняем массив заказов нужными данными.
			foreach ($orders as $key => $value) {

				// Получаем услуги из заказа.
				$ordersProducts = $this->ordersProductsModel->list(['id_orders' => $value['id']]);

				// Получаем юзера.
				$user = $this->userModel->list(['id' => $value['id_users']])[0];

				// Проходимся циклом по массиву услуг.
				foreach ($ordersProducts as $key2 => $products) {

					// Имя модели.
					$nameCategoty = $products['category'] . 'MainModel';

					// Получаем нужные нам модели услуг.
					$model = $this->$nameCategoty->languageList(['id' => $products['id_products']])[0];

					// Дополняем массив услуг названиями услуг.
					$ordersProducts[$key2]['title'] = $model['title'];

					// Дополняем наш массив названиями категорий.
					foreach ($category as $categoryName) {

						if ($categoryName['category_name'] == $products['category']) {

							$ordersProducts[$key2]['category_title'] = $categoryName['title'];

						}

					}

				}

				// Дополянем масив услугами и данными юзера.
				$orders[$key]['products'] = $ordersProducts;
				$orders[$key]['contacts'] = $user['firstName'] . ', ' . $user['email'] . ', ' . $user['tel'];

			}

			// Формируем data. Если метка 404й страницы равна false - то отдаём данные.
			if (!$pagination['page404']) {

				$this->data['orders'] = $orders;
				$this->data['page'] = $page;

			} else {

				$this->page404();
			}


		} else {

			$this->page404();

		}
	}

	public function paymentAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			try {

				// Получаем id заказа.
				$idOrders = $_POST['id'];

				$this->data = [
					'active' => 0
				];

				// Делаем заказ оплаченым.
				$this->ordersModel->save($this->data, ['id' => $idOrders]);

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
}
