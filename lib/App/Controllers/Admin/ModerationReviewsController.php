<?php

namespace App\Controllers\Admin;

use \App\Entity\User;
use \App\Entity\Category\CategoryMain;
use \App\Entity\Auto\AutoReviews;
use \App\Entity\Cake\CakeReviews;
use \App\Entity\Clothes\ClothesReviews;
use \App\Entity\Decor\DecorReviews;
use \App\Entity\Filming\FilmingReviews;
use \App\Entity\Hotel\HotelReviews;
use \App\Entity\Leading\LeadingReviews;
use \App\Core\App;
use \App\Core\Config;
use \App\Core\Pagination;

class ModerationReviewsController extends \App\Controllers\Base
{
	private $userModel;
	private $categoryMainModel;
	private $autoReviewsModel;
	private $cakeReviewsModel;
	private $clothesReviewsModel;
	private $decorReviewsModel;
	private $filmingReviewsModel;
	private $hotelReviewsModel;
	private $leadingReviewsModel;

	public function __construct(array $params = [])
	{
		parent::__construct( $params );

		$this->userModel = new User(App::getConnection());
		$this->categoryMainModel = new CategoryMain(App::getConnection());
		$this->autoReviewsModel = new AutoReviews(App::getConnection());
		$this->cakeReviewsModel = new CakeReviews(App::getConnection());
		$this->clothesReviewsModel = new ClothesReviews(App::getConnection());
		$this->decorReviewsModel = new DecorReviews(App::getConnection());
		$this->filmingReviewsModel = new FilmingReviews(App::getConnection());
		$this->hotelReviewsModel = new HotelReviews(App::getConnection());
		$this->leadingReviewsModel = new LeadingReviews(App::getConnection());

	}

	public function indexAction()
	{
		// Получаем список категорий.
		$category = $this->categoryMainModel->languageList(['active' => 1]);
		$this->data['data'] = $category;

		// Получаем количество доступных услуг для каждой категории.
		foreach ($category as $value) {
			if ($value['active'] == 1) {
				$categoryName = $value['category_name'];
				$modelName = $categoryName . 'ReviewsModel';
				$count = count($this->$modelName->list(['active' => 0]));
				$this->data[$categoryName] = $count;
			}
		}
	}

	public function viewAction()
	{
		// Получаем параметры.
		$params = App::getRouter()->getParams();

		// Если параметры не пустые - отдаеём информацию, иначе перебрасываем на страницу со всеми категориями.
		if (!empty($params)) {

			// Задаем модульное сообщение.
			App::getSession()->addModal(__('admin_moderationreviews.modal'));

			// Получаем категорию.
			$category = $params[0];

			// Получаем имя категории.
			$categoryName = $this->categoryMainModel->languageList(['category_name' => $category])[0];

			// Получаем имя модели.
			$modelName = $category . 'ReviewsModel';

			// Пагинация.
			$page = isset($this->params[1]) ? $this->params[1] : 1;
			$productsCount = count($this->$modelName->list());

			$pag = new Pagination();
			$pagination = $pag->getLinks(
				$productsCount,
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
				$this->data['reviews'] = $this->$modelName->list([], [Config::get('pagLimit'), $offset], 'date');
				$this->data['category'] = $category;
				$this->data['categoryName'] = $categoryName['title'];
				$this->data['page'] = $page;
			} else {
				$this->page404();
			}

		} else {

			App::getRouter()->redirect(App::getRouter()->buildUri('.moderationreviews'));

		}
	}

	public function deactivateAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			try {

				// Получаем id отзыва.
				$idReviews = $_POST['id'];

				// Получаем категорию.
				$category = $_POST['category'];

				// Получаем имя модели.
				$modelName = $category . 'ReviewsModel';

				$this->data = [
					'active' => 0
				];

				// Деактивируем отзыв.
				$this->$modelName->save($this->data, ['id' => $idReviews]);

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

	public function activateAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			try {

				// Получаем id отзыва.
				$idReviews = $_POST['id'];

				// Получаем категорию.
				$category = $_POST['category'];

				// Получаем имя модели.
				$modelName = $category . 'ReviewsModel';

				$this->data = [
					'active' => 1
				];

				// Активируем отзыв.
				$this->$modelName->save($this->data, ['id' => $idReviews]);

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

	public function editAction()
	{
		// Получаем параметры.
		$params = App::getRouter()->getParams();

		// Если в параметрах есть id категории - то продолжаем получение и обработку данных, иначе делаем переадресацию на страницу списка категорий.
		if (!empty($params)) {

			// Получаем категорию.
			$category = $params[0];

			// Получаем id отзыва.
			$idReviews = $params[1];

			// Получаем имя модели.
			$modelName = $category . 'ReviewsModel';

			// Получаем отзыв.
			$reviews = $this->$modelName->list(['id' => $idReviews])[0];

			// Получаем id юзера.
			$idUser = $reviews['id_users'];

			// Получаем данные юзера.
			$user = $this->userModel->list(['id' => $idUser])[0];

			// Если отзыв существует, то продолжаем получать и обрабатывать данные, иначе выдаём 404ю страницу.
			if (!empty($reviews)) {

				// Отдаём данные.
				$this->data['reviews'] = $reviews;
				$this->data['user'] = $user;

				// Если есть post запрос, обарабатываем и сохраняем полученные данные.
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					try {

						if (isset($_POST['button']) && $_POST['button'] == 'send') {

							// Формируем массив для сохранения.
							$this->data = [
								'reviews' => $_POST['reviews'],
								'active' => !empty($_POST['active']) ? $_POST['active'] : 0
							];

							// Сохраняем данные.
							$this->$modelName->save($this->data, ['id' => $idReviews]);

							App::getSession()->addFlash(__('admin_moderationreviews.mes1'));
							App::getRouter()->redirect(App::getRouter()->buildUri("moderationreviews.view", [$category]));

						}

					} catch (\Exception $exception) {

						App::getSession()->addFlash($exception->getMessage());

					}
				}

			} else {

				$this->page404();

			}

		} else {

			App::getRouter()->redirect(App::getRouter()->buildUri('.moderationreviews'));

		}
	}
}
