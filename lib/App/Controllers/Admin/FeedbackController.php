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
			$messageUser = $this->messagesUserModel->list(['id_users' => $id_user]);

			// Получаем сообщения админа. Добавляем в них админскую метку.
			$messageAdmin = $this->messagesAdminModel->list(['id_users' => $id_user]);
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

			$this->data['messagesList'] = $this->messagesUserModel->activeMessages();

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

						App::getSession()->addFlash('Ваше сообщение успешно отправлено');
					}

					// Если установлена отметка об архивации диалога - деактивируем диалог.
					if (isset($_POST['active'])) {
						$this->data['active'] = [
							'active' => 0
						];

						$this->messagesUserModel->save($this->data['active'], ['id_users' => $id_user]);

						App::getSession()->addFlash('Вы успешно закрыли диалог - он перенесён в архивные диалоги. Если пользователь снова напишет сообщение - диалог станет активным.');
					}

					App::getRouter()->redirect(App::getRouter()->buildUri('.feedback'));
				}

			} catch (\Exception $exception) {

				App::getSession()->addFlash($exception->getMessage());

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

	public function userAction()
	{
		$messages = $this->contactsModel->list();

		if (!empty($messages)) {
			foreach ($messages as $value) {
				if (isset($value['id_user'])) {
					$this->data[] = $value;
				}
			}
		}
	}

	public function anonymousAction()
	{
		$messages = $this->contactsModel->list();

		if (!empty($messages)) {
			foreach ($messages as $value) {
				if (!isset($value['id_user'])) {
					$this->data[] = $value;
				}
			}
		}
	}

	public function editAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {
				$id = isset($this->params[0]) ? $this->params[0] : null;

				$this->data = [
					'messages' => $_POST['messages']
				];
				$this->contactsModel->save($this->data, $id);

				App::getSession()->addFlash('Message has been saved');
				App::getRouter()->redirect(App::getRouter()->buildUri('index'));
			} catch (\Exception $exception) {
				App::getSession()->addFlash($exception->getMessage());
			}
		}

		if (isset($this->params[0]) && $this->params[0] > 0) {
			$this->data = $this->contactsModel->getBy('id', $this->params[0]);
		}
	}

	public function deleteAction()
	{
		$id = isset($this->params[0]) ? $this->params[0] : null;

		if (!$id) {
			App::getSession()->addFlash('Missing message id');
		} else {
			$this->contactsModel->delete($id);
			App::getSession()->addFlash('Message has been deleted');
		}

		App::getRouter()->redirect(App::getRouter()->buildUri('index'));
	}
}
