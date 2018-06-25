<?php

namespace App\Controllers\Admin;

use \App\Entity\Category\CategoryMain;
use \App\Entity\Category\CategoryRu;
use \App\Entity\Category\CategoryEn;

use \App\Entity\Decor\DecorMain;
use \App\Entity\Decor\DecorRu;
use \App\Entity\Decor\DecorEn;

use \App\Entity\Clothes\ClothesMain;
use \App\Entity\Clothes\ClothesRu;
use \App\Entity\Clothes\ClothesEn;
use \App\Entity\Clothes\ClothesSize;

use \App\Entity\Auto\AutoMain;
use \App\Entity\Auto\AutoRu;
use \App\Entity\Auto\AutoEn;

use \App\Entity\Filming\FilmingMain;
use \App\Entity\Filming\FilmingRu;
use \App\Entity\Filming\FilmingEn;

use \App\Entity\Leading\LeadingMain;
use \App\Entity\Leading\LeadingRu;
use \App\Entity\Leading\LeadingEn;

use \App\Entity\Cake\CakeMain;
use \App\Entity\Cake\CakeRu;
use \App\Entity\Cake\CakeEn;

use \App\Entity\Hotel\HotelMain;
use \App\Entity\Hotel\HotelRu;
use \App\Entity\Hotel\HotelEn;

use \App\Core\App;
use \App\Core\Pagination;
use \App\Core\Config;

class ProductController extends \App\Controllers\Base

{
	/** @var Category */
	private $categoryMainModel;

	private $decorMainModel;
	private $decorRuModel;
	private $decorEnModel;

	private $clothesMainModel;
	private $clothesRuModel;
	private $clothesEnModel;
	private $clothesSizeModel;

	private $autoMainModel;
	private $autoRuModel;
	private $autoEnModel;

	private $filmingMainModel;
	private $filmingRuModel;
	private $filmingEnModel;

	private $leadingMainModel;
	private $leadingRuModel;
	private $leadingEnModel;

	private $cakeMainModel;
	private $cakeRuModel;
	private $cakeEnModel;

	private $hotelMainModel;
	private $hotelRuModel;
	private $hotelEnModel;

	public function __construct($params = [])
	{
		parent::__construct($params);

		$this->categoryMainModel = new CategoryMain(App::getConnection());

		$this->decorMainModel = new DecorMain(App::getConnection());
		$this->decorRuModel = new DecorRu(App::getConnection());
		$this->decorEnModel = new DecorEn(App::getConnection());

		$this->clothesMainModel = new ClothesMain(App::getConnection());
		$this->clothesRuModel = new ClothesRu(App::getConnection());
		$this->clothesEnModel = new ClothesEn(App::getConnection());
		$this->clothesSizeModel = new ClothesSize(App::getConnection());

		$this->autoMainModel = new AutoMain(App::getConnection());
		$this->autoRuModel = new AutoRu(App::getConnection());
		$this->autoEnModel = new AutoEn(App::getConnection());

		$this->filmingMainModel = new FilmingMain(App::getConnection());
		$this->filmingRuModel = new FilmingRu(App::getConnection());
		$this->filmingEnModel = new FilmingEn(App::getConnection());

		$this->leadingMainModel = new LeadingMain(App::getConnection());
		$this->leadingRuModel = new LeadingRu(App::getConnection());
		$this->leadingEnModel = new LeadingEn(App::getConnection());

		$this->cakeMainModel = new CakeMain(App::getConnection());
		$this->cakeRuModel = new CakeRu(App::getConnection());
		$this->cakeEnModel = new CakeEn(App::getConnection());

		$this->hotelMainModel = new HotelMain(App::getConnection());
		$this->hotelRuModel = new HotelRu(App::getConnection());
		$this->hotelEnModel = new HotelEn(App::getConnection());
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
				$modelName = $categoryName . 'MainModel';
				$count = count($this->$modelName->list());
				$this->data[$categoryName] = $count;
			}
		}
	}

	public function decorAction()
	{
		// Получаем данные о категории.
		$controller = lcfirst(App::getRouter()->getAction(true));
		$category = $this->categoryMainModel->languageList(['category_name' => $controller])[0];

		// Если категория активна - то начинаем сбор данных, иначе отдаём 404ю страницу.
		if ($category['active'] != 0) {

			// Получаем параметры.
			$params = App::getRouter()->getParams();

			// Если первый параметр 'edit' или 'new', то продолжаем сбор данных, иначе отдаем данные таблицы всех имеющихся товаров.
			if (!empty($params) && ($params[0] == 'edit' || $params[0] == 'new')) {

				// Если первый параметр 'edit' а также же в параметрах есть id услуги - то получаем данные основной модели и языковых моделей.
				if ($params[0] == 'edit' && isset($params[1]) && $params[1] > 0) {

					$idProduct = $params[1];

					// Получаем основную модель. Если модель пуста - отдаём 404ю страницу.
					$mainModel = $this->decorMainModel->list(['id' => $idProduct]);

					if (!empty($mainModel)) {

						// Получаем обе языковые модели
						$ruModel = $this->decorRuModel->list(['id_decor' => $idProduct]);
						$enModel = $this->decorEnModel->list(['id_decor' => $idProduct]);

						// Получаем коллекции изображений. Если директория с id товара существует - то находим в ней изображения.
						if (file_exists(Config::get('decorImgRoot') . $idProduct)) {
							$galery = array_values(array_diff(scandir(Config::get('decorImgRoot') . $idProduct), ['.', '..']));
						} else {
							$galery = false;
						}

						// Отдаём данные.
						$this->data['edit']['main'] = $mainModel[0];
						$this->data['edit']['ru'] = $ruModel[0];
						$this->data['edit']['en'] = $enModel[0];
						$this->data['edit']['galery'] = $galery;
						$this->data['edit']['category'] = $controller;
						$this->data['category'] = $category['title'];

					} else {

						$this->page404();

					}

				// Если первый параметр 'new', то id приравниваем к null, так как он на не потребуется.
				} elseif ($params[0] == 'new') {

					$idProduct = null;

					// Отдаём имя категории.
					$this->data['category'] = $category['title'];


				// Иначе делаем переадресацию на страницу списка услуг.
				} else {

					App::getRouter()->redirect(App::getRouter()->buildUri('product.decor'));

				}

				// Если есть post запрос, обарабатываем и сохраняем полученные данные.
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					try {

						if (isset($_POST['button']) && $_POST['button'] == 'send') {

							// Формируем массивы для сохранения.
							$this->data['ru'] = [
								'title' => $_POST['titleRu'],
								'text' => $_POST['textRu'],
								'contacts' => $_POST['contactsRu']
							];

							$this->data['en'] = [
								'title' => $_POST['titleEn'],
								'text' => $_POST['textEn'],
								'contacts' => $_POST['contactsEn']
							];

							$this->data['main'] = [
								'tel' => $_POST['tel'],
								'fb' => !empty($_POST['fb']) ? $_POST['fb'] : null,
								'inst' => !empty($_POST['inst']) ? $_POST['inst'] : null,
								'telegram' => !empty($_POST['telegram']) ? $_POST['telegram'] : null,
								'price' => $_POST['price'],
								'stock' => !empty($_POST['stock']) ? $_POST['stock'] : null,
								'service' => $_POST['service'],
								'active' => !empty($_POST['active']) ? $_POST['active'] : 0
							];

							// Сохраняем данные. Если это обновление данных, то обновляем их с помощью id продутка, иначе передаём null.
							$this->decorMainModel->save($this->data['main'], $idProduct ? ['id' => $idProduct] : []);

							// Если id продукта у нас еще не было - получим его из свежей записи в main таблицу.
							if (!$idProduct) {

								// Получаем последнюю запись main таблицы, а из неё id.
								$main = $this->decorMainModel->list([], [1, 0], 'id');
								$newId = $main[0]['id'];

								// Дополняем модели новыми id.
								$this->data['ru']['id_decor'] = $newId;
								$this->data['en']['id_decor'] = $newId;
								$this->data['size']['id_decor'] = $newId;
							}

							$this->decorRuModel->save($this->data['ru'], $idProduct ? ['id_decor' => $idProduct] : []);
							$this->decorEnModel->save($this->data['en'], $idProduct ? ['id_decor' => $idProduct] : []);

							// Обрабатываем и сохраняем полученные изображения.
							// Имя директории для сохранения.
							$dir = Config::get('decorImgRoot') . ($idProduct ? $idProduct : $newId);

							// Массив с изображениями.
							$image = $_FILES['photo'];

							//Обрабатываем в более удобную форму полученные фото.
							$image = $this->reArrayFiles($image);

							// Сохраняем.
							$this->saveImage($image, $dir);

							App::getSession()->addFlash(__('admin_product.mes1'));
							App::getRouter()->redirect(App::getRouter()->buildUri('product.decor'));
						}

					} catch (\Exception $exception) {

						App::getSession()->addFlash($exception->getMessage());

					}

				}

			} else {

				// Пагинация.
				$page = isset($this->params[0]) ? $this->params[0] : 1;
				$productsCount = count($this->decorMainModel->languageList());

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
					$this->data['page'] = $page;
					$this->data['product'] = $this->decorMainModel->languageList([], [Config::get('pagLimit'), $offset]);
					$this->data['category'] = $category['title'];
				} else {
					$this->page404();
				}
			}

		} else {
			$this->page404();
		}
	}

	public function clothesAction()
	{
		// Получаем данные о категории.
		$controller = lcfirst(App::getRouter()->getAction(true));
		$category = $this->categoryMainModel->languageList(['category_name' => $controller])[0];

		// Если категория активна - то начинаем сбор данных, иначе отдаём 404ю страницу.
		if ($category['active'] != 0) {

			// Получаем параметры.
			$params = App::getRouter()->getParams();

			// Если первый параметр 'edit' или 'new', то продолжаем сбор данных, иначе отдаем данные таблицы всех имеющихся товаров.
			if (!empty($params) && ($params[0] == 'edit' || $params[0] == 'new')) {

				// Если первый параметр 'edit' а также же в параметрах есть id услуги - то получаем данные основной модели и языковых моделей.
				if ($params[0] == 'edit' && isset($params[1]) && $params[1] > 0) {

					$idProduct = $params[1];

					// Получаем основную модель. Если модель пуста - отдаём 404ю страницу.
					$mainModel = $this->clothesMainModel->list(['id' => $idProduct]);

					if (!empty($mainModel)) {

						// Получаем обе языковые модели
						$ruModel = $this->clothesRuModel->list(['id_clothes' => $idProduct]);
						$enModel = $this->clothesEnModel->list(['id_clothes' => $idProduct]);

						// Получаем модель размеров.
						$sizeModel = $this->clothesSizeModel->list(['id_clothes' => $idProduct]);

						// Получаем коллекции изображений. Если директория с id товара существует - то находим в ней изображения.
						if (file_exists(Config::get('clothesImgRoot') . $idProduct)) {
							$galery = array_values(array_diff(scandir(Config::get('clothesImgRoot') . $idProduct), ['.', '..']));
						} else {
							$galery = false;
						}

						// Отдаём данные.
						$this->data['edit']['main'] = $mainModel[0];
						$this->data['edit']['ru'] = $ruModel[0];
						$this->data['edit']['en'] = $enModel[0];
						$this->data['edit']['size'] = $sizeModel[0];
						$this->data['edit']['galery'] = $galery;
						$this->data['edit']['category'] = $controller;
						$this->data['category'] = $category['title'];

					} else {

						$this->page404();

					}

				// Если первый параметр 'new', то id приравниваем к null, так как он на не потребуется.
				} elseif ($params[0] == 'new') {

					$idProduct = null;

					// Отдаём имя категории.
					$this->data['category'] = $category['title'];


				// Иначе делаем переадресацию на страницу списка услуг.
				} else {

					App::getRouter()->redirect(App::getRouter()->buildUri('product.clothes'));

				}

				// Если есть post запрос, обарабатываем и сохраняем полученные данные.
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					try {

						if (isset($_POST['button']) && $_POST['button'] == 'send') {

							// Формируем массивы для сохранения.
							$this->data['ru'] = [
								'title' => $_POST['titleRu'],
								'text' => $_POST['textRu'],
								'contacts' => $_POST['contactsRu']
							];

							$this->data['en'] = [
								'title' => $_POST['titleEn'],
								'text' => $_POST['textEn'],
								'contacts' => $_POST['contactsEn']
							];

							$this->data['main'] = [
								'tel' => $_POST['tel'],
								'fb' => !empty($_POST['fb']) ? $_POST['fb'] : null,
								'inst' => !empty($_POST['inst']) ? $_POST['inst'] : null,
								'telegram' => !empty($_POST['telegram']) ? $_POST['telegram'] : null,
								'price' => $_POST['price'],
								'stock' => !empty($_POST['stock']) ? $_POST['stock'] : null,
								'sex' => $_POST['sex'],
								'brand' => !empty($_POST['brand']) ? $_POST['brand'] : null,
								'active' => !empty($_POST['active']) ? $_POST['active'] : 0
							];

							$this->data['size'] = [
								's' => !empty($_POST['s']) ? $_POST['s'] : 0,
								'm' => !empty($_POST['m']) ? $_POST['m'] : 0,
								'l' => !empty($_POST['l']) ? $_POST['l'] : 0,
								'xl' => !empty($_POST['xl']) ? $_POST['xl'] : 0
							];

							// Сохраняем данные. Если это обновление данных, то обновляем их с помощью id продутка, иначе передаём null.
							$this->clothesMainModel->save($this->data['main'], $idProduct ? ['id' => $idProduct] : []);

							// Если id продукта у нас еще не было - получим его из свежей записи в main таблицу.
							if (!$idProduct) {

								// Получаем последнюю запись main таблицы, а из неё id.
								$main = $this->clothesMainModel->list([], [1, 0], 'id');
								$newId = $main[0]['id'];

								// Дополняем модели новыми id.
								$this->data['ru']['id_clothes'] = $newId;
								$this->data['en']['id_clothes'] = $newId;
								$this->data['size']['id_clothes'] = $newId;
							}

							$this->clothesRuModel->save($this->data['ru'], $idProduct ? ['id_clothes' => $idProduct] : []);
							$this->clothesEnModel->save($this->data['en'], $idProduct ? ['id_clothes' => $idProduct] : []);
							$this->clothesSizeModel->save($this->data['size'], $idProduct ? ['id_clothes' => $idProduct] : []);

							// Обрабатываем и сохраняем полученные изображения.
							// Имя директории для сохранения.
							$dir = Config::get('clothesImgRoot') . ($idProduct ? $idProduct : $newId);

							// Массив с изображениями.
							$image = $_FILES['photo'];

							//Обрабатываем в более удобную форму полученные фото.
							$image = $this->reArrayFiles($image);

							// Сохраняем.
							$this->saveImage($image, $dir);

							App::getSession()->addFlash(__('admin_product.mes1'));
							App::getRouter()->redirect(App::getRouter()->buildUri('product.clothes'));
						}

					} catch (\Exception $exception) {

						App::getSession()->addFlash($exception->getMessage());

					}

				}

			} else {

				// Пагинация.
				$page = isset($this->params[0]) ? $this->params[0] : 1;
				$productsCount = count($this->clothesMainModel->languageList());

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
					$this->data['page'] = $page;
					$this->data['product'] = $this->clothesMainModel->languageList([], [Config::get('pagLimit'), $offset]);
					$this->data['category'] = $category['title'];
				} else {
					$this->page404();
				}
			}

		} else {
			$this->page404();
		}
	}

	public function autoAction()
	{
		// Получаем данные о категории.
		$controller = lcfirst(App::getRouter()->getAction(true));
		$category = $this->categoryMainModel->languageList(['category_name' => $controller])[0];

		// Если категория активна - то начинаем сбор данных, иначе отдаём 404ю страницу.
		if ($category['active'] != 0) {

			// Получаем параметры.
			$params = App::getRouter()->getParams();

			// Если первый параметр 'edit' или 'new', то продолжаем сбор данных, иначе отдаем данные таблицы всех имеющихся товаров.
			if (!empty($params) && ($params[0] == 'edit' || $params[0] == 'new')) {

				// Если первый параметр 'edit' а также же в параметрах есть id услуги - то получаем данные основной модели и языковых моделей.
				if ($params[0] == 'edit' && isset($params[1]) && $params[1] > 0) {

					$idProduct = $params[1];

					// Получаем основную модель. Если модель пуста - отдаём 404ю страницу.
					$mainModel = $this->autoMainModel->list(['id' => $idProduct]);

					if (!empty($mainModel)) {

						// Получаем обе языковые модели
						$ruModel = $this->autoRuModel->list(['id_auto' => $idProduct]);
						$enModel = $this->autoEnModel->list(['id_auto' => $idProduct]);

						// Получаем коллекции изображений. Если директория с id товара существует - то находим в ней изображения.
						if (file_exists(Config::get('autoImgRoot') . $idProduct)) {
							$galery = array_values(array_diff(scandir(Config::get('autoImgRoot') . $idProduct), ['.', '..']));
						} else {
							$galery = false;
						}

						// Отдаём данные.
						$this->data['edit']['main'] = $mainModel[0];
						$this->data['edit']['ru'] = $ruModel[0];
						$this->data['edit']['en'] = $enModel[0];
						$this->data['edit']['galery'] = $galery;
						$this->data['edit']['category'] = $controller;
						$this->data['category'] = $category['title'];

					} else {

						$this->page404();

					}

				// Если первый параметр 'new', то id приравниваем к null, так как он на не потребуется.
				} elseif ($params[0] == 'new') {

					$idProduct = null;

					// Отдаём имя категории.
					$this->data['category'] = $category['title'];


				// Иначе делаем переадресацию на страницу списка услуг.
				} else {

					App::getRouter()->redirect(App::getRouter()->buildUri('product.auto'));

				}

				// Если есть post запрос, обарабатываем и сохраняем полученные данные.
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					try {

						if (isset($_POST['button']) && $_POST['button'] == 'send') {

							// Формируем массивы для сохранения.
							$this->data['ru'] = [
								'title' => $_POST['titleRu'],
								'text' => $_POST['textRu'],
								'contacts' => $_POST['contactsRu']
							];

							$this->data['en'] = [
								'title' => $_POST['titleEn'],
								'text' => $_POST['textEn'],
								'contacts' => $_POST['contactsEn']
							];

							$this->data['main'] = [
								'tel' => $_POST['tel'],
								'fb' => !empty($_POST['fb']) ? $_POST['fb'] : null,
								'inst' => !empty($_POST['inst']) ? $_POST['inst'] : null,
								'telegram' => !empty($_POST['telegram']) ? $_POST['telegram'] : null,
								'price' => $_POST['price'],
								'stock' => !empty($_POST['stock']) ? $_POST['stock'] : null,
								'brand' => !empty($_POST['brand']) ? $_POST['brand'] : null,
								'active' => !empty($_POST['active']) ? $_POST['active'] : 0
							];

							// Сохраняем данные. Если это обновление данных, то обновляем их с помощью id продутка, иначе передаём null.
							$this->autoMainModel->save($this->data['main'], $idProduct ? ['id' => $idProduct] : []);

							// Если id продукта у нас еще не было - получим его из свежей записи в main таблицу.
							if (!$idProduct) {

								// Получаем последнюю запись main таблицы, а из неё id.
								$main = $this->autoMainModel->list([], [1, 0], 'id');
								$newId = $main[0]['id'];

								// Дополняем модели новыми id.
								$this->data['ru']['id_auto'] = $newId;
								$this->data['en']['id_auto'] = $newId;
								$this->data['size']['id_auto'] = $newId;
							}

							$this->autoRuModel->save($this->data['ru'], $idProduct ? ['id_auto' => $idProduct] : []);
							$this->autoEnModel->save($this->data['en'], $idProduct ? ['id_auto' => $idProduct] : []);

							// Обрабатываем и сохраняем полученные изображения.
							// Имя директории для сохранения.
							$dir = Config::get('autoImgRoot') . ($idProduct ? $idProduct : $newId);

							// Массив с изображениями.
							$image = $_FILES['photo'];

							//Обрабатываем в более удобную форму полученные фото.
							$image = $this->reArrayFiles($image);

							// Сохраняем.
							$this->saveImage($image, $dir);

							App::getSession()->addFlash(__('admin_product.mes1'));
							App::getRouter()->redirect(App::getRouter()->buildUri('product.auto'));
						}

					} catch (\Exception $exception) {

						App::getSession()->addFlash($exception->getMessage());

					}

				}

			} else {

				// Пагинация.
				$page = isset($this->params[0]) ? $this->params[0] : 1;
				$productsCount = count($this->autoMainModel->languageList());

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
					$this->data['page'] = $page;
					$this->data['product'] = $this->autoMainModel->languageList([], [Config::get('pagLimit'), $offset]);
					$this->data['category'] = $category['title'];
				} else {
					$this->page404();
				}
			}

		} else {
			$this->page404();
		}
	}

	public function filmingAction()
	{
		// Получаем данные о категории.
		$controller = lcfirst(App::getRouter()->getAction(true));
		$category = $this->categoryMainModel->languageList(['category_name' => $controller])[0];

		// Если категория активна - то начинаем сбор данных, иначе отдаём 404ю страницу.
		if ($category['active'] != 0) {

			// Получаем параметры.
			$params = App::getRouter()->getParams();

			// Если первый параметр 'edit' или 'new', то продолжаем сбор данных, иначе отдаем данные таблицы всех имеющихся товаров.
			if (!empty($params) && ($params[0] == 'edit' || $params[0] == 'new')) {

				// Если первый параметр 'edit' а также же в параметрах есть id услуги - то получаем данные основной модели и языковых моделей.
				if ($params[0] == 'edit' && isset($params[1]) && $params[1] > 0) {

					$idProduct = $params[1];

					// Получаем основную модель. Если модель пуста - отдаём 404ю страницу.
					$mainModel = $this->filmingMainModel->list(['id' => $idProduct]);

					if (!empty($mainModel)) {

						// Получаем обе языковые модели
						$ruModel = $this->filmingRuModel->list(['id_filming' => $idProduct]);
						$enModel = $this->filmingEnModel->list(['id_filming' => $idProduct]);

						// Получаем коллекции изображений. Если директория с id товара существует - то находим в ней изображения.
						if (file_exists(Config::get('filmingImgRoot') . $idProduct)) {
							$galery = array_values(array_diff(scandir(Config::get('filmingImgRoot') . $idProduct), ['.', '..']));
						} else {
							$galery = false;
						}

						// Отдаём данные.
						$this->data['edit']['main'] = $mainModel[0];
						$this->data['edit']['ru'] = $ruModel[0];
						$this->data['edit']['en'] = $enModel[0];
						$this->data['edit']['galery'] = $galery;
						$this->data['edit']['category'] = $controller;
						$this->data['category'] = $category['title'];

					} else {

						$this->page404();

					}

				// Если первый параметр 'new', то id приравниваем к null, так как он на не потребуется.
				} elseif ($params[0] == 'new') {

					$idProduct = null;

					// Отдаём имя категории.
					$this->data['category'] = $category['title'];


				// Иначе делаем переадресацию на страницу списка услуг.
				} else {

					App::getRouter()->redirect(App::getRouter()->buildUri('product.filming'));

				}

				// Если есть post запрос, обарабатываем и сохраняем полученные данные.
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					try {

						if (isset($_POST['button']) && $_POST['button'] == 'send') {

							// Формируем массивы для сохранения.
							$this->data['ru'] = [
								'title' => $_POST['titleRu'],
								'text' => $_POST['textRu'],
								'contacts' => $_POST['contactsRu']
							];

							$this->data['en'] = [
								'title' => $_POST['titleEn'],
								'text' => $_POST['textEn'],
								'contacts' => $_POST['contactsEn']
							];

							$this->data['main'] = [
								'tel' => $_POST['tel'],
								'fb' => !empty($_POST['fb']) ? $_POST['fb'] : null,
								'inst' => !empty($_POST['inst']) ? $_POST['inst'] : null,
								'telegram' => !empty($_POST['telegram']) ? $_POST['telegram'] : null,
								'price' => $_POST['price'],
								'stock' => !empty($_POST['stock']) ? $_POST['stock'] : null,
								'active' => !empty($_POST['active']) ? $_POST['active'] : 0
							];

							// Сохраняем данные. Если это обновление данных, то обновляем их с помощью id продутка, иначе передаём null.
							$this->filmingMainModel->save($this->data['main'], $idProduct ? ['id' => $idProduct] : []);

							// Если id продукта у нас еще не было - получим его из свежей записи в main таблицу.
							if (!$idProduct) {

								// Получаем последнюю запись main таблицы, а из неё id.
								$main = $this->filmingMainModel->list([], [1, 0], 'id');
								$newId = $main[0]['id'];

								// Дополняем модели новыми id.
								$this->data['ru']['id_filming'] = $newId;
								$this->data['en']['id_filming'] = $newId;
								$this->data['size']['id_filming'] = $newId;
							}

							$this->filmingRuModel->save($this->data['ru'], $idProduct ? ['id_filming' => $idProduct] : []);
							$this->filmingEnModel->save($this->data['en'], $idProduct ? ['id_filming' => $idProduct] : []);

							// Обрабатываем и сохраняем полученные изображения.
							// Имя директории для сохранения.
							$dir = Config::get('filmingImgRoot') . ($idProduct ? $idProduct : $newId);

							// Массив с изображениями.
							$image = $_FILES['photo'];

							//Обрабатываем в более удобную форму полученные фото.
							$image = $this->reArrayFiles($image);

							// Сохраняем.
							$this->saveImage($image, $dir);

							App::getSession()->addFlash(__('admin_product.mes1'));
							App::getRouter()->redirect(App::getRouter()->buildUri('product.filming'));
						}

					} catch (\Exception $exception) {

						App::getSession()->addFlash($exception->getMessage());

					}

				}

			} else {

				// Пагинация.
				$page = isset($this->params[0]) ? $this->params[0] : 1;
				$productsCount = count($this->filmingMainModel->languageList());

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
					$this->data['page'] = $page;
					$this->data['product'] = $this->filmingMainModel->languageList([], [Config::get('pagLimit'), $offset]);
					$this->data['category'] = $category['title'];
				} else {
					$this->page404();
				}
			}

		} else {
			$this->page404();
		}
	}

	public function leadingAction()
	{
		// Получаем данные о категории.
		$controller = lcfirst(App::getRouter()->getAction(true));
		$category = $this->categoryMainModel->languageList(['category_name' => $controller])[0];

		// Если категория активна - то начинаем сбор данных, иначе отдаём 404ю страницу.
		if ($category['active'] != 0) {

			// Получаем параметры.
			$params = App::getRouter()->getParams();

			// Если первый параметр 'edit' или 'new', то продолжаем сбор данных, иначе отдаем данные таблицы всех имеющихся товаров.
			if (!empty($params) && ($params[0] == 'edit' || $params[0] == 'new')) {

				// Если первый параметр 'edit' а также же в параметрах есть id услуги - то получаем данные основной модели и языковых моделей.
				if ($params[0] == 'edit' && isset($params[1]) && $params[1] > 0) {

					$idProduct = $params[1];

					// Получаем основную модель. Если модель пуста - отдаём 404ю страницу.
					$mainModel = $this->leadingMainModel->list(['id' => $idProduct]);

					if (!empty($mainModel)) {

						// Получаем обе языковые модели
						$ruModel = $this->leadingRuModel->list(['id_leading' => $idProduct]);
						$enModel = $this->leadingEnModel->list(['id_leading' => $idProduct]);

						// Получаем коллекции изображений. Если директория с id товара существует - то находим в ней изображения.
						if (file_exists(Config::get('leadingImgRoot') . $idProduct)) {
							$galery = array_values(array_diff(scandir(Config::get('leadingImgRoot') . $idProduct), ['.', '..']));
						} else {
							$galery = false;
						}

						// Отдаём данные.
						$this->data['edit']['main'] = $mainModel[0];
						$this->data['edit']['ru'] = $ruModel[0];
						$this->data['edit']['en'] = $enModel[0];
						$this->data['edit']['galery'] = $galery;
						$this->data['edit']['category'] = $controller;
						$this->data['category'] = $category['title'];

					} else {

						$this->page404();

					}

				// Если первый параметр 'new', то id приравниваем к null, так как он на не потребуется.
				} elseif ($params[0] == 'new') {

					$idProduct = null;

					// Отдаём имя категории.
					$this->data['category'] = $category['title'];


				// Иначе делаем переадресацию на страницу списка услуг.
				} else {

					App::getRouter()->redirect(App::getRouter()->buildUri('product.leading'));

				}

				// Если есть post запрос, обарабатываем и сохраняем полученные данные.
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					try {

						if (isset($_POST['button']) && $_POST['button'] == 'send') {

							// Формируем массивы для сохранения.
							$this->data['ru'] = [
								'title' => $_POST['titleRu'],
								'text' => $_POST['textRu'],
								'contacts' => $_POST['contactsRu']
							];

							$this->data['en'] = [
								'title' => $_POST['titleEn'],
								'text' => $_POST['textEn'],
								'contacts' => $_POST['contactsEn']
							];

							$this->data['main'] = [
								'tel' => $_POST['tel'],
								'fb' => !empty($_POST['fb']) ? $_POST['fb'] : null,
								'inst' => !empty($_POST['inst']) ? $_POST['inst'] : null,
								'telegram' => !empty($_POST['telegram']) ? $_POST['telegram'] : null,
								'price' => $_POST['price'],
								'stock' => !empty($_POST['stock']) ? $_POST['stock'] : null,
								'active' => !empty($_POST['active']) ? $_POST['active'] : 0
							];

							// Сохраняем данные. Если это обновление данных, то обновляем их с помощью id продутка, иначе передаём null.
							$this->leadingMainModel->save($this->data['main'], $idProduct ? ['id' => $idProduct] : []);

							// Если id продукта у нас еще не было - получим его из свежей записи в main таблицу.
							if (!$idProduct) {

								// Получаем последнюю запись main таблицы, а из неё id.
								$main = $this->leadingMainModel->list([], [1, 0], 'id');
								$newId = $main[0]['id'];

								// Дополняем модели новыми id.
								$this->data['ru']['id_leading'] = $newId;
								$this->data['en']['id_leading'] = $newId;
								$this->data['size']['id_leading'] = $newId;
							}

							$this->leadingRuModel->save($this->data['ru'], $idProduct ? ['id_leading' => $idProduct] : []);
							$this->leadingEnModel->save($this->data['en'], $idProduct ? ['id_leading' => $idProduct] : []);

							// Обрабатываем и сохраняем полученные изображения.
							// Имя директории для сохранения.
							$dir = Config::get('leadingImgRoot') . ($idProduct ? $idProduct : $newId);

							// Массив с изображениями.
							$image = $_FILES['photo'];

							//Обрабатываем в более удобную форму полученные фото.
							$image = $this->reArrayFiles($image);

							// Сохраняем.
							$this->saveImage($image, $dir);

							App::getSession()->addFlash(__('admin_product.mes1'));
							App::getRouter()->redirect(App::getRouter()->buildUri('product.leading'));
						}

					} catch (\Exception $exception) {

						App::getSession()->addFlash($exception->getMessage());

					}

				}

			} else {

				// Пагинация.
				$page = isset($this->params[0]) ? $this->params[0] : 1;
				$productsCount = count($this->leadingMainModel->languageList());

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
					$this->data['page'] = $page;
					$this->data['product'] = $this->leadingMainModel->languageList([], [Config::get('pagLimit'), $offset]);
					$this->data['category'] = $category['title'];
				} else {
					$this->page404();
				}
			}

		} else {
			$this->page404();
		}
	}

	public function cakeAction()
	{
		// Получаем данные о категории.
		$controller = lcfirst(App::getRouter()->getAction(true));
		$category = $this->categoryMainModel->languageList(['category_name' => $controller])[0];

		// Если категория активна - то начинаем сбор данных, иначе отдаём 404ю страницу.
		if ($category['active'] != 0) {

			// Получаем параметры.
			$params = App::getRouter()->getParams();

			// Если первый параметр 'edit' или 'new', то продолжаем сбор данных, иначе отдаем данные таблицы всех имеющихся товаров.
			if (!empty($params) && ($params[0] == 'edit' || $params[0] == 'new')) {

				// Если первый параметр 'edit' а также же в параметрах есть id услуги - то получаем данные основной модели и языковых моделей.
				if ($params[0] == 'edit' && isset($params[1]) && $params[1] > 0) {

					$idProduct = $params[1];

					// Получаем основную модель. Если модель пуста - отдаём 404ю страницу.
					$mainModel = $this->cakeMainModel->list(['id' => $idProduct]);

					if (!empty($mainModel)) {

						// Получаем обе языковые модели
						$ruModel = $this->cakeRuModel->list(['id_cake' => $idProduct]);
						$enModel = $this->cakeEnModel->list(['id_cake' => $idProduct]);

						// Получаем коллекции изображений. Если директория с id товара существует - то находим в ней изображения.
						if (file_exists(Config::get('cakeImgRoot') . $idProduct)) {
							$galery = array_values(array_diff(scandir(Config::get('cakeImgRoot') . $idProduct), ['.', '..']));
						} else {
							$galery = false;
						}

						// Отдаём данные.
						$this->data['edit']['main'] = $mainModel[0];
						$this->data['edit']['ru'] = $ruModel[0];
						$this->data['edit']['en'] = $enModel[0];
						$this->data['edit']['galery'] = $galery;
						$this->data['edit']['category'] = $controller;
						$this->data['category'] = $category['title'];

					} else {

						$this->page404();

					}

				// Если первый параметр 'new', то id приравниваем к null, так как он на не потребуется.
				} elseif ($params[0] == 'new') {

					$idProduct = null;

					// Отдаём имя категории.
					$this->data['category'] = $category['title'];


				// Иначе делаем переадресацию на страницу списка услуг.
				} else {

					App::getRouter()->redirect(App::getRouter()->buildUri('product.cake'));

				}

				// Если есть post запрос, обарабатываем и сохраняем полученные данные.
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					try {

						if (isset($_POST['button']) && $_POST['button'] == 'send') {

							// Формируем массивы для сохранения.
							$this->data['ru'] = [
								'title' => $_POST['titleRu'],
								'text' => $_POST['textRu'],
								'contacts' => $_POST['contactsRu']
							];

							$this->data['en'] = [
								'title' => $_POST['titleEn'],
								'text' => $_POST['textEn'],
								'contacts' => $_POST['contactsEn']
							];

							$this->data['main'] = [
								'tel' => $_POST['tel'],
								'fb' => !empty($_POST['fb']) ? $_POST['fb'] : null,
								'inst' => !empty($_POST['inst']) ? $_POST['inst'] : null,
								'telegram' => !empty($_POST['telegram']) ? $_POST['telegram'] : null,
								'price' => $_POST['price'],
								'stock' => !empty($_POST['stock']) ? $_POST['stock'] : null,
								'active' => !empty($_POST['active']) ? $_POST['active'] : 0
							];

							// Сохраняем данные. Если это обновление данных, то обновляем их с помощью id продутка, иначе передаём null.
							$this->cakeMainModel->save($this->data['main'], $idProduct ? ['id' => $idProduct] : []);

							// Если id продукта у нас еще не было - получим его из свежей записи в main таблицу.
							if (!$idProduct) {

								// Получаем последнюю запись main таблицы, а из неё id.
								$main = $this->cakeMainModel->list([], [1, 0], 'id');
								$newId = $main[0]['id'];

								// Дополняем модели новыми id.
								$this->data['ru']['id_cake'] = $newId;
								$this->data['en']['id_cake'] = $newId;
								$this->data['size']['id_cake'] = $newId;
							}

							$this->cakeRuModel->save($this->data['ru'], $idProduct ? ['id_cake' => $idProduct] : []);
							$this->cakeEnModel->save($this->data['en'], $idProduct ? ['id_cake' => $idProduct] : []);

							// Обрабатываем и сохраняем полученные изображения.
							// Имя директории для сохранения.
							$dir = Config::get('cakeImgRoot') . ($idProduct ? $idProduct : $newId);

							// Массив с изображениями.
							$image = $_FILES['photo'];

							//Обрабатываем в более удобную форму полученные фото.
							$image = $this->reArrayFiles($image);

							// Сохраняем.
							$this->saveImage($image, $dir);

							App::getSession()->addFlash(__('admin_product.mes1'));
							App::getRouter()->redirect(App::getRouter()->buildUri('product.cake'));
						}

					} catch (\Exception $exception) {

						App::getSession()->addFlash($exception->getMessage());

					}

				}

			} else {

				// Пагинация.
				$page = isset($this->params[0]) ? $this->params[0] : 1;
				$productsCount = count($this->cakeMainModel->languageList());

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
					$this->data['page'] = $page;
					$this->data['product'] = $this->cakeMainModel->languageList([], [Config::get('pagLimit'), $offset]);
					$this->data['category'] = $category['title'];
				} else {
					$this->page404();
				}
			}

		} else {
			$this->page404();
		}
	}

	public function hotelAction()
	{
		// Получаем данные о категории.
		$controller = lcfirst(App::getRouter()->getAction(true));
		$category = $this->categoryMainModel->languageList(['category_name' => $controller])[0];

		// Если категория активна - то начинаем сбор данных, иначе отдаём 404ю страницу.
		if ($category['active'] != 0) {

			// Получаем параметры.
			$params = App::getRouter()->getParams();

			// Если первый параметр 'edit' или 'new', то продолжаем сбор данных, иначе отдаем данные таблицы всех имеющихся товаров.
			if (!empty($params) && ($params[0] == 'edit' || $params[0] == 'new')) {

				// Если первый параметр 'edit' а также же в параметрах есть id услуги - то получаем данные основной модели и языковых моделей.
				if ($params[0] == 'edit' && isset($params[1]) && $params[1] > 0) {

					$idProduct = $params[1];

					// Получаем основную модель. Если модель пуста - отдаём 404ю страницу.
					$mainModel = $this->hotelMainModel->list(['id' => $idProduct]);

					if (!empty($mainModel)) {

						// Получаем обе языковые модели
						$ruModel = $this->hotelRuModel->list(['id_cake' => $idProduct]);
						$enModel = $this->hotelEnModel->list(['id_cake' => $idProduct]);

						// Получаем коллекции изображений. Если директория с id товара существует - то находим в ней изображения.
						if (file_exists(Config::get('hotelImgRoot') . $idProduct)) {
							$galery = array_values(array_diff(scandir(Config::get('hotelImgRoot') . $idProduct), ['.', '..']));
						} else {
							$galery = false;
						}

						// Отдаём данные.
						$this->data['edit']['main'] = $mainModel[0];
						$this->data['edit']['ru'] = $ruModel[0];
						$this->data['edit']['en'] = $enModel[0];
						$this->data['edit']['galery'] = $galery;
						$this->data['edit']['category'] = $controller;
						$this->data['category'] = $category['title'];

					} else {

						$this->page404();

					}

				// Если первый параметр 'new', то id приравниваем к null, так как он на не потребуется.
				} elseif ($params[0] == 'new') {

					$idProduct = null;

					// Отдаём имя категории.
					$this->data['category'] = $category['title'];


				// Иначе делаем переадресацию на страницу списка услуг.
				} else {

					App::getRouter()->redirect(App::getRouter()->buildUri('product.hotel'));

				}

				// Если есть post запрос, обарабатываем и сохраняем полученные данные.
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					try {

						if (isset($_POST['button']) && $_POST['button'] == 'send') {

							// Формируем массивы для сохранения.
							$this->data['ru'] = [
								'title' => $_POST['titleRu'],
								'text' => $_POST['textRu'],
								'contacts' => $_POST['contactsRu']
							];

							$this->data['en'] = [
								'title' => $_POST['titleEn'],
								'text' => $_POST['textEn'],
								'contacts' => $_POST['contactsEn']
							];

							$this->data['main'] = [
								'tel' => $_POST['tel'],
								'fb' => !empty($_POST['fb']) ? $_POST['fb'] : null,
								'inst' => !empty($_POST['inst']) ? $_POST['inst'] : null,
								'telegram' => !empty($_POST['telegram']) ? $_POST['telegram'] : null,
								'stars' => $_POST['stars'],
								'price' => $_POST['price'],
								'stock' => !empty($_POST['stock']) ? $_POST['stock'] : null,
								'active' => !empty($_POST['active']) ? $_POST['active'] : 0
							];

							// Сохраняем данные. Если это обновление данных, то обновляем их с помощью id продутка, иначе передаём null.
							$this->hotelMainModel->save($this->data['main'], $idProduct ? ['id' => $idProduct] : []);

							// Если id продукта у нас еще не было - получим его из свежей записи в main таблицу.
							if (!$idProduct) {

								// Получаем последнюю запись main таблицы, а из неё id.
								$main = $this->hotelMainModel->list([], [1, 0], 'id');
								$newId = $main[0]['id'];

								// Дополняем модели новыми id.
								$this->data['ru']['id_hotel'] = $newId;
								$this->data['en']['id_hotel'] = $newId;
								$this->data['size']['id_hotel'] = $newId;
							}

							$this->hotelRuModel->save($this->data['ru'], $idProduct ? ['id_hotel' => $idProduct] : []);
							$this->hotelEnModel->save($this->data['en'], $idProduct ? ['id_hotel' => $idProduct] : []);

							// Обрабатываем и сохраняем полученные изображения.
							// Имя директории для сохранения.
							$dir = Config::get('hotelImgRoot') . ($idProduct ? $idProduct : $newId);

							// Массив с изображениями.
							$image = $_FILES['photo'];

							//Обрабатываем в более удобную форму полученные фото.
							$image = $this->reArrayFiles($image);

							// Сохраняем.
							$this->saveImage($image, $dir);

							App::getSession()->addFlash(__('admin_product.mes1'));
							App::getRouter()->redirect(App::getRouter()->buildUri('product.hotel'));
						}

					} catch (\Exception $exception) {

						App::getSession()->addFlash($exception->getMessage());

					}

				}

			} else {

				// Пагинация.
				$page = isset($this->params[0]) ? $this->params[0] : 1;
				$productsCount = count($this->hotelMainModel->languageList());

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
					$this->data['page'] = $page;
					$this->data['product'] = $this->hotelMainModel->languageList([], [Config::get('pagLimit'), $offset]);
					$this->data['category'] = $category['title'];
				} else {
					$this->page404();
				}
			}

		} else {
			$this->page404();
		}
	}

	// Преобразование массива $_FILES в более удобную структуру.
	private function reArrayFiles($file_post)
	{
		$file_ary = [];
		$file_count = count($file_post['name']);
		$file_keys = array_keys($file_post);

		for ($i=0; $i < $file_count; $i++) {
			foreach ($file_keys as $key) {
				$file_ary[$i][$key] = $file_post[$key][$i];
			}
		}

		return $file_ary;
	}

	// Сохранение изображений.
	private function saveImage($imageArray, $nameDir)
	{
		foreach ($imageArray as $key => $value) {

			// Проверяем загрузку изображения - если нету ошибок, то продолжаем сохранение.
			if ($imageArray[$key]['error'] != 0) {
				continue;
			}

			// Проверка на наличие загружаемого изображения.
			if (!file_exists($imageArray[$key]['tmp_name'])) {
				throw new \Exception(__('user_settings.error1'));
			}

			// Проверка на тип файла. Получение расширения изображения.
			switch(getimagesize($imageArray[$key]['tmp_name'])['mime']) {
				case 'image/gif':
					$fileType = '.gif';
					break;
				case 'image/jpeg':
					$fileType = '.jpg';
					break;
				case 'image/png':
					$fileType = '.png';
					break;
				default:
					throw new \Exception(__('user_settings.error2'));
			}

			// Проверка наличия директории. Если нету таковой - то создание новой.
			if (!file_exists($nameDir)) {
				mkdir($nameDir, 0777);
			}

			// Путь к изображению.
			$paths = $nameDir . DS . uniqid('img_') . $fileType;

			// Загрузка изображения. Если происходит ошибка - выбрасываем исключение.
			if (!move_uploaded_file($imageArray[$key]['tmp_name'], $paths)) {

				// Если директория остается пустой - то удаляем директорию.
				$arrayImages = array_values(array_diff(scandir($nameDir), ['.', '..']));

				if (count($arrayImages) == 0) {
					rmdir($nameDir);
				}

				throw new \Exception(__('user_settings.error3'));
			}
		}
	}

	// Метод удаления изображений.
	public function deleteImageAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			try {

				// Получаем то, что пришело в POST запросе.
				$idProduct = $_POST['id'];
				$category = $_POST['category'];
				$nameImage = $_POST['name'];

				// Получаем нужную директорию.
				$imagesPathName = $category . 'ImgRoot';
				$imagesPath = Config::get($imagesPathName) . $idProduct;

				// Если директория существует - выполняем операции.
				if (file_exists($imagesPath)) {

					// Удаляем изображение.
					unlink($imagesPath . DS . $nameImage);

					// Если директория остается пустой - то удаляем и директорию.
					$arrayImages = array_values(array_diff(scandir($imagesPath), ['.', '..']));

					if (count($arrayImages) == 0) {
						rmdir($imagesPath);
					}
				}

				// Посылаем сигнал об успешности операции.
				echo json_encode([
					'result' => 'success'
				]);

				die();

			} catch (\Exception $exception) {

				// Если была ошибка при удалении - посылаем тект ошибки.
				echo json_encode([
					'result' => 'error',
					'msg' => $exception->getMessage()
				]);

				die();

			}

		}
	}
}
