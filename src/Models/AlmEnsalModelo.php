<?php

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;

class AlmEnsalModelo extends Connection {
	
	private $tabla;

	function __construct()	{
		$this->tabla = 'nutriensal';
	}


	public function registrarAlmEnsalModelo($nutriEnsal) {
		$sql = "INSERT INTO $this->tabla(nutriEnsalNombre) VALUES (?)";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $nutriEnsal, PDO::PARAM_STR);
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


	public function consultarAlmEnsalModelo($nutriEnsalBuscado) {
		$nutriEnsalBuscado = "%".$nutriEnsalBuscado."%";
		$sql = "SELECT * FROM $this->tabla WHERE nutriEnsalNombre LIKE ? ORDER BY nutriEnsalNombre";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $nutriEnsalBuscado, PDO::PARAM_STR);
			return !$stmt->execute() ? [] : $stmt->fetchAll();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}		
	}


	public function consultarAlmEnsalIdModelo($id) {
		$sql = "SELECT * FROM $this->tabla WHERE idNutriEnsal=?";
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


	public function actualizarAlmEnsalModelo($datosAlmEnsal){
		$sql = "UPDATE $this->tabla SET nutriEnsalNombre=? WHERE idnutriEnsal=?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosAlmEnsal['nombreEnsal'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosAlmEnsal['id'], PDO::PARAM_INT);
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

	public function eliminarAlmEnsalModelo($id) {
		$sql= "DELETE FROM $this->tabla WHERE idnutriEnsal = ?";
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

	public function listarAlmEnsalMenuModelo(){
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