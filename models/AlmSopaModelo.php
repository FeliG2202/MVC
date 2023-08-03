<?php 
require_once("Conexion.php");

class AlmSopaModelo extends Conexion {
	
	private $tabla;

	function __construct()	{
		$this->tabla = 'nutriSopa';
	}


	public function registrarAlmSopaModelo($nutriSopa) {
		$sql = "INSERT INTO $this->tabla(nutriSopaNombre) VALUES (?)";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $nutriSopa, PDO::PARAM_STR);
			if ($stmt->execute()) {
				return true;
			}
			else{
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function consultarAlmSopaModelo($nutriSopaBuscado) {
		$nutriSopaBuscado = "%".$nutriSopaBuscado."%";
		$sql = "SELECT * FROM $this->tabla WHERE nutriSopaNombre LIKE ? ORDER BY nutriSopaNombre";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $nutriSopaBuscado, PDO::PARAM_STR);
			return !$stmt->execute() ? [] : $stmt->fetchAll();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}		
	}


	public function consultarAlmSopaIdModelo($id) {
		$sql = "SELECT * FROM $this->tabla WHERE idNutriSopa=?";
		try {
			$stmt = $this->conectar()->prepare($sql);	
			$stmt->bindParam(1, $id, PDO::PARAM_INT);		
			if ($stmt->execute()) {
				return $stmt->fetchAll();
			}
			else{
				return [];
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function actualizarAlmSopaModelo($datosAlmSopa){
		$sql = "UPDATE $this->tabla SET nutriSopaNombre=? WHERE idnutriSopa=?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosAlmSopa['nombreSopa'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosAlmSopa['id'], PDO::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			}
			else{
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function eliminarAlmSopaModelo($id) {
		$sql= "DELETE FROM $this->tabla WHERE idnutriSopa = ?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1,$id, PDO::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			} else { 
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function listarAlmSopaMenuModelo(){
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