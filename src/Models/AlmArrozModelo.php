<?php

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;

class AlmArrozModelo extends Connection
{

	private $tabla;

	function __construct()
	{
		$this->tabla = 'nutriarroz';
	}


	public function registrarAlmArrozModelo($nutriArroz)
	{
		$sql = "INSERT INTO $this->tabla(nutriArrozNombre) VALUES (?)";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $nutriArroz, PDO::PARAM_STR);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function consultarAlmArrozModelo($nutriArrozBuscado)
	{
		$nutriArrozBuscado = "%" . $nutriArrozBuscado . "%";
		$sql = "SELECT * FROM $this->tabla WHERE nutriArrozNombre LIKE ? ORDER BY nutriArrozNombre";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $nutriArrozBuscado, PDO::PARAM_STR);
			return !$stmt->execute() ? [] : $stmt->fetchAll();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function consultarAlmArrozIdModelo($id)
	{
		$sql = "SELECT * FROM $this->tabla WHERE idNutriArroz=?";
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


	public function actualizarAlmArrozModelo($datosAlmArroz)
	{
		$sql = "UPDATE $this->tabla SET nutriArrozNombre=? WHERE idnutriArroz=?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosAlmArroz['nombreArroz'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosAlmArroz['id'], PDO::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function eliminarAlmArrozModelo($id)
	{
		$sql = "DELETE FROM $this->tabla WHERE idnutriArroz = ?";
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

	public function listarAlmArrozMenuModelo()
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
