<?php

namespace App\Entity\Clothes;

use App\Entity\User;

class ClothesReviews extends \App\Entity\Base
{
	private $user;

	private function getUser()
	{
		if (empty($this->user)) {
			$this->user = new User($this->conn);
		}

		return $this->user;
	}

	public function getTableName()
	{
		return 'clothes_reviews';
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
			'id_users',
			'id_clothes',
			'reviews',
			'date',
			'active'
		];
	}

	public function reviews($active = 1, $section = [])
	{
		$fieldsClothesReviews = $this->getTableName();
		$fieldsUser = $this->getUser()->getTableName();

		$strLimit = '';
		if (!empty($section)) {
			$limitStart = $section[1];
			$limit = $section[0];

			$strLimit = ' LIMIT ' . $limit . ' OFFSET ' . $limitStart;
		}

		$sql = "SELECT $fieldsClothesReviews.*, $fieldsUser.*
				FROM $fieldsClothesReviews
				JOIN $fieldsUser ON $fieldsClothesReviews.id_users = $fieldsUser.id
				WHERE $fieldsClothesReviews.active = $active
				GROUP BY $fieldsClothesReviews.id_users
				$strLimit";
		return $this->conn->query($sql);
	}
}
