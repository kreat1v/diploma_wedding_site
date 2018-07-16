<?php

namespace App\Controllers\Admin;

use \App\Entity\About;
use \App\Core\App;

class AboutController extends \App\Controllers\Base

{
	private $aboutModel;

	public function __construct($params = [])
	{
		parent::__construct($params);

		$this->aboutModel = new About(App::getConnection());
	}

	public function indexAction()
	{
		// Получаем нужный текст.
		$aboutModel = $this->aboutModel->list();

		// Данные.
		$this->data = $aboutModel[0];

		// Если есть post запрос, обарабатываем и сохраняем полученные данные.
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {

				if (isset($_POST['button']) && $_POST['button'] == 'send') {

					// Обрабатываем полученный русский текст для сохранения в БД.
					$ruText = $_POST['ruText'];
					$enText = $_POST['enText'];
					$ruText = $this->formattingTextForDatabase($ruText);
					$enText = $this->formattingTextForDatabase($enText);

					// Формируем массив для сохранения.
					$this->data = [
						'ru_text' => $ruText,
						'en_text' => $enText
					];

					// Сохраняем данные.
					$this->aboutModel->save($this->data, ['id' => 1]);

					App::getSession()->addFlash(__('admin_category.mes3'));
					App::getRouter()->redirect(App::getRouter()->buildUri('.about'));
				}

			} catch (\Exception $exception) {

				App::getSession()->addFlash($exception->getMessage());

			}
		}

		// Заменяем текстовые блоки для вывода с помощью нашей функции.
		$this->data['ru_text'] = $this->formattingTextForOutput($this->data['ru_text']);
		$this->data['en_text'] = $this->formattingTextForOutput($this->data['en_text']);
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
