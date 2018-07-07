<?php

namespace App\Controllers\Admin;

use App\Entity\User;
use App\Core\App;
use App\Core\Pagination;
use App\Core\Config;

class UserController extends \App\Controllers\Base
{
	private $userModel;

	public function __construct(array $params = [])
	{
		parent::__construct( $params );

		$this->userModel = new User(App::getConnection());
	}

	public function indexAction()
	{
		// Задаем модульное сообщение.
		App::getSession()->addModal(__('admin_user.modal'));

		// Пагинация.
		$page = isset($this->params[0]) ? $this->params[0] : 1;
		$productsCount = count($this->userModel->list());

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
			$this->data['users'] = $this->userModel->list([], [Config::get('pagLimit'), $offset]);
			$this->data['page'] = $page;
		} else {
			$this->page404();
		}
	}

	public function deactivateAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			try {

				// Получаем id юзера.
				$idUser = $_POST['id'];

				$this->data = [
					'active' => 0
				];

				// Деактивируем юзера.
				$this->userModel->save($this->data, ['id' => $idUser]);

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

				// Получаем id юзера.
				$idUser = $_POST['id'];

				$this->data = [
					'active' => 1
				];

				// Активируем юзера.
				$this->userModel->save($this->data, ['id' => $idUser]);

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

}
