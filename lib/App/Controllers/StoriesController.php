<?php

namespace App\Controllers;

use \App\Entity\Stories\StoriesMain;
use \App\Entity\Comments;
use \App\Entity\Answers;
use \App\Entity\Vote;
use \App\Core\App;
use \App\Core\Config;
use \App\Core\Pagination;

class StoriesController extends Base

{
	private $storiesMainModel;
	private $commentsModel;
	private $answersModel;
	private $voteModel;

	public function __construct($params = [])
	{
		parent::__construct($params);

		$this->storiesMainModel = new StoriesMain(App::getConnection());
		$this->commentsModel = new Comments(App::getConnection());
		$this->answersModel = new Answers(App::getConnection());
		$this->voteModel = new Vote(App::getConnection());
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
		// pre($_SERVER['REMOTE_ADDR']);

		// Получаем параметры.
		$params = App::getRouter()->getParams();

		// Если в параметрах присутствует id - то собираем и отдаем данные для просмотра товара, иначе делаем переадресацию на страницу всех товаров.
		if (!empty($params)) {

			// Получем id истории.
			$id = $params[0];

			// Получаем данные истории.
			$stories = $this->storiesMainModel->languageList(['id_stories' => $id]);

			// Получаем коллекцию изображений. Если директория с id истории существует - то находим в ней изображения.
			if (file_exists(Config::get('storiesImgRoot') . $id)) {
				$galery = array_values(array_diff(scandir(Config::get('storiesImgRoot') . $id), ['.', '..']));
			} else {
				$galery = false;
			}

			// Получаем комментарии.
			$comments = $this->commentsModel->comments(['id_stories' => $id, 'active' => 1], [5, 0]);

			// Отдаём данные.
			if (!empty($stories) && $stories[0]['active'] == 1) {
				$this->data['stories'] = $stories[0];
				$this->data['galery'] = $galery;
				$this->data['comments'] = $comments;
			} else {
				$this->page404();
			}

		} else {

			App::getRouter()->redirect(App::getRouter()->buildUri('.stories'));

		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			try {

				// Получаем id юзера.
				$id_users = App::getSession()->get('id');

				// Отправка отзыва.
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

			} catch (\Exception $exception) {

				App::getSession()->addFlash($exception->getMessage());
				App::getRouter()->redirect(App::getRouter()->buildUri('stories.view', [$id]));

			}
		}

		// $newsId = $this->params[0];
		//
		// // получение новости
		// $news = $this->newsModel->getBy('id', $newsId);
		//
		// // проверка - аналитическая статья, или нет
		// if ($news['analytics'] == 1 && !App::getSession()->get('id')) {
		// 	$arrContent = explode('. ', $news['content']);
		// 	$content = [];
		// 	for ($i = 0; $i < 5; $i++) {
		// 		$content[] = $arrContent[$i];
		// 	}
		// 	$content = implode('. ', $content);
		//
		// 	if (!empty($news)) {
		// 		$this->data['news']['title'] = $news['title'];
		// 		$this->data['news']['content'] = $content . '.';
		// 		$this->data['news']['analytics'] = $news['analytics'];
		// 	}
		// } else {
		// 	// получение категории
		// 	$category = $this->categoryModel->getBy('id', $news['id_category']);
		//
		// 	// получение изображений
		// 	$images = array_values(array_diff(scandir(Config::get('gallery') . $news['img_dir']), ['.', '..']));
		//
		// 	// получение тэгов
		// 	$newsTag = $this->newsTagModel->list(['id_news' => "$newsId"]);
		// 	$tagsId = '';
		// 	foreach ($newsTag as $value) {
		// 		$tagsId .= $value['id_tags'];
		// 		$tagsId .= ', ';
		// 	}
		// 	$tagsId = trim($tagsId, ', ');
		// 	$tags = $this->tagsModel->getTags($tagsId);
		//
		// 	// просмотры новости
		// 	$nowWatching = rand(0, 5);
		// 	$allWathching = $news['views'] + $nowWatching;
		// 	$this->newsModel->save(['views' => $allWathching], $newsId);
		//
		// 	// комментарии
		// 	$comments = $this->commentsModel->getComments('id_news', $newsId);
		// 	$answers = $this->answersModel->getAnswers($newsId);
		// 	$vote = $this->voteModel->getVote(App::getSession()->get('id'), $newsId);
		//
		// 	// то, что отдаем
		// 	if (!empty($news)) {
		// 		$this->data['news'] = $news;
		// 		$this->data['gallery'] = $images;
		// 		$this->data['tags'] = $tags;
		// 		$this->data['nowWatching'] = $nowWatching;
		// 		$this->data['category'] = $category;
		// 		$this->data['comments'] = $comments;
		// 		$this->data['answers'] = $answers;
		// 		$this->data['vote'] = $vote;
		// 	} else {
		// 		$this->page404();
		// 	}
		// }
	}

	public function getCommentsAction()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			// Получаем начало и конец выборки, а также id продукта.
			$start = $_POST['start'];
			$limit = $_POST['limit'];
			$id_stories = $_POST['id_stories'];

			// Получаем отзывы юзеров.
			$comments = $this->commentsModel->comments(['id_stories' => $id_stories,'active' => 1], [$limit, $start]);

			// Если полученный массив не пустой - дополняем его ссылки на фото юзеров.
			if(!empty($comments)) {
				foreach ($comments as $key => $value) {
					$id = $value['id_users'];

					if (!file_exists(Config::get('userImgRoot') . $id)) {
						$comments[$key]['avatar'] = Config::get('systemImg') . 'user.png';
					} else {
						$paths = array_values(array_diff(scandir(Config::get('userImgRoot') . $id), ['.', '..']));
						$comments[$key]['avatar'] = Config::get('userImg') . $id . DS . $paths[0];
					}
				}
			}

			$arr['data'] = $comments;

			echo json_encode($arr);
			die();

		}
	}
}
