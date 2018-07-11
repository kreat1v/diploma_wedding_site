<?php

namespace App\Entity\Auto;

use \App\Core\Localization;

class AutoMain extends \App\Entity\Base
{
	private $autoLangModel;

	private function getAutoLang()
	{
		if (empty($this->autoLangModel)) {
			$langTableName = '\App\Entity\Auto\Auto' . ucfirst(Localization::getLang());

			$this->autoLangModel = new $langTableName($this->conn);
		}

		return $this->autoLangModel;
	}

	public function getTableName()
	{
		return 'auto_main';
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
			'tel',
			'fb',
			'inst',
			'telegram',
			'price',
			'stock',
			'brand',
			'active'
		];
	}

	public function getMaxPrice()
	{
		$sql = 'SELECT MAX(price) as max FROM ' .  $this->getTableName() . ' WHERE active = 1';
		return $this->conn->query($sql)[0];
	}

	public function getBrand()
	{
		$sql = 'SELECT brand FROM ' .  $this->getTableName() . ' GROUP BY brand';
		return $this->conn->query($sql);
	}

	public function languageList($filter = [], $limit = [])
	{
		// получаем имена таблиц
		$fieldsMain = $this->getTableName();
		$fieldsLang = $this->getAutoLang()->getTableName();

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
				} else {
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
				JOIN $fieldsLang ON $fieldsMain.id = $fieldsLang.id_auto
				$strWhere
				$strLimit";

		return $this->conn->query($sql);
	}

	public function search($string)
	{
		// Получаем имена таблиц.
		$fieldsMain = $this->getTableName();
		$fieldsLang = $this->getAutoLang()->getTableName();

		// Формируем условия запроса.
		$strWhere = "WHERE $fieldsMain.active = 1 AND $fieldsLang.title LIKE '%$string%'";

		// Формируем сам запрос.
		$sql = "SELECT $fieldsMain.*, $fieldsLang.*
				FROM $fieldsMain
				JOIN $fieldsLang ON $fieldsMain.id = $fieldsLang.id_auto
				$strWhere
				ORDER BY $fieldsMain.id DESC";

		return $this->conn->query($sql);
	}
}
