<?php

namespace App\Entity;

class LikeStories extends Base
{
	public function getTableName()
	{
		return 'like_stories';
	}

	public function checkFields($data)
	{}

	public function getFields()
	{
		return [
			'id',
			'id_stories',
			'id_users'
		];
	}
}
