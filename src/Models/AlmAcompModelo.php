<?php

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;
use LionDatabase\Drivers\MySQL\MySQL as DB;


class AlmAcompModelo extends Connection
{

	private $tabla;

	function __construct()
	{
		$this->tabla = 'nutriacomp';
	}


	public function registrarAlmAcompModelo($nutriAcomp)
	{
		$sql = "INSERT INTO $this->tabla(nutriAcompNombre) VALUES (?)";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $nutriAcomp, PDO::PARAM_STR);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function consultarAlmAcompModelo() {
		return DB::table('nutriacomp')->select()->getAll();
	}


	public function consultarAlmACompIdModelo($id)
	{
		$sql = "SELECT * FROM $this->tabla WHERE idNutriAcomp=?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
			if ($stmt->execute()) {
				return $stmt->fetchAll();
			} else {
				return [];
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function actualizarAlmAcompModelo($datosAlmAComp)
	{
		$sql = "UPDATE $this->tabla SET nutriAcompNombre=? WHERE idnutriAcomp=?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosAlmAComp['nombreAcomp'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosAlmAComp['id'], PDO::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function eliminarAlmAcompModelo($id)
	{
		$sql = "DELETE FROM $this->tabla WHERE idnutriAcomp = ?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function listarAlmAcompMenuModelo()
	{
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
