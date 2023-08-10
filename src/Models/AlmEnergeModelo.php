<?php

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;


class AlmEnergeModelo extends Connection
{

	private $tabla;

	function __construct()
	{
		$this->tabla = 'nutriEnerge';
	}


	public function registrarAlmEnergeModelo($nutriEnerge)
	{
		$sql = "INSERT INTO $this->tabla(nutriEnergeNombre) VALUES (?)";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $nutriEnerge, PDO::PARAM_STR);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function consultarAlmEnergeModelo($nutriEnergeBuscado)
	{
		$nutriEnergeBuscado = "%" . $nutriEnergeBuscado . "%";
		$sql = "SELECT * FROM $this->tabla WHERE nutriEnergeNombre LIKE ? ORDER BY nutriEnergeNombre";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $nutriEnergeBuscado, PDO::PARAM_STR);
			return !$stmt->execute() ? [] : $stmt->fetchAll();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function consultarAlmEnergeIdModelo($id)
	{
		$sql = "SELECT * FROM $this->tabla WHERE idNutriEnerge=?";
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


	public function actualizarAlmEnergeModelo($datosAlmEnerge)
	{
		$sql = "UPDATE $this->tabla SET nutriEnergeNombre=? WHERE idnutriEnerge=?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosAlmEnerge['nombreEnerge'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosAlmEnerge['id'], PDO::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function eliminarAlmEnergeModelo($id)
	{
		$sql = "DELETE FROM $this->tabla WHERE idnutriEnerge = ?";
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

	public function listarAlmEnergeMenuModelo()
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
