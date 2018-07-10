<?php

namespace App\Controllers;

use App\Entity\User;
use App\Entity\MessagesUser;
use App\Entity\MessagesAdmin;
use App\Entity\CallsUser;
use App\Entity\Favorites;
use App\Entity\Orders;
use App\Entity\OrdersProducts;
use App\Entity\Decor\DecorMain;
use App\Entity\Clothes\ClothesMain;
use App\Entity\Auto\AutoMain;
use App\Entity\Filming\FilmingMain;
use App\Entity\Leading\LeadingMain;
use App\Entity\Cake\CakeMain;
use App\Entity\Hotel\HotelMain;
use App\Core\App;
use App\Core\Config;

class UserController extends Base
{
	private $userModel;
	private $messagesUserModel;
	private $messagesAdminModel;
	private $callsUserModel;
	private $favoritesModel;
	private $ordersModel;
	private $ordersProductsModel;
	private $decorMainModel;
	private $clothesMainModel;
	private $autoMainModel;
	private $filmingMainModel;
	private $leadingMainModel;
	private $cakeMainModel;
	private $hotelMainModel;

	public function __construct(array $params = [])
	{
		parent::__construct( $params );

		$this->userModel = new User(App::getConnection());
		$this->favoritesModel = new Favorites(App::getConnection());
		$this->ordersModel = new Orders(App::getConnection());
		$this->ordersProductsModel = new OrdersProducts(App::getConnection());
		$this->messagesUserModel = new MessagesUser(App::getConnection());
		$this->messagesAdminModel = new MessagesAdmin(App::getConnection());
		$this->callsUserModel = new CallsUser(App::getConnection());
		$this->decorMainModel = new DecorMain(App::getConnection());
		$this->clothesMainModel = new ClothesMain(App::getConnection());
		$this->autoMainModel = new AutoMain(App::getConnection());
		$this->filmingMainModel = new FilmingMain(App::getConnection());
		$this->leadingMainModel = new LeadingMain(App::getConnection());
		$this->cakeMainModel = new CakeMain(App::getConnection());
		$this->hotelMainModel = new HotelMain(App::getConnection());
	}

	public function indexAction()
	{
		// Получаем данные.
		if (App::getSession()->get('id')) {

			// Если пользователь - админ, то мы не пускаем его в раздел юзера.
			if (App::getRouter()->getController(true) == 'User' && App::getSession()->get('role') == 'admin') {
				$this->page404();
			}

			// id юзера.
			$id = App::getSession()->get('id');

			// Получаем аватар юзера.
			if (!file_exists(Config::get('userImgRoot') . $id)) {
				$avatar = Config::get('systemImg') . 'user.png';
			} else {
				$paths = array_values(array_diff(scandir(Config::get('userImgRoot') . $id), ['.', '..']));
				$avatar = Config::get('userImg') . $id . DS . $paths[0];
			}

			// Отдаём данные.
			$this->data['info'] = $this->userModel->getBy('id', $id);
			$this->data['avatar'] = $avatar;
		}
	}

	public function settingsAction()
	{
		// Получаем данные.
		if (App::getSession()->get('id')) {

			// Если пользователь - админ, то мы не пускаем его в раздел юзера.
			if (App::getRouter()->getController(true) == 'User' && App::getSession()->get('role') == 'admin') {
				$this->page404();
			}

			// id юзера.
			$id = App::getSession()->get('id');

			// Получаем аватар юзера.
			if (!file_exists(Config::get('userImgRoot') . $id)) {
				$avatar = Config::get('systemImg') . 'user.png';
			} else {
				$paths = array_values(array_diff(scandir(Config::get('userImgRoot') . $id), ['.', '..']));
				$avatar = Config::get('userImg') . $id . DS . $paths[0];
			}

			// Отдаём данные.
			$this->data['info'] = $this->userModel->getBy('id', $id);
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

					if (App::getSession()->get('name') == $this->data['firstName']) {
						unset($this->data['firstName']);
					}

					$this->userModel->edit($this->data, $id);

					if (isset($this->data['email'])) {
						App::getSession()->set('email', $this->data['email']);
					}

					if (isset($this->data['firstName'])) {
						App::getSession()->set('name', $this->data['firstName']);
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

	public function communicationsAction()
	{
		// Получаем данные.
		if (App::getSession()->get('id')) {

			// Если пользователь - админ, то мы не пускаем его в раздел юзера.
			if (App::getRouter()->getController(true) == 'User' && App::getSession()->get('role') == 'admin') {
				$this->page404();
			}

			// id юзера.
			$id = App::getSession()->get('id');

			// Получаем аватар.
			if (!file_exists(Config::get('userImgRoot') . $id)) {
				$avatar = Config::get('systemImg') . 'user.png';
			} else {
				$paths = array_values(array_diff(scandir(Config::get('userImgRoot') . $id), ['.', '..']));
				$avatar = Config::get('userImg') . $id . DS . $paths[0];
			}

			// Получаем сообщения юзера.
			$messageUser = $this->messagesUserModel->list(['id_users' => $id], [3, 0], 'date');

			// Получаем сообщения админа. Добавляем в них админскую метку.
			$messageAdmin = $this->messagesAdminModel->list(['id_users' => $id], [3, 0], 'date');
			foreach ($messageAdmin as $key => $value) {
				$messageAdmin[$key]['admin'] = true;
			}

			// Совмещаем сообщения в единый массив.
			$message = array_merge($messageUser, $messageAdmin);

			// Если полученный массив не пустой - сортируем его по дате.
			if(!empty($message)) {
				foreach ($message as $key => $row) {
					$date[$key]  = $row['date'];
				}

				array_multisort($date, SORT_DESC, $message);
			}

			// Получаем заявки юзера.
			$callUser = $this->callsUserModel->list(['id_users' => $id, 'active' => 1]);

			// Если массив заявок не пустой - отправялем true для того, что бы запретить отправку повторных заявок.
			$this->data['calls'] = count($callUser) > 0 ? true : false;

			// Отправка данных.
			$this->data['avatar'] = $avatar;
			$this->data['info'] = $this->userModel->getBy('id', $id);
			$this->data['messages'] = $message;
		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {

				// Отправка сообщения.
				if (isset($_POST['button']) && $_POST['button'] == 'message') {
					$this->data = [
						'id_users' => $id,
						'message' => $_POST['message'],
						'date' => date('Y-m-d H:i:s'),
						'active' => '1'
					];

					$this->messagesUserModel->save($this->data);

					// Делаем все сообщения юзера активными.
					$this->messagesUserModel->save(['active' => 1], ['id_users' => $id]);

					App::getSession()->addFlash(__('user_communications.mes5'));
					App::getRouter()->redirect(App::getRouter()->buildUri('user.communications'));
				}

				// Обратный звонок.
				if (isset($_POST['button']) && $_POST['button'] == 'call') {
					$this->data = [
						'id_users' => $id,
						'active' => '1'
					];

					$this->callsUserModel->save($this->data);

					App::getSession()->addFlash(__('user_communications.mes6'));
					App::getRouter()->redirect(App::getRouter()->buildUri('user.communications'));
				}

			} catch (\Exception $exception) {

				App::getSession()->addFlash($exception->getMessage());
				App::getRouter()->redirect(App::getRouter()->buildUri('user.communications'));

			}
		}
	}

	public function getMessagesAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			if (App::getSession()->get('id')) {
				$id = App::getSession()->get('id');

				if (!file_exists(Config::get('userImgRoot') . $id)) {
					$avatar = Config::get('systemImg') . 'user.png';
				} else {
					$paths = array_values(array_diff(scandir(Config::get('userImgRoot') . $id), ['.', '..']));
					$avatar = Config::get('userImg') . $id . DS . $paths[0];
				}

				$adminAvatar = Config::get('systemImg') . 'admin.png';

				$start = $_POST['start'];
				$limit = $_POST['limit'];

				// Получаем сообщения юзера.
				$messageUser = $this->messagesUserModel->list(['id_users' => $id], [$limit, $start], 'date');

				// Получаем сообщения админа. Добавляем в них админскую метку.
				$messageAdmin = $this->messagesAdminModel->list(['id_users' => $id], [$limit, $start], 'date');
				foreach ($messageAdmin as $key => $value) {
					$messageAdmin[$key]['admin'] = true;
				}

				// Совмещаем сообщения в единый массив.
				$message = array_merge($messageUser, $messageAdmin);

				// Если полученный массив не пустой - сортируем его по дате.
				if(!empty($message)) {
					foreach ($message as $key => $row) {
						$date[$key]  = $row['date'];
					}

					array_multisort($date, SORT_DESC, $message);
				}

				$arr['data'] = $message;
				$arr['avatar'] = $avatar;
				$arr['adminAvatar'] = $adminAvatar;

				echo json_encode($arr);
				die();
			}

		}
	}

	public function favoritesAction()
	{
		// Получаем данные.
		if (App::getSession()->get('id')) {

			// Если пользователь - админ, то мы не пускаем его в раздел юзера.
			if (App::getRouter()->getController(true) == 'User' && App::getSession()->get('role') == 'admin') {
				$this->page404();
			}

			// id юзера.
			$id = App::getSession()->get('id');

			// Получаем закладки юзера.
			$favorites = $this->favoritesModel->list(['id_users' => $id]);

			// Проходимся циклом по массиву закладок. Получаем названия всех используемых моделей. После с помощью функции получаем сами модели. Добавляем всё в массив. Так же добавляем в каждый эллемент массива название категории.
			$favoritesArr = [];
			$favKeys = [];
			foreach ($favorites as $value) {
				$nameCategoty = $value['category'] . 'MainModel';

				if (!array_key_exists($nameCategoty, $favKeys)) {
					$favKeys[$nameCategoty] = $this->$nameCategoty->languageList();

					$favoritesArr[$value['id']] = $this->searchProduct($favKeys[$nameCategoty], $value['id_products']);
				} else {
					$favoritesArr[$value['id']] = $this->searchProduct($favKeys[$nameCategoty], $value['id_products']);
				}

				$favoritesArr[$value['id']]['category'] = $value['category'];
			}

			// Отдаём данные.
			$this->data = $favoritesArr;
		}
	}

	// Функция получения моделей.
	private function searchProduct($categoryModel, $idProduct) {

		foreach ($categoryModel as $value) {

			if ($value['id'] == $idProduct) {
				return $value;
			}

		}

	}

	// Удаление данных из закладок.
	public function deleteFavoritesAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			try {

				$id = $_POST['id'];

				$this->favoritesModel->delete($id);

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

	public function purchasesAction()
	{
		// Получаем данные.
		if (App::getSession()->get('id')) {

			// Если пользователь - админ, то мы не пускаем его в раздел юзера.
			if (App::getRouter()->getController(true) == 'User' && App::getSession()->get('role') == 'admin') {
				$this->page404();
			}

			// id юзера.
			$id = App::getSession()->get('id');

			// Получаем заказы юзера.
			$orders = $this->ordersModel->list(['id_users' => $id]);

			// Дополсняем массив заказов нужными данными.
			foreach ($orders as $key => $value) {

				// Получаем услуги из заказа.
				$ordersProducts = $this->ordersProductsModel->list(['id_orders' => $value['id']]);

				// Проходимся циклом по массиву услуг.
				foreach ($ordersProducts as $key2 => $products) {

					// Имя модели.
					$nameCategoty = $products['category'] . 'MainModel';

					// Получаем нужные нам модели услуг.
					$model = $this->$nameCategoty->languageList(['id' => $products['id_products']])[0];

					// Дополняем массив услуг названиями услуг.
					$ordersProducts[$key2]['title'] = $model['title'];

				}

				// Дополянем масив.
				$orders[$key]['products'] = $ordersProducts;

			}

			// Отдаём данные.
			$this->data = $orders;
		}
	}

	// Выход из системы. Убиваем сессию.
	public function logoutAction()
	{
		App::getSession()->destroy();
		App::getRouter()->redirect(App::getRouter()->buildUri('.'));
	}
}
