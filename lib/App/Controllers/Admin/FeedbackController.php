<?php

namespace App\Controllers\Admin;

use \App\Entity\User;
use \App\Entity\MessagesUser;
use \App\Entity\MessagesAdmin;
use \App\Entity\CallsUser;
use \App\Core\App;
use \App\Core\Config;

class FeedbackController extends \App\Controllers\Base
{
	private $userModel;
	private $messagesUserModel;
	private $messagesAdminModel;
	private $callsUserModel;

	public function __construct(array $params = [])
	{
		parent::__construct( $params );

		$this->userModel = new User(App::getConnection());
		$this->messagesUserModel = new MessagesUser(App::getConnection());
		$this->messagesAdminModel = new MessagesAdmin(App::getConnection());
		$this->callsUserModel = new CallsUser(App::getConnection());
	}

	public function indexAction()
	{

		// Получаем параметры.
		$params = App::getRouter()->getParams();

		// Если в параметрах присутствует "просмотр" - то собираем и отдаем данные для просмотра сообщений, иначе выводим список всех активных диалогов.
		if (!empty($params) && $params[0] == 'view') {

			// Получем id юзера.
			$id_user = $params[1];

			// Получаем данные юзера.
			$user = $this->userModel->list(['id' => $id_user])[0];

			// Получем аватар юзера.
			if (!file_exists(Config::get('userImgRoot') . $id_user)) {
				$avatar = Config::get('systemImg') . 'user.png';
			} else {
				$paths = array_values(array_diff(scandir(Config::get('userImgRoot') . $id_user), ['.', '..']));
				$avatar = Config::get('userImg') . $id_user . DS . $paths[0];
			}

			// Получаем сообщения юзера.
			$messageUser = $this->messagesUserModel->list(['id_users' => $id_user], [3, 0], 'date');

			// Получаем сообщения админа. Добавляем в них админскую метку.
			$messageAdmin = $this->messagesAdminModel->list(['id_users' => $id_user], [3, 0], 'date');
			foreach ($messageAdmin as $key => $value) {
				$messageAdmin[$key]['admin'] = true;
			}

			// Совмещаем сообщения в единый массив, отсортированный по дате.
			$message = array_merge($messageUser, $messageAdmin);
			foreach ($message as $key => $row) {
			    $date[$key]  = $row['date'];
			}
			array_multisort($date, SORT_DESC, $message);

			// Отдаем данные юзера и наш диалог.
			if (!empty($message)) {
				$this->data['message'] = $message;
				$this->data['user'] = $user;
				$this->data['avatar'] = $avatar;
			} else {
				$this->page404();
			}

		} else {

			$this->data['messagesList'] = $this->messagesUserModel->messages();

		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {

				// Обрабатываем отправленное админом сообщение.
				if (isset($_POST['button']) && $_POST['button'] == 'message') {

					// Если есть тело сообщения - сохраняем его.
					if (!empty($_POST['message'])) {
						$this->data['messageAdmin'] = [
							'id_users' => $id_user,
							'message' => $_POST['message'],
							'date' => date('Y-m-d H:i:s')
						];

						$this->messagesAdminModel->save($this->data['messageAdmin']);

						App::getSession()->addFlash(__('admin_feedback.mes1'));
					}

					// Если установлена отметка об архивации диалога - деактивируем диалог.
					if (isset($_POST['active'])) {
						$this->data['active'] = [
							'active' => 0
						];

						$this->messagesUserModel->save($this->data['active'], ['id_users' => $id_user]);

						App::getSession()->addFlash(__('admin_feedback.mes2'));
					}

					App::getRouter()->redirect(App::getRouter()->buildUri('.feedback'));
				}

			} catch (\Exception $exception) {

				App::getSession()->addFlash($exception->getMessage());

			}
		}
	}

	public function getMessagesAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			// Получем id юзера.
			$id = isset($_POST['id']) ? $_POST['id'] : false;

			if ($id) {
				// Получаем аватар.
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

	public function editMessageAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			try {

				$this->data = [
					'message' => $_POST['message']
				];

				$this->messagesAdminModel->save($this->data, ['id' => $_POST['id']]);

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

	public function deleteMessageAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			try {

				$id = $_POST['id'];

				$this->messagesAdminModel->delete($id);

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

	public function archivedDialogsAction ()
	{
		// Получаем параметры.
		$params = App::getRouter()->getParams();

		// Если в параметрах присутствует "просмотр" - то собираем и отдаем данные для просмотра сообщений, иначе выводим список всех активных диалогов.
		if (!empty($params) && $params[0] == 'view') {

			// Получем id юзера.
			$id_user = $params[1];

			// Получаем данные юзера.
			$user = $this->userModel->list(['id' => $id_user])[0];

			// Получем аватар юзера.
			if (!file_exists(Config::get('userImgRoot') . $id_user)) {
				$avatar = Config::get('systemImg') . 'user.png';
			} else {
				$paths = array_values(array_diff(scandir(Config::get('userImgRoot') . $id_user), ['.', '..']));
				$avatar = Config::get('userImg') . $id_user . DS . $paths[0];
			}

			// Получаем сообщения юзера.
			$messageUser = $this->messagesUserModel->list(['id_users' => $id_user], [3, 0], 'date');

			// Получаем сообщения админа. Добавляем в них админскую метку.
			$messageAdmin = $this->messagesAdminModel->list(['id_users' => $id_user], [3, 0], 'date');
			foreach ($messageAdmin as $key => $value) {
				$messageAdmin[$key]['admin'] = true;
			}

			// Совмещаем сообщения в единый массив, отсортированный по дате.
			$message = array_merge($messageUser, $messageAdmin);
			foreach ($message as $key => $row) {
			    $date[$key]  = $row['date'];
			}
			array_multisort($date, SORT_DESC, $message);

			// Отдаем данные юзера и наш диалог.
			if (!empty($message)) {
				$this->data['message'] = $message;
				$this->data['user'] = $user;
				$this->data['avatar'] = $avatar;
			} else {
				$this->page404();
			}

		} else {

			$this->data['messagesList'] = $this->messagesUserModel->messages(0);

		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {

				// Обрабатываем отправленное админом сообщение.
				if (isset($_POST['button']) && $_POST['button'] == 'activeMessage') {

					$this->data = [
						'active' => 1
					];

					$this->messagesUserModel->save($this->data, ['id_users' => $id_user]);

					App::getSession()->addFlash(__('admin_feedback.mes3'));

					App::getRouter()->redirect(App::getRouter()->buildUri('.feedback'));
				}

			} catch (\Exception $exception) {

				App::getSession()->addFlash($exception->getMessage());

			}
		}
	}
}
