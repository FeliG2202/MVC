<?php

namespace PHP\Models;

use PDO;

class Connection
{

	public function conectar()
	{
		return new PDO("mysql:dbname=php_mysql_crud;host=localhost", 'root', '', [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);
	}
}
