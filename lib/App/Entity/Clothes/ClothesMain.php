<?php

namespace App\Entity\Clothes;

use \App\Core\Localization;

class ClothesMain extends \App\Entity\Base
{
	private $clothesLang;
	private $clothesSize;

	private function getClothesLang()
	{
		if (empty($this->clothesLang)) {
			$langTableName = '\App\Entity\Clothes\Clothes' . ucfirst(Localization::getLang());

			$this->clothesLang = new $langTableName($this->conn);
		}

		return $this->clothesLang;
	}

	private function getClothesSize()
	{
		if (empty($this->clothesSize)) {
			$this->clothesSize = new ClothesSize($this->conn);
		}

		return $this->clothesSize;
	}

	public function getTableName()
	{
		return 'clothes_main';
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
			'tel',
			'fb',
			'inst',
			'telegram',
			'price',
			'sex',
			'brand',
			'size'
		];
	}

	public function getMaxPrice()
	{
		$sql = 'SELECT MAX(price) as max FROM ' .  $this->getTableName();
		return $this->conn->query($sql)[0];
	}

	public function getBrand()
	{
		$sql = 'SELECT brand FROM ' .  $this->getTableName() . ' GROUP BY brand';
		return $this->conn->query($sql);
	}

	public function selectLanguageList($id_table, $filter = [])
	{
		$fieldsMain = $this->getTableName();
		$fieldsLang = $this->getClothesLang()->getTableName();
		$fieldsSize = $this->getClothesSize()->getTableName();

		$str = '';

		if (!empty($filter)) {
			$str = 'WHERE 1';

			foreach ($filter as $key => $value) {
				if ($key == 'price') {
					$str .= " AND $fieldsMain.$key BETWEEN $value[0] AND $value[1]";
				} elseif ($key == 'size') {
					$str .= " AND ($fieldsSize." . implode(" = 1 OR $fieldsSize.", $value) . " = 1)";
				} else {
					$in = is_array($value) ? implode('\', \'', $value) : $value;
					$str .= " AND $fieldsMain.$key IN ('$in')";
				}
			}
		}

		$sql = "SELECT $fieldsMain.*, $fieldsLang.*, $fieldsSize.*
				FROM $fieldsMain
				JOIN $fieldsLang ON $fieldsMain.id = $fieldsLang.$id_table
				JOIN $fieldsSize ON $fieldsMain.id = $fieldsSize.$id_table
				$str";

		return $this->conn->query($sql);
	}
}
