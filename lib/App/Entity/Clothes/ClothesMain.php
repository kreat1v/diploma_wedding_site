<?php

namespace App\Entity\Clothes;

use \App\Core\Localization;

class ClothesMain extends \App\Entity\Base
{
	private $clothesLangModel;
	private $clothesSizeModel;

	private function getClothesLang()
	{
		if (empty($this->clothesLangModel)) {
			$langTableName = '\App\Entity\Clothes\Clothes' . ucfirst(Localization::getLang());

			$this->clothesLangModel = new $langTableName($this->conn);
		}

		return $this->clothesLangModel;
	}

	private function getClothesSize()
	{
		if (empty($this->clothesSizeModel)) {
			$this->clothesSizeModel = new ClothesSize($this->conn);
		}

		return $this->clothesSizeModel;
	}

	public function getTableName()
	{
		return 'clothes_main';
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
			'sex',
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
		$fieldsLang = $this->getClothesLang()->getTableName();
		$fieldsSize = $this->getClothesSize()->getTableName();

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
				} elseif ($key == 'size') {
					$size = [];

					foreach ($value as $sizeName) {
						if (!in_array(trim($sizeName, '\''), $this->getClothesSize()->getFields())) {
							continue;
						}

						$size[] = trim($sizeName, '\'');
					}

					$strWhere .= " AND ($fieldsSize." . implode(" = 1 OR $fieldsSize.", $size) . " = 1)";
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
		$sql = "SELECT $fieldsMain.*, $fieldsLang.*, $fieldsSize.*
				FROM $fieldsMain
				JOIN $fieldsLang ON $fieldsMain.id = $fieldsLang.id_clothes
				JOIN $fieldsSize ON $fieldsMain.id = $fieldsSize.id_clothes
				$strWhere
				$strLimit";

		return $this->conn->query($sql);
	}
}
