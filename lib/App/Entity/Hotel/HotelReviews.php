<?php

namespace App\Entity\Hotel;

use App\Entity\User;

class HotelReviews extends \App\Entity\Base
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
		return 'hotel_reviews';
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
		$fieldsHotelReviews = $this->getTableName();
		$fieldsUser = $this->getUser()->getTableName();

		$where = [];
		$strWhere = '';
		if (!empty($filter)) {
			foreach ($filter as $fieldName => $value) {
				if (!in_array($fieldName, $this->getFields())) {
					continue;
				}

				$value = $this->conn->escape($value);
				$where[] = "$fieldsHotelReviews.$fieldName = $value";
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

		$sql = "SELECT $fieldsHotelReviews.*, $fieldsUser.*
				FROM $fieldsHotelReviews
				JOIN $fieldsUser ON $fieldsHotelReviews.id_users = $fieldsUser.id
				WHERE 1 $strWhere
				ORDER BY $fieldsHotelReviews.date DESC
				$strLimit";
		return $this->conn->query($sql);
	}
}
