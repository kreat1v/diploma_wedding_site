<?php

namespace App\Controllers\Admin;

use \App\Entity\Category\CategoryMain;
use \App\Entity\Category\CategoryRu;
use \App\Entity\Category\CategoryEn;
use \App\Core\App;

class CategoryController extends \App\Controllers\Base

{
	/** @var Category */
	private $categoryMainModel;
	private $categoryRuModel;
	private $categoryEnModel;

	public function __construct($params = [])
	{
		parent::__construct($params);

		$this->categoryMainModel = new CategoryMain(App::getConnection());
		$this->categoryRuModel = new CategoryRu(App::getConnection());
		$this->categoryEnModel = new CategoryEn(App::getConnection());
	}

	public function indexAction()
	{
		$this->data = $this->categoryMainModel->languageList();
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
		$string = '<p>' . str_replace("\r\n", '</p><p>', $string) . '</p>';

		return $string;
	}

	// Функция форматирования текстовых блоков - убираем теги абзаца и заменяем их на переносы строки.
	private function formattingTextForOutput($string)
	{
		$string = ltrim($string, '<p>');
		$string = rtrim($string, '</p>');
		$string = str_replace('</p><p></p><p>', "\n\n", $string);

		return $string;
	}
}
