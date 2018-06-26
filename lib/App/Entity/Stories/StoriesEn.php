<?php

namespace App\Entity\Stories;

class StoriesEn extends \App\Entity\Base
{
	public function getTableName()
	{
		return 'stories_en';
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
			'id_stories',
			'title',
			'content'
		];
	}
}
