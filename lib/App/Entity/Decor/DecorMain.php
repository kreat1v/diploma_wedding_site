<?php

namespace App\Entity\Decor;

use \App\Core\Localization;

class DecorMain extends \App\Entity\Base
{
	private $decorLangModel;

	private function getDecorLang()
	{
		if (empty($this->decorLangModel)) {
			$langTableName = '\App\Entity\Decor\Decor' . ucfirst(Localization::getLang());

			$this->decorLangModel = new $langTableName($this->conn);
		}

		return $this->decorLangModel;
	}

	public function getTableName()
	{
		return 'decor_main';
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
			'price'
		];
	}

	public function getMaxPrice()
	{
		$sql = 'SELECT MAX(price) as max FROM ' .  $this->getTableName();
		return $this->conn->query($sql)[0];
	}

	public function getService()
	{
		$sql = 'SELECT service FROM ' .  $this->getDecorLang()->getTableName() . ' GROUP BY service';
		return $this->conn->query($sql);
	}

	public function languageList($filter = [], $limit = [])
	{
		// получаем имена таблиц
		$fieldsMain = $this->getTableName();
		$fieldsLang = $this->getDecorLang()->getTableName();

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

				if ($key == 'service') {
					$service = [];

					foreach ($value as $serviceName) {
						$service[] = "$fieldsLang.service LIKE " . substr_replace($serviceName, '%', -1, 0);
					}

					$strWhere .= " AND " . implode(" OR ", $service);
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
				JOIN $fieldsLang ON $fieldsMain.id = $fieldsLang.id_decor
				$strWhere
				$strLimit";

		return $this->conn->query($sql);
	}
}
