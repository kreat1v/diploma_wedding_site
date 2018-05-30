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
		// Получаем данные.
		if (App::getSession()->get('id')) {
			$id = App::getSession()->get('id');

			$this->data['info'] = $this->userModel->getBy('id', $id);

			if (!file_exists(Config::get('userImgRoot') . $id)) {
				$avatar = Config::get('systemImg') . 'user.png';
			} else {
				$paths = array_values(array_diff(scandir(Config::get('userImgRoot') . $id), ['.', '..']));
				$avatar = Config::get('userImg') . $id . DS . $paths[0];
			}

			$this->data['avatar'] = $avatar;
		}
	}

	public function settingsAction()
	{
		// Получаем данные.
		if (App::getSession()->get('id')) {
			$id = App::getSession()->get('id');

			$this->data['info'] = $this->userModel->getBy('id', $id);

			if (!file_exists(Config::get('userImgRoot') . $id)) {
				$avatar = Config::get('systemImg') . 'user.png';
			} else {
				$paths = array_values(array_diff(scandir(Config::get('userImgRoot') . $id), ['.', '..']));
				$avatar = Config::get('userImg') . $id . DS . $paths[0];
			}

			$this->data['avatar'] = $avatar;
		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {

				// Установка аватара.
				if (isset($_POST['button']) && $_POST['button'] == 'avatar') {

					// Загружаем изображение. Получаем путь загруженного изображения.
					$paths = $this->saveAvatar($_FILES['avatar']['tmp_name'], $id);

					// Получаем его расширение.
					$extension = pathinfo($paths['filePath'], PATHINFO_EXTENSION);

					// Путь нового, обрезанного, изображения.
					$newFile = Config::get('userImgRoot') . $id . DS . uniqid('av_') . '.' . $extension;

					// Координаты, по которым режем изображение.
					$x = $_POST['cropX'];
					$y = $_POST['cropY'];
					$w = $_POST['cropW'];
					$h = $_POST['cropH'];

					// Обрезаем изображение и удаляем старое изображение.
					if ($this->imageCrop($extension, $paths['filePath'], $newFile, $x, $y, $w, $h) && isset($paths['oldFilePath'])) {
						unlink($paths['oldFilePath']);
					};

					// Удаляем оригинальное изображение.
					unlink($paths['filePath']);

					App::getSession()->addFlash(__('user_settings.mes1'));
					App::getRouter()->redirect(App::getRouter()->buildUri('user.index'));
				}

				// Удаление аватара.
				if (isset($_POST['button']) && $_POST['button'] == 'deleteAvatar') {

					if (file_exists(Config::get('userImgRoot') . $id)) {
						$paths = array_values(array_diff(scandir(Config::get('userImgRoot') . $id), ['.', '..']));

						unlink(Config::get('userImgRoot') . $id . DS . $paths[0]);
						rmdir(Config::get('userImgRoot') . $id);
					}

					App::getSession()->addFlash(__('user_settings.mes2'));
					App::getRouter()->redirect(App::getRouter()->buildUri('user.settings'));
				}

				// Обновление своих данных.
				if (isset($_POST['button']) && $_POST['button'] == 'data') {

					foreach ($_POST as $key => $value) {
						$this->data[$key] = $value;
					}

					$this->data = array_filter($this->data);

					if (App::getSession()->get('email') == $this->data['email']) {
						unset($this->data['email']);
					}

					$this->userModel->edit($this->data, $id);

					if (isset($this->data['email'])) {
						App::getSession()->set('email', $this->data['email']);
					}

					App::getSession()->addFlash(__('user_settings.mes3'));
					App::getRouter()->redirect(App::getRouter()->buildUri('user.index'));
				}

				// Обновление пароля.
				if (isset($_POST['button']) && $_POST['button'] == 'password') {

					$this->data = [
						'oldPassword' => $_POST['oldPassword'],
						'password' => $_POST['password'],
						'confirmPassword' => $_POST['confirmPassword'],
					];

					$this->userModel->editPassword($this->data, $id);

					App::getSession()->addFlash(__('user_settings.mes4'));
					App::getRouter()->redirect(App::getRouter()->buildUri('user.index'));
				}

			} catch (\Exception $exception) {

				App::getSession()->addFlash($exception->getMessage());
				App::getRouter()->redirect(App::getRouter()->buildUri('user.settings'));

			}
		}
	}

	private function saveAvatar($image, $nameDir)
	{
		// Проверка на наличие загружаемого изображения.
		if (!file_exists($image)) {
			throw new \Exception(__('user_settings.error1'));
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
				throw new \Exception(__('user_settings.error2'));
		}

		$paths = [];

		// Проверка наличия директории. Если нету таковой - то создание новой.
		if (!file_exists(Config::get('userImgRoot') . $nameDir)) {
			mkdir(Config::get('userImgRoot') . $nameDir, 0777);
		} else {
			$oldImage = array_values(array_diff(scandir(Config::get('userImgRoot') . $nameDir), ['.', '..']));
			$paths['oldFilePath'] = Config::get('userImgRoot') . $nameDir . DS . $oldImage[0];
		}

		// Путь к изображению.
		$paths['filePath'] = Config::get('userImgRoot') . $nameDir . DS . uniqid('img_') . $fileType;

		// Загрузка изображения.
		if (!move_uploaded_file($image, $paths['filePath'])) {
			rmdir(Config::get('userImgRoot') . $nameDir);
			throw new \Exception(__('user_settings.error3'));
		}

		// Возвращаем путь загруженного изображения.
		return $paths;
	}

	private function imageCrop($ext, $image_source, $save_as, $x, $y, $width, $height)
	{
		// Проверка на наличие изображения.
		if (!file_exists($image_source)) {
			throw new \Exception(__('user_settings.error3'));
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
				throw new \Exception(__('user_settings.error2'));
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

		return true;
	}

	public function checkEmailAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$email = strip_tags($_POST['email']);

			if ($this->userModel->getBy('email', $email)) {
				echo true;
				die();
			} else {
				echo false;
				die();
			}
		}
	}

	public function logoutAction()
	{
		App::getSession()->destroy();
		App::getRouter()->redirect(App::getRouter()->buildUri('.category'));
	}
}
