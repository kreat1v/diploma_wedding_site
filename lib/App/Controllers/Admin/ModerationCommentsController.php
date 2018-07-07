<?php

namespace App\Controllers\Admin;

use \App\Entity\User;
use \App\Entity\Comments;
use \App\Core\App;
use \App\Core\Config;
use \App\Core\Pagination;

class ModerationCommentsController extends \App\Controllers\Base
{
	private $userModel;
	private $commentsModel;
	private $leadingReviewsModel;

	public function __construct(array $params = [])
	{
		parent::__construct( $params );

		$this->userModel = new User(App::getConnection());
		$this->commentsModel = new Comments(App::getConnection());

	}

	public function indexAction()
	{
		// Задаем модульное сообщение.
		App::getSession()->addModal(__('admin_moderationcomments.modal'));

		// Пагинация.
		$page = isset($this->params[0]) ? $this->params[0] : 1;
		$productsCount = count($this->commentsModel->list());

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
			$this->data['comments'] = $this->commentsModel->list([], [Config::get('pagLimit'), $offset], 'date');
			$this->data['page'] = $page;
		} else {
			$this->page404();
		}
	}

	public function deactivateAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			try {

				// Получаем id комментария.
				$idComments = $_POST['id'];

				$this->data = [
					'active' => 0
				];

				// Деактивируем отзыв.
				$this->commentsModel->save($this->data, ['id' => $idComments]);

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

	public function activateAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			try {

				// Получаем id комментария.
				$idComments = $_POST['id'];

				$this->data = [
					'active' => 1
				];

				// Активируем Комментарий.
				$this->commentsModel->save($this->data, ['id' => $idComments]);

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

	public function editAction()
	{
		// Получаем параметры.
		$params = App::getRouter()->getParams();

		// Получаем id комментария.
		$idComments = $params[0];

		// Получаем комментарий.
		$comments = $this->commentsModel->list(['id' => $idComments])[0];

		// Получаем id юзера.
		$idUser = $comments['id_users'];

		// Получаем данные юзера.
		$user = $this->userModel->list(['id' => $idUser])[0];

		// Если комментарий существует, то продолжаем получать и обрабатывать данные, иначе выдаём 404ю страницу.
		if (!empty($comments)) {

			// Отдаём данные.
			$this->data['comments'] = $comments;
			$this->data['user'] = $user;

			// Если есть post запрос, обарабатываем и сохраняем полученные данные.
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				try {

					if (isset($_POST['button']) && $_POST['button'] == 'send') {

						// Формируем массив для сохранения.
						$this->data = [
							'messages' => $_POST['comments'],
							'active' => !empty($_POST['active']) ? $_POST['active'] : 0
						];

						// Сохраняем данные.
						$this->commentsModel->save($this->data, ['id' => $idComments]);

						App::getSession()->addFlash(__('admin_moderationcomments.mes1'));
						App::getRouter()->redirect(App::getRouter()->buildUri(".moderationcomments"));

					}

				} catch (\Exception $exception) {

					App::getSession()->addFlash($exception->getMessage());

				}
			}

		} else {

			$this->page404();

		}
	}
}
