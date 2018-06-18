<?php

namespace App\Entity\Filming;

use \App\Core\Localization;

class FilmingMain extends \App\Entity\Base
{
	private $filmingLangModel;

	private function getFilmingLang()
	{
		if (empty($this->filmingLangModel)) {
			$langTableName = '\App\Entity\Filming\Filming' . ucfirst(Localization::getLang());

			$this->filmingLangModel = new $langTableName($this->conn);
		}

		return $this->filmingLangModel;
	}

	public function getTableName()
	{
		return 'filming_main';
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

	public function languageList($filter = [], $limit = [])
	{
		// получаем имена таблиц
		$fieldsMain = $this->getTableName();
		$fieldsLang = $this->getFilmingLang()->getTableName();

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
				JOIN $fieldsLang ON $fieldsMain.id = $fieldsLang.id_filming
				$strWhere
				$strLimit";

		return $this->conn->query($sql);
	}
}
