<?php

namespace App\Controllers\Admin;

use \App\Core\App;
use \App\Core\Config;

class CoverController extends \App\Controllers\Base

{
	public function indexAction()
	{
		// Получаем коллекцию изображений.
		$galery = array_values(array_diff(scandir(Config::get('coverImgRoot')), ['.', '..']));

		// Отдаём её.
		$this->data = $galery;

		// Если есть post запрос, обарабатываем и сохраняем полученные данные.
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {

				if (isset($_POST['button']) && $_POST['button'] == 'send') {

					// Обрабатываем и сохраняем полученные изображения.
					// Имя директории для сохранения.
					$dir = Config::get('coverImgRoot');

					// Массив с изображениями.
					$image = $_FILES['photo'];

					//Обрабатываем в более удобную форму полученные фото.
					$image = $this->reArrayFiles($image);

					// Сохраняем.
					$this->saveImage($image, $dir);

					App::getSession()->addFlash(__('admin_category.mes3'));
					App::getRouter()->redirect(App::getRouter()->buildUri('.cover'));
				}

			} catch (\Exception $exception) {

				App::getSession()->addFlash($exception->getMessage());

			}
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

			// Путь к изображению.
			$paths = $nameDir . DS . uniqid('img_') . $fileType;

			// Загрузка изображения. Если происходит ошибка - выбрасываем исключение.
			if (!move_uploaded_file($imageArray[$key]['tmp_name'], $paths)) {

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
				$nameImage = $_POST['name'];

				// Получаем директорию.
				$imagesPath = Config::get('coverImgRoot');

				// Если директория существует - выполняем операции.
				if (file_exists($imagesPath)) {

					// Удаляем изображение.
					unlink($imagesPath . DS . $nameImage);
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

	// Метод получения названий изображений.
	public function getImageAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			try {

				// Получаем коллекцию изображений.
				$galery = array_values(array_diff(scandir(Config::get('coverImgRoot')), ['.', '..']));

				// Дополняем коллекцию изображений путём доступа к ним.
				foreach ($galery as $key => $value) {
					$galery[$key] = Config::get('coverImg') . $value;
				}

				// Посылаем сигнал об успешности операции.
				echo json_encode([
					'result' => 'success',
					'images' => $galery
				]);

				die();

			} catch (\Exception $exception) {

				// Если была ошибка - посылаем тект ошибки.
				echo json_encode([
					'result' => 'error',
					'msg' => $exception->getMessage()
				]);

				die();

			}

		}
	}
}
