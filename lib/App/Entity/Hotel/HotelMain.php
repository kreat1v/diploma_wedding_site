<?php

namespace App\Entity\Hotel;

use \App\Core\Localization;

class HotelMain extends \App\Entity\Base
{
	private $hotelLangModel;

	private function getHotelLang()
	{
		if (empty($this->hotelLangModel)) {
			$langTableName = '\App\Entity\Hotel\Hotel' . ucfirst(Localization::getLang());

			$this->hotelLangModel = new $langTableName($this->conn);
		}

		return $this->hotelLangModel;
	}

	public function getTableName()
	{
		return 'hotel_main';
	}

	public function checkFields($data)
	{}

	public function getFields()
	{
		return [
			'id',
			'tel',
			'fb',
			'inst',
			'telegram',
			'stars',
			'price',
			'stock',
			'active'
		];
	}

	public function getMaxPrice()
	{
		$sql = 'SELECT MAX(price) as max FROM ' .  $this->getTableName();
		return $this->conn->query($sql)[0];
	}

	public function languageList($filter = [], $limit = [])
	{
		// получаем имена таблиц
		$fieldsMain = $this->getTableName();
		$fieldsLang = $this->getHotelLang()->getTableName();

		// формируем условия запроса
		$strWhere = '';
		if (!empty($filter)) {
			$strWhere = 'WHERE 1';

			foreach ($filter as $key => $value) {
				if (is_array($value)) {
					$value = array_map(function($n){
						return $this->conn->escape($n);
					}, $value);
				} else {
					$value = $this->conn->escape($value);
				}

				if ($key == 'price') {
					$strWhere .= " AND $fieldsMain.$key BETWEEN $value[0] AND $value[1]";
				}

				if ($key == 'stars') {
					$in = is_array($value) ? implode(', ', $value) : $value;
					$strWhere .= " AND $fieldsMain.$key IN ($in)";
				}
			}
		}

		// данные для пагинации
		$strLimit = '';
		if (!empty($limit)) {
			$strLimit = " LIMIT $limit[0] OFFSET $limit[1]";
		}

		// формируем сам запрос
		$sql = "SELECT $fieldsMain.*, $fieldsLang.*
				FROM $fieldsMain
				JOIN $fieldsLang ON $fieldsMain.id = $fieldsLang.id_hotel
				$strWhere
				$strLimit";

		return $this->conn->query($sql);
	}
}
