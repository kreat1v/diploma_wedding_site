<?php

namespace App\Controllers\Admin;

use \App\Entity\Stories\StoriesMain;
use \App\Entity\Stories\StoriesRu;
use \App\Entity\Stories\StoriesEn;
use \App\Core\App;
use \App\Core\Config;
use \App\Core\Pagination;

class StoriesController extends \App\Controllers\Base
{
	private $storiesMainModel;
	private $storiesRuModel;
	private $storiesEnModel;

	public function __construct($params = [])
	{
		parent::__construct($params);

		$this->storiesMainModel = new StoriesMain(App::getConnection());
		$this->storiesRuModel = new StoriesRu(App::getConnection());
		$this->storiesEnModel = new StoriesEn(App::getConnection());
	}

	public function indexAction()
	{

		// Пагинация.
		$page = isset($this->params[0]) ? $this->params[0] : 1;
		$productsCount = count($this->storiesMainModel->languageList());

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
			$this->data['stories'] = $this->storiesMainModel->languageList([], [Config::get('pagLimit'), $offset]);
		} else {
			$this->page404();
		}

	}

	public function editAction()
	{
		// Получаем параметры.
		$params = App::getRouter()->getParams();

		// Если в параметрах есть id услуги - то получаем данные основной модели и языковых моделей.
		if (isset($params[0]) && $params[0] > 0) {

			$idStories = $params[0];

			// Получаем основную модель. Если модель пуста - отдаём 404ю страницу.
			$mainModel = $this->storiesMainModel->list(['id' => $idStories]);

			if (!empty($mainModel)) {

				// Получаем обе языковые модели
				$ruModel = $this->storiesRuModel->list(['id_stories' => $idStories]);
				$enModel = $this->storiesEnModel->list(['id_stories' => $idStories]);

				// Получаем коллекции изображений. Если директория с id товара существует - то находим в ней изображения.
				if (file_exists(Config::get('storiesImgRoot') . $idStories)) {
					$galery = array_values(array_diff(scandir(Config::get('storiesImgRoot') . $idStories), ['.', '..']));
				} else {
					$galery = false;
				}

				// Отдаём данные.
				$this->data['edit']['main'] = $mainModel[0];
				$this->data['edit']['ru'] = $ruModel[0];
				$this->data['edit']['en'] = $enModel[0];
				$this->data['edit']['galery'] = $galery;

			} else {

				$this->page404();

			}

		// Иначе id приравниваем к null, так как он нам не потребуется.
		} else {

			$idStories = null;

		}

		// Если есть post запрос, обарабатываем и сохраняем полученные данные.
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {

				if (isset($_POST['button']) && $_POST['button'] == 'send') {

					// Обрабатываем полученный русский текст для сохранения в БД.
					$contentRu = $_POST['contentRu'];
					$contentRu = $this->formattingTextForDatabase($contentRu);

					// Формируем массив для сохранения.
					$this->data['edit']['ru'] = [
						'title' => $_POST['titleRu'],
						'content' => $contentRu
					];

					// Обрабатываем полученный английский текст для сохранения в БД.
					$contentEn = $_POST['contentEn'];
					$contentEn = $this->formattingTextForDatabase($contentEn);

					// Формируем массив для сохранения.
					$this->data['edit']['en'] = [
						'title' => $_POST['titleEn'],
						'content' => $contentEn
					];

					// Формируем массив основных данных.
					$this->data['edit']['main'] = [
						'date' => date('Y-m-d H:i:s'),
						'active' => !empty($_POST['active']) ? $_POST['active'] : 0
					];

					// Сохраняем данные.
					$this->storiesMainModel->save($this->data['edit']['main'], $idStories ? ['id' => $idStories] : []);

					// Если id продукта у нас еще не было - получим его из свежей записи в main таблицу.
					if (!$idStories) {

						// Получаем последнюю запись main таблицы, а из неё id.
						$main = $this->storiesMainModel->list([], [1, 0], 'id');
						$newId = $main[0]['id'];

						// Дополняем модели новыми id.
						$this->data['edit']['ru']['id_stories'] = $newId;
						$this->data['edit']['en']['id_stories'] = $newId;
					}

					$this->storiesRuModel->save($this->data['edit']['ru'], $idStories ? ['id_stories' => $idStories] : []);
					$this->storiesEnModel->save($this->data['edit']['en'], $idStories ? ['id_stories' => $idStories] : []);

					// Обрабатываем и сохраняем полученные изображения.
					// Имя директории для сохранения.
					$dir = Config::get('storiesImgRoot') . ($idStories ? $idStories : $newId);

					// Массив с изображениями.
					$image = $_FILES['photo'];

					//Обрабатываем в более удобную форму полученные фото.
					$image = $this->reArrayFiles($image);

					// Сохраняем.
					$this->saveImage($image, $dir);

					App::getSession()->addFlash(__('admin_stories.mes3'));
					App::getRouter()->redirect(App::getRouter()->buildUri('.stories'));
				}

			} catch (\Exception $exception) {

				App::getSession()->addFlash($exception->getMessage());

			}
		}

		// Если у нас есть id истории - заменяем текстовые блоки для вывода с помощью нашей функции.
		if ($idStories) {
			$this->data['edit']['ru']['content'] = $this->formattingTextForOutput($this->data['edit']['ru']['content']);
			$this->data['edit']['en']['content'] = $this->formattingTextForOutput($this->data['edit']['en']['content']);
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
				$idStories = $_POST['id'];
				$nameImage = $_POST['name'];

				// Получаем нужную директорию.
				$imagesPath = Config::get('storiesImgRoot') . $idStories;

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
