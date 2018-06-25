<?php

namespace App\Entity\Clothes;

class ClothesSize extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'clothes_size';
	}

	public function checkFields($data)
	{
		$count = [];
		foreach ($data as $value) {
			if ($value) {
				$count[] = $value;
			}
		}

		if (empty($count)) {
			throw new \Exception(__('form.field'));
		}
	}

	public function getFields()
	{
		return [
			'id',
			'id_clothes',
			's',
			'm',
			'l',
			'xl'
		];
	}
}
