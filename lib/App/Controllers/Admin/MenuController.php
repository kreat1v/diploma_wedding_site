<?php

namespace App\Controllers\Admin;

use \App\Entity\Category\CategoryMain;
use \App\Core\App;

class MenuController extends \App\Controllers\Base
{
	private $categoryModel;

	public function __construct($params = [])
	{
		parent::__construct($params);

		$this->categoryModel = new CategoryMain(App::getConnection());
	}

	public function getCategory()
	{
		$this->data = $this->categoryModel->list();

		return $this->data;
	}
}
