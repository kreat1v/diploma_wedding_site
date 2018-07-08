<?php

namespace App\Controllers;

use \App\Core\Config;

class CoverController extends Base

{
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
