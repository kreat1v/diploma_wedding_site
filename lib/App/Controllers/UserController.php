<?php

namespace App\Controllers;

use App\Entity\User;
use App\Core\App;
use App\Core\Config;

class UserController extends Base
{
	private $userModel;

	public function __construct(array $params = [])
	{
		parent::__construct( $params );

		$this->userModel = new User(App::getConnection());
	}

	public function indexAction()
	{
		$this->data = $this->userModel->getBy('id', App::getSession()->get('id'));
	}

	public function settingsAction()
	{
		$id = App::getSession()->get('id');

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {

				if (isset($_POST['button']) && $_POST['button'] == 'avatar') {

					// echo '<pre>';
					// print_r($_POST);
					// print_r($_FILES);
					// print_r(getimagesize($_FILES['avatar']['tmp_name']));
					// echo '</pre>';
					// exit();

					// Загружаем изображение. Получаем путь загруженного изображения.
					$fileName = $this->saveAvatar($_FILES['avatar']['tmp_name'], $id);

					// Получаем его расширение.
					$extension = pathinfo($fileName, PATHINFO_EXTENSION);

					// Путь нового, обрезанного, изображения.
					$newFile = Config::get('userImgRoot') . $id . DS . uniqid('av_') . '.' . $extension;

					// Координаты, по которым режем изображение.
					$x = $_POST['cropX'];
					$y = $_POST['cropY'];
					$w = $_POST['cropW'];
					$h = $_POST['cropH'];

					// Обрезаем изображение.
					$this->imageCrop($extension, $fileName, $newFile, $x, $y, $w, $h);

					// App::getSession()->addFlash(__('register.reg_mes'));
					// App::getRouter()->redirect(App::getRouter()->buildUri('.login'));
				}

			} catch (\Exception $exception) {

				App::getSession()->addFlash($exception->getMessage());

			}
		}
	}

	private function saveAvatar($image, $nameDir)
	{
		// Проверка на наличие загружаемого изображения.
		if (!file_exists($image)) {
			throw new \Exception('Image are not downloaded!');
		}

		// Проверка на тип файла. Получение расширения изображения.
		switch(getimagesize($image)['mime']) {
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
				throw new \Exception('Неверный формат файла');
		}

		// Проверка наличия директории. Если нету таковой - то создание новой.
		if (!file_exists(Config::get('userImgRoot') . $nameDir)) {
			mkdir(Config::get('userImgRoot') . $nameDir, 0777);
		}

		// Путь к изображению.
		$filePath = Config::get('userImgRoot') . $nameDir . DS . uniqid('img_') . $fileType;

		// Загрузка изображения.
		if (!move_uploaded_file($image, $filePath)) {
			rmdir(Config::get('userImg') . $nameDir);
			throw new \Exception('Image are not downloaded!');
		}

		// Возвращаем путь загруженного изображения.
		return $filePath;
	}

	private function imageCrop($ext, $image_source, $save_as, $x, $y, $width, $height)
	{
		// Проверка на наличие изображения.
		if (!file_exists($image_source)) {
			throw new \Exception('Изображение '.$image_source.' не найдено');
		}

		// Создаём изображение.
		switch($ext) {
			case 'gif':
				$image = imagecreatefromgif($image_source);
				break;
			case 'jpg':
				$image = imagecreatefromjpeg($image_source);
				break;
			case 'png':
				$image = imagecreatefrompng($image_source);
				break;
			default:
				throw new \Exception('Неверный формат файла');
		}
		$new_image = imagecreatetruecolor(200, 200);

		// Cохранение прозрачности (для PNG и GIF).
		imagealphablending($new_image, false);
		imagesavealpha($new_image, true);

		// Создаём обрезанное изображение.
		imagecopyresampled($new_image, $image, 0, 0, $x, $y, 200, 200, $width, $height);

		// Сохранение изображения.
		imagepng($new_image, $save_as);

		// Освобождение памяти.
		imagedestroy($image);
		imagedestroy($new_image);
	}

	public function editAction() {
		if (App::getSession()->get('id')) {
			$this->data = $this->userModel->getBy('id', App::getSession()->get('id'));
		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {
				$id = App::getSession()->get('id') ? App::getSession()->get('id') : null;

				$this->data = [
					'firstName' => $_POST['firstName'],
					'secondName' => $_POST['secondName'],
					'email' => $_POST['email'],
				];

				if (App::getSession()->get('email') == $this->data['email']) {
					unset($this->data['email']);
				}

				$this->userModel->edit($this->data, $id);

				if (isset($this->data['email'])) {
					App::getSession()->set('email', $this->data['email']);
				}

				App::getSession()->addFlash('Your data has been saved successfully.');
				App::getRouter()->redirect(App::getRouter()->buildUri('user.index'));
			} catch (\Exception $exception) {
				App::getSession()->addFlash($exception->getMessage());
			}
		}
	}

	public function editPasswordAction() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {
				$id = App::getSession()->get('id') ? App::getSession()->get('id') : null;

				$this->data = [
					'oldPassword' => $_POST['oldPassword'],
					'password' => $_POST['password'],
					'confirmPassword' => $_POST['confirmPassword'],
				];

				$this->userModel->editPassword($this->data, $id);

				App::getSession()->addFlash('Your new password has been saved successfully.');
				App::getRouter()->redirect(App::getRouter()->buildUri('user.index'));
			} catch (\Exception $exception) {
				App::getSession()->addFlash($exception->getMessage());
			}
		}
	}

	public function logoutAction()
	{
		App::getSession()->destroy();
		App::getRouter()->redirect(App::getRouter()->buildUri('.category'));
	}
}
