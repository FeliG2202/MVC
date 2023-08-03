<?php 
require_once("Conexion.php");

class AlmProteModelo extends Conexion {
	
	private $tabla;

	function __construct()	{
		$this->tabla = 'nutriProte';
	}


	public function registrarAlmProteModelo($nutriProte) {
		$sql = "INSERT INTO $this->tabla(nutriProteNombre) VALUES (?)";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $nutriProte, PDO::PARAM_STR);
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


	public function consultarAlmProteModelo($nutriProteBuscado) {
		$nutriProteBuscado = "%".$nutriProteBuscado."%";
		$sql = "SELECT * FROM $this->tabla WHERE nutriProteNombre LIKE ? ORDER BY nutriProteNombre";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $nutriProteBuscado, PDO::PARAM_STR);
			return !$stmt->execute() ? [] : $stmt->fetchAll();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}		
	}


	public function consultarAlmProteIdModelo($id) {
		$sql = "SELECT * FROM $this->tabla WHERE idNutriProte=?";
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


	public function actualizarAlmProteModelo($datosAlmProte){
		$sql = "UPDATE $this->tabla SET nutriProteNombre=? WHERE idnutriProte=?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosAlmProte['nombreProte'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosAlmProte['id'], PDO::PARAM_INT);
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

	public function eliminarAlmProteModelo($id) {
		$sql= "DELETE FROM $this->tabla WHERE idnutriProte = ?";
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

	public function listarAlmProteMenuModelo(){
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