<?php

namespace App\Controllers;

use \App\Entity\Stories\StoriesMain;
use \App\Entity\Comments;
use \App\Entity\Answers;
use \App\Entity\Views;
use \App\Entity\LikeStories;
use \App\Entity\LikeComments;
use \App\Core\App;
use \App\Core\Config;
use \App\Core\Pagination;

class StoriesController extends Base

{
	private $storiesMainModel;
	private $commentsModel;
	private $answersModel;
	private $viewsModel;
	private $likeStoriesModel;
	private $likeCommentsModel;

	public function __construct($params = [])
	{
		parent::__construct($params);

		$this->storiesMainModel = new StoriesMain(App::getConnection());
		$this->commentsModel = new Comments(App::getConnection());
		$this->answersModel = new Answers(App::getConnection());
		$this->viewsModel = new Views(App::getConnection());
		$this->likeStoriesModel = new LikeStories(App::getConnection());
		$this->likeCommentsModel = new LikeComments(App::getConnection());
	}

	public function indexAction()
	{
		// Пагинация.
		$page = isset($this->params[0]) ? $this->params[0] : 1;
		$productsCount = count($this->storiesMainModel->languageList(['active' => 1]));

		$pag = new Pagination();
		$pagination = $pag->getLinks(
			$productsCount,
			Config::get('storiesLimit'),
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

			// Отправляем данные.
			$this->data['stories'] = $this->storiesMainModel->languageList(['active' => 1], [Config::get('storiesLimit'), $offset]);
			$this->data['page'] = $page;

			// Получаем коллекции изображений.
			foreach ($this->data['stories'] as $key => $value) {

				// Если директория с id истории существует - то находим в ней изображения.
				if (file_exists(Config::get('storiesImgRoot') . $value['id_stories'])) {
					$this->data['stories'][$key]['galery'] = array_values(array_diff(scandir(Config::get('storiesImgRoot') . $value['id_stories']), ['.', '..']));
				} else {
					$this->data['stories'][$key]['galery'] = false;
				}

			}

		} else {
			$this->page404();
		}

	}

	public function viewAction()
	{
		// Получаем параметры.
		$params = App::getRouter()->getParams();

		// Если в параметрах присутствует id - то собираем и отдаем данные для просмотра истории, иначе делаем переадресацию на страницу всех историй.
		if (!empty($params)) {

			// Получем id истории.
			$id = $params[0];

			// Получаем id юзера.
			$id_users = App::getSession()->get('id');

			// Получаем данные истории.
			$stories = $this->storiesMainModel->languageList(['id_stories' => $id]);

			// Получаем коллекцию изображений. Если директория с id истории существует - то находим в ней изображения.
			if (file_exists(Config::get('storiesImgRoot') . $id)) {
				$galery = array_values(array_diff(scandir(Config::get('storiesImgRoot') . $id), ['.', '..']));
			} else {
				$galery = false;
			}

			// Получаем лайки истории.
			$like = $this->likeStoriesModel->list(['id_stories' => $id]);

			// Получаем лайк пользователя данной истории.
			$userLike = array_search($id_users, array_column($like, 'id_users')) !== false ? true : false;

			// Просмотры истории.
			// Если нету id юзера, то получим ip адресс для дополнения просмотров, иначе воспользуемся id юзера.
			if (!$id_users) {

				// Получаем ip адресс клиента.
				$ip = $_SERVER['REMOTE_ADDR'];

				// Получаем все просмотры истории из БД.
				$views = $this->viewsModel->list(['id_stories' => $id, 'ip' => ip2long($ip)]);

				// Если ip не найден, до сохраним его в БД.
				if (!$views) {
					$this->viewsModel->save([
						'id_stories' => $id,
						'ip' => ip2long($ip)
					]);
				}

			} else {

				// Получаем все просмотры истории из БД.
				$views = $this->viewsModel->list(['id_stories' => $id, 'id_users' => $id_users]);

				// Если id юзера не найден, до сохраним его в БД.
				if (!$views) {
					$this->viewsModel->save([
						'id_stories' => $id,
						'id_users' => $id_users
					]);
				}

			}

			// Получаем количество просмотров истории.
			$viewsCount = count($this->viewsModel->list(['id_stories' => $id]));

			// Получаем комментарии.
			$comments = $this->commentsModel->comments(['id_stories' => $id, 'active' => 1], [5, 0]);

			// Дополняем массив комментариев ответами и лайками.
			foreach ($comments as $key => $value) {

				// Получаем ответы.
				$comments[$key]['answers'] =  $this->answersModel->answers(['id_comments' => $value['id']]);

				// Получаем лайки комментария.
				$likeComments = $this->likeCommentsModel->list(['id_comments' => $value['id']]);

				// Получаем лайк пользователя данного комментария.
				$userLikeComments = array_search($id_users, array_column($likeComments, 'id_users')) !== false ? true : false;

				// Дополняем массив.
				$comments[$key]['likesCount'] = count($likeComments);
				$comments[$key]['like'] = $userLikeComments;

			}

			// Отдаём данные.
			if (!empty($stories) && $stories[0]['active'] == 1) {
				$this->data['stories'] = $stories[0];
				$this->data['stories']['like'] = $userLike;
				$this->data['galery'] = $galery;
				$this->data['comments'] = $comments;
				$this->data['views'] = $viewsCount;
				$this->data['likesCount'] = count($like);
			} else {
				$this->page404();
			}

		} else {

			App::getRouter()->redirect(App::getRouter()->buildUri('.stories'));

		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {

				// Отправка комментария.
				if (isset($_POST['button']) && $_POST['button'] == 'send') {

					$this->data = [
						'id_users' => $id_users,
						'id_stories' => $id,
						'date' => date('Y-m-d H:i:s'),
						'messages' => $_POST['messages'],
						'active' => '1'
					];

					$this->commentsModel->save($this->data);

					App::getSession()->addFlash(__('stories.mes1'));
					App::getRouter()->redirect(App::getRouter()->buildUri('stories.view', [$id]));

				}

				// Отправка ответа.
				if (isset($_POST['button']) && $_POST['button'] == 'answers') {

					$this->data = [
						'id_users' => $id_users,
						'id_comments' => $_POST['id'],
						'date' => date('Y-m-d H:i:s'),
						'messages' => $_POST['answers']
					];

					$this->answersModel->save($this->data);

					App::getSession()->addFlash(__('stories.mes1'));
					App::getRouter()->redirect(App::getRouter()->buildUri('stories.view', [$id]));

				}

			} catch (\Exception $exception) {

				App::getSession()->addFlash($exception->getMessage());
				App::getRouter()->redirect(App::getRouter()->buildUri('stories.view', [$id]));

			}
		}
	}

	public function likeAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			try {

				// Получаем пришедшие данные.
				$id = $_POST['id'];
				$item = $_POST['item'];

				// Получаем id юзера.
				$id_users = App::getSession()->get('id');

				// Формируем названия модели и название id для запроса.
				$model = 'like' . ucfirst($item) . 'Model';
				$nameId = 'id_' . $item;

				// Получаем лайк из БД.
				$like = $this->$model->list([$nameId => $id, 'id_users' => $id_users]);

				// Если лайк не найден, то сохраним его в БД, иначе наоборот удалим его из БД.
				if (!$like) {

					$this->data = [
						$nameId => $id,
						'id_users' => $id_users
					];

					$this->$model->save($this->data);

					echo json_encode([
						'result' => 'like'
					]);

					die();

				} else {

					$id_likes = $like[0]['id'];

					$this->$model->delete($id_likes);

					echo json_encode([
						'result' => 'dislike'
					]);

					die();
				}

			} catch (\Exception $exception) {

				echo json_encode([
					'result' => 'error',
					'msg' => $exception->getMessage()
				]);

				die();

			}

		}
	}

	// Получение части комментариев.
	public function getCommentsAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			// Получаем начало и конец выборки, а также id истории.
			$start = $_POST['start'];
			$limit = $_POST['limit'];
			$id_stories = $_POST['id_stories'];

			// Получаем комментарии юзеров.
			$comments = $this->commentsModel->comments(['id_stories' => $id_stories,'active' => 1], [$limit, $start]);

			// Если полученный массив не пустой - дополняем его ссылками на фото юзеров и ответами.
			if(!empty($comments)) {
				foreach ($comments as $key => $value) {

					// Получим id юзера, оставившего комментарий.
					$id = $value['id_users'];

					// Получим ответы на комментарий.
					$answers =  $this->answersModel->answers(['id_comments' => $value['id']]);

					// Если полученный массив не пустой - дополняем его ссылками на фото юзеров.
					if(!empty($answers)) {
						foreach ($answers as $keyAns => $valueAns) {
							$idAns = $valueAns['id_users'];

							if (!file_exists(Config::get('userImgRoot') . $idAns)) {
								$answers[$keyAns]['avatar'] = Config::get('systemImg') . 'user.png';
							} else {
								$paths = array_values(array_diff(scandir(Config::get('userImgRoot') . $idAns), ['.', '..']));
								$answers[$keyAns]['avatar'] = Config::get('userImg') . $idAns . DS . $paths[0];
							}
						}
					}

					// Дополняем массив комментариев ответами.
					$comments[$key]['answers'] = $answers;

					// Дополняем фото юзеров.
					if (!file_exists(Config::get('userImgRoot') . $id)) {
						$comments[$key]['avatar'] = Config::get('systemImg') . 'user.png';
					} else {
						$paths = array_values(array_diff(scandir(Config::get('userImgRoot') . $id), ['.', '..']));
						$comments[$key]['avatar'] = Config::get('userImg') . $id . DS . $paths[0];
					}

					// Получаем id юзера.
					$id_users = App::getSession()->get('id');

					// Получаем лайки комментария.
					$likeComments = $this->likeCommentsModel->list(['id_comments' => $value['id']]);

					// Получаем лайк пользователя данного комментария.
					$userLikeComments = array_search($id_users, array_column($likeComments, 'id_users')) !== false ? true : false;

					// Дополняем массив комментариев лайками.
					$comments[$key]['likesCount'] = count($likeComments);
					$comments[$key]['like'] = $userLikeComments;
				}
			}

			echo json_encode($comments);
			die();

		}
	}
}
