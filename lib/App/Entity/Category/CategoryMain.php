<?php

namespace App\Entity\Category;

use \App\Core\Localization;

class CategoryMain extends \App\Entity\Base
{
	private $categoryLang;

	private function getCategoryLang()
	{
		if (empty($this->categoryLang)) {
			$langTableName = '\App\Entity\Category\Category' . ucfirst(Localization::getLang());

			$this->categoryLang = new $langTableName($this->conn);
		}

		return $this->categoryLang;
	}

	public function getTableName()
	{
		return 'category_main';
	}

	public function checkFields($data)
	{
		// if (!is_string($data['title']) || !strlen($data['title'])) {
		// 	throw new \Exception('Category title can\'t be empty');
		// }
	}

	public function getFields()
	{
		return [
			'id',
			'active',
			'category_name'
		];
	}

	public function languageList($filter = [])
	{
		$fields = array_merge($this->getFields(), $this->getCategoryLang()->getFields());

		$fieldsMain = $this->getTableName();
		$fieldsLang = $this->getCategoryLang()->getTableName();

		// формируем условия запроса
		$strWhere = '';

		foreach ($filter as $fieldName => $value) {
			if (!in_array($fieldName, $fields)) {
				continue;
			}

			$value = $this->conn->escape($value);
			$strWhere .= " AND $fieldName = $value";
		}

		$sql = "SELECT $fieldsMain.*, $fieldsLang.*
				FROM $fieldsMain
				JOIN $fieldsLang ON $fieldsMain.id = $fieldsLang.id_category
				$strWhere";

		return $this->conn->query($sql);
	}
}
