<?php 
require_once("Conexion.php");

class AlmDiaModelo extends Conexion {

	public $conn;
	private $tabla;

	function __construct() {
		$this->conn = new Conexion();
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