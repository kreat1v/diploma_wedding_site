<?php

namespace App\Controllers;

use \App\Core\App;
use \App\Entity\Category\CategoryMain;

class CategoryController extends Base

{
	private $categoryMainModel;

	public function __construct(array $params = [])
	{
		parent::__construct($params);

		$this->categoryMainModel = new CategoryMain(App::getConnection());
	}

	public function indexAction()
	{
		$this->data = $this->categoryMainModel->languageList(['active' => 1]);
	}
}
