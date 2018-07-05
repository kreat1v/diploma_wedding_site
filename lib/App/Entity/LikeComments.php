<?php

namespace App\Entity;

class LikeComments extends Base
{
	public function getTableName()
	{
		return 'like_comments';
	}

	public function checkFields($data)
	{}

	public function getFields()
	{
		return [
			'id',
			'id_comments',
			'id_users'
		];
	}
}
