<?php

namespace App\Entity\Stories;

use \App\Core\Localization;

class StoriesMain extends \App\Entity\Base
{
	private $storiesLangModel;

	private function getStoriesLang()
	{
		if (empty($this->storiesLangModel)) {
			$langTableName = '\App\Entity\Stories\Stories' . ucfirst(Localization::getLang());

			$this->storiesLangModel = new $langTableName($this->conn);
		}

		return $this->storiesLangModel;
	}

	public function getTableName()
	{
		return 'stories_main';
	}

	public function checkFields($data)
	{
		foreach ($data as $value) {
			if (empty($value) && !strlen($value) && $value !== null) {
				throw new \Exception(__('form.field'));
			}
		}
	}

	public function getFields()
	{
		return [
			'id',
			'date',
			'views',
			'active'
		];
	}

	public function languageList($filter = [], $limit = [])
	{
		$fields = array_merge($this->getFields(), $this->getStoriesLang()->getFields());

		$fieldsMain = $this->getTableName();
		$fieldsLang = $this->getStoriesLang()->getTableName();

		// формируем условия запроса
		$strWhere = 'WHERE 1';

		foreach ($filter as $fieldName => $value) {
			if (!in_array($fieldName, $fields)) {
				continue;
			}

			$value = $this->conn->escape($value);
			$strWhere .= " AND $fieldName = $value";
		}

		// данные для пагинации
		$strLimit = '';
		if (!empty($limit)) {
			$strLimit = " LIMIT $limit[0] OFFSET $limit[1]";
		}

		$sql = "SELECT $fieldsMain.*, $fieldsLang.*
				FROM $fieldsMain
				JOIN $fieldsLang ON $fieldsMain.id = $fieldsLang.id_stories
				$strWhere
				ORDER BY $fieldsMain.id DESC
				$strLimit";

		return $this->conn->query($sql);
	}

	public function getSection($limit, $limitStart, $where = null, $value = null)
	{
		$strWhere = '';

		if ($where && $value) {
			$strWhere = ' WHERE ' . $where . ' = '. $value;
		}

		$sql = 'SELECT * FROM ' . $this->getTableName() . $strWhere . ' ORDER BY id DESC LIMIT ' . $limit . ' OFFSET ' . $limitStart;

		return $this->conn->query($sql);
	}

	// получение определенных новостей из таблицы по id
	public function getNews(string $id, $limit, $limitStart)
	{
		if (empty($id)) {
			return null;
		}

		$sql = 'SELECT * FROM ' .  $this->getTableName() . ' WHERE id IN ('. $id .') ORDER BY id DESC LIMIT ' . $limit . ' OFFSET ' . $limitStart;
		$result = $this->conn->query($sql);

		return isset($result) ? $result : null;
	}

	public function filter($filter)
	{
		$fieldsNews = $this->getTableName();
		$fieldsNewsTag = $this->getNewsTag()->getTableName();
		$fieldsTags = $this->getTags()->getTableName();
		$fieldsCategory = $this->getCategory()->getTableName();

		$analytics = $this->getCategory()->getBy('title', 'Analytics');

		$where = [];
		$category = [];
		$tags = [];

		if (!empty($filter['dateFrom'])) {
			$value = $this->conn->escape($filter['dateFrom']);
			$where[] = "news.date >= $value";
		}

		if (!empty($filter['dateTo'])) {
			$value = $this->conn->escape($filter['dateTo']);
			$where[] = "news.date <= $value";
		}

		if (!empty($filter['category'])) {
			foreach ($filter['category'] as $idCategory) {
				if ($idCategory == $analytics['id']) {
					$where[] = "news.analytics = 1";
					continue;
				}

				$idCategory = $this->conn->escape($idCategory);
				$category[] = $idCategory;
			}

			if (!empty($category)) {
				$str = implode(', ', $category);
			}

			if (!empty($str)) {
				$where[] = "news.id_category IN ($str)";
			}
		}

		if (!empty($filter['tags'])) {
			foreach ($filter['tags'] as $idTags) {
				$idTags = $this->conn->escape($idTags);
				$tags[] = $idTags;
			}

			if (!empty($tags)) {
				$str = implode(', ', $tags);
			}

			$where[] = "tags.id IN ($str)";
		}

		if (!empty($where)) {
			$strWhere = ' AND ' . implode(' AND ', $where);
		} else {
			return null;
		}

		echo $strWhere;

		$sql = "SELECT $fieldsNews.*
				FROM $fieldsNews
				JOIN $fieldsNewsTag ON $fieldsNews.id = $fieldsNewsTag.id_news
				JOIN $fieldsTags ON $fieldsNewsTag.id_tags = $fieldsTags.id
				JOIN $fieldsCategory ON $fieldsNews.id_category = $fieldsCategory.id
				WHERE 1 $strWhere
				GROUP BY $fieldsNews.id";
		return $this->conn->query($sql);
	}
}
