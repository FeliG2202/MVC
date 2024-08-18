<?php

namespace PHP\Models;

use PDO;

class Connection
{

	public function conectar()
	{
		return new PDO("mysql:dbname=database;host=db", 'root', '2202', [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);
	}
}
