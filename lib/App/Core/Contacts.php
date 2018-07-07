<?php

namespace App\Core;

use App\Controllers\ContactsController;

class Contacts
{
	private static $data;

	public static function getData()
	{
		return self::$data;
	}

	public static function getContacts()
	{
		$getContacts = new ContactsController();
		static::$data = $getContacts->getContacts();
	}
}
