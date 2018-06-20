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

	public function clothesAction()
	{
		// Получаем данные о категории.
		$controller = lcfirst(App::getRouter()->getAction(true));
		$category = $this->categoryMainModel->languageList(['category_name' => $controller])[0];

		// Если категория активна - то начинаем сбор данных, иначе отдаём 404ю страницу.
		if ($category['active'] != 0) {

			// Получаем параметры.
			$params = App::getRouter()->getParams();

			if (!empty($params) && $params[0] == 'new') {

			// Если первый параметр 'edit' то получаем данные основной модели, а так же языковых моделей.
			} elseif (!empty($params) && $params[0] == 'edit') {

				// Если в параметрах есть id услуги - то продолжаем получение и обработку данных, иначе делаем переадресацию на страницу списка услуг.
				if (isset($params[1]) && $params[1] > 0) {

					$id_product = $params[1];

					// Получаем основную модель. Если модель пуста - отдаём 404ю страницу.
					$mainModel = $this->clothesMainModel->languageList(['id' => $params[1]]);

					if (!empty($mainModel)) {

						// Получаем обе языковые модели
						$ruModel = $this->clothesRuModel->languageList(['id_clothes' => $params[1]]);
						$enModel = $this->clothesEnModel->languageList(['id_clothes' => $params[1]]);

						// Отдаём данные.
						$this->data['edit']['main'] = $mainModel[0];
						$this->data['edit']['ru'] = $ruModel[0];
						$this->data['edit']['en'] = $enModel[0];

					} else {

						$this->page404();

					}

				} else {

					App::getRouter()->redirect(App::getRouter()->buildUri('product.clothes'));

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
				} else {
					$this->page404();
				}
			}

		} else {
			$this->page404();
		}
	}

	public function editAction()
	{

		// Если в параметрах есть id категории - то продолжаем получение и обработку данных, иначе делаем переадресацию на страницу списка категорий.
		if (isset($this->params[0]) && $this->params[0] > 0) {

			// id категории.
			$idCategory = $this->params[0];

			// Получаем категорию.
			$mainModel = $this->categoryMainModel->list(['id' => $idCategory]);

			// Если категория существует, то продолжаем получать и обрабатывать данные, иначе выдаём 404ю страницу.
			if (!empty($mainModel)) {

				// Получаем обе языковые модели
				$ruModel = $this->categoryRuModel->list(['id_category' => $idCategory]);
				$enModel = $this->categoryEnModel->list(['id_category' => $idCategory]);

				// Отдаём данные.
				$this->data['main'] = $mainModel[0];
				$this->data['ru'] = $ruModel[0];
				$this->data['en'] = $enModel[0];

				// Если есть post запрос, обарабатываем и сохраняем полученные данные.
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					try {

						if (isset($_POST['button']) && $_POST['button'] == 'send') {

							// Обрабатываем полученный русский текст для сохранения в БД.
							$ruFirstText = $_POST['firstTextRu'];
							$ruSecondText = $_POST['secondTextRu'];
							$ruFirstText = $this->formattingTextForDatabase($ruFirstText);
							$ruSecondText = $this->formattingTextForDatabase($ruSecondText);

							// Формируем массив для сохранения.
							$this->data['ru'] = [
								'title' => $_POST['titleRu'],
								'first_text' => $ruFirstText,
								'full_title' => $_POST['fullTitleRu'],
								'second_text' => $ruSecondText
							];

							// Обрабатываем полученный английский текст для сохранения в БД.
							$enFirstText = $_POST['firstTextEn'];
							$enSecondText = $_POST['secondTextEn'];
							$enFirstText = $this->formattingTextForDatabase($enFirstText);
							$enSecondText = $this->formattingTextForDatabase($enSecondText);

							// Формируем массив для сохранения.
							$this->data['en'] = [
								'title' => $_POST['titleEn'],
								'first_text' => $enFirstText,
								'full_title' => $_POST['fullTitleEn'],
								'second_text' => $enSecondText
							];

							// Формируем массив активности категории.
							$this->data['main'] = [
								'active' => $_POST['active']
							];

							// Сохраняем данные.
							$this->categoryRuModel->save($this->data['ru'], ['id_category' => $idCategory]);
							$this->categoryEnModel->save($this->data['en'], ['id_category' => $idCategory]);
							$this->categoryMainModel->save($this->data['main'], ['id' => $idCategory]);

							App::getSession()->addFlash(__('admin_category.mes3'));
							App::getRouter()->redirect(App::getRouter()->buildUri('.category'));
						}

					} catch (\Exception $exception) {

						App::getSession()->addFlash($exception->getMessage());

					}
				}

				// Заменяем текстовые блоки для вывода с помощью нашей функции.
				$this->data['ru']['first_text'] = $this->formattingTextForOutput($this->data['ru']['first_text']);
				$this->data['en']['first_text'] = $this->formattingTextForOutput($this->data['en']['first_text']);
				$this->data['ru']['second_text'] = $this->formattingTextForOutput($this->data['ru']['second_text']);
				$this->data['en']['second_text'] = $this->formattingTextForOutput($this->data['en']['second_text']);

			} else {

				$this->page404();

			}

		} else {

			App::getRouter()->redirect(App::getRouter()->buildUri('.category'));

		}
	}

	// Функция обработки текста для сохранения в БД.
	private function formattingTextForDatabase($string)
	{
		$string = '<p>' . str_replace(PHP_EOL . PHP_EOL, '</p><p>', $string) . '</p>';

		return $string;
	}

	// Функция форматирования текстовых блоков - убираем теги абзаца и заменяем их на переносы строки.
	private function formattingTextForOutput($string)
	{
		$string = ltrim($string, '<p>');
		$string = rtrim($string, '</p>');
		$string = str_replace('</p><p>', PHP_EOL . PHP_EOL, $string);

		return $string;
	}
}
