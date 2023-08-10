<?php

namespace PHP\Models;

use PDOException;
use PHP\Models\Connection;


class AlmDiaModelo extends Connection {

	private $tabla;

	function __construct() {
		$this->tabla = 'nutridias';
	}

	public function ListarAlmDiaMenuModelo(){
		$sql = "SELECT * FROM $this->tabla WHERE 1";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}
}