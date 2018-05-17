<?php

namespace App\Controllers;

use \App\Core\App;
use \App\Core\Localization;
use \App\Entity\Category\CategoryMain;

class CategoryController extends Base

{
	private $language;
	private $nameModel;
	private $categoryMainModel;
	private $categoryLanguageModel;

	public function __construct(array $params = [])
	{
		parent::__construct($params);

		$this->categoryMainModel = new CategoryMain(App::getConnection());
	}

	public function indexAction()
	{
		$this->data = $this->categoryMainModel->selectLanguageList('id_category');
	}

	public function viewAction()
	{
		$page = $this->params[1];
		$categoryId = $this->params[0];

		$category = $this->categoryMainModel->getBy('id', $categoryId);

		if ($category['title'] == 'Analytics') {
			$newsCount = count($this->newsModel->list(['analytics' => 1]));
		} else {
			$newsCount = count($this->newsModel->list(['id_category' => $categoryId]));
		}

		$pag = new Pagination();
		$pagination = $pag->getLinks(
			$newsCount,
			Config::get('pagLimit'),
			$page,
			Config::get('pagButtonLimit'));
		if (!empty($pagination)) {
			$this->data['pagination'] = $pagination;
		} else {
			$this->data['pagination'] = null;
		}
		$offset = $this->data['pagination'] ? $pagination['middle'][$page] : 0;

		if ($category['title'] == 'Analytics') {
			$news = $this->newsModel->getSection(Config::get('pagLimit'), $offset, 'analytics', 1);
		} else {
			$news = $this->newsModel->getSection(Config::get('pagLimit'), $offset, 'id_category', $categoryId);
		}

		if (!empty($category) && !empty($news) && $page != 0) {
			$this->data['category'] = $category;
			$this->data['news'] = $news;
		} else {
			$this->page404();
		}
	}
}
