<?php

namespace App\Entity\Filming;

use App\Entity\User;

class FilmingReviews extends \App\Entity\Base
{
	private $userModel;

	private function getUser()
	{
		if (empty($this->userModel)) {
			$this->userModel = new User($this->conn);
		}

		return $this->userModel;
	}

	public function getTableName()
	{
		return 'filming_reviews';
	}

	public function checkFields($data)
	{
		foreach ($data as $value) {
			if (empty($value) && !strlen($value)) {
				throw new \Exception(__('form.field'));
			}
		}
	}

	public function getFields()
	{
		return [
			'id',
			'id_product',
			'id_users',
			'reviews',
			'date',
			'active'
		];
	}

	public function reviews($filter = [], $section = [])
	{
		$fieldsFilmingReviews = $this->getTableName();
		$fieldsUser = $this->getUser()->getTableName();

		$where = [];
		$strWhere = '';
		if (!empty($filter)) {
			foreach ($filter as $fieldName => $value) {
				if (!in_array($fieldName, $this->getFields())) {
					continue;
				}

				$value = $this->conn->escape($value);
				$where[] = "$fieldsFilmingReviews.$fieldName = $value";
			}

			if (!empty($where)) {
				$strWhere = ' AND ' . implode(' AND ', $where);
			}
		}

		$strLimit = '';
		if (!empty($section)) {
			$limitStart = $section[1];
			$limit = $section[0];

			$strLimit = ' LIMIT ' . $limit . ' OFFSET ' . $limitStart;
		}

		$sql = "SELECT $fieldsFilmingReviews.*, $fieldsUser.*
				FROM $fieldsFilmingReviews
				JOIN $fieldsUser ON $fieldsFilmingReviews.id_users = $fieldsUser.id
				WHERE 1 $strWhere
				ORDER BY $fieldsFilmingReviews.date DESC
				$strLimit";
		return $this->conn->query($sql);
	}
}
