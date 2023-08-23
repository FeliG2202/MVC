<?php

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;


class AlmBebidaModelo extends Connection
{

	private $tabla;

	function __construct()
	{
		$this->tabla = 'nutribebida';
	}


	public function registrarAlmBebidaModelo($nutriBebida)
	{
		$sql = "INSERT INTO $this->tabla(nutriBebidaNombre) VALUES (?)";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $nutriBebida, PDO::PARAM_STR);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function consultarAlmBebidaModelo($nutriBebidaBuscado)
	{
		$nutriBebidaBuscado = "%" . $nutriBebidaBuscado . "%";
		$sql = "SELECT * FROM $this->tabla WHERE nutriBebidaNombre LIKE ? ORDER BY nutriBebidaNombre";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $nutriBebidaBuscado, PDO::PARAM_STR);
			return !$stmt->execute() ? [] : $stmt->fetchAll();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function consultarAlmBebidaIdModelo($id)
	{
		$sql = "SELECT * FROM $this->tabla WHERE idNutriBebida=?";
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


	public function actualizarAlmBebidaModelo($datosAlmBebida)
	{
		$sql = "UPDATE $this->tabla SET nutriBebidaNombre=? WHERE idnutriBebida=?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosAlmBebida['nombreBebida'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosAlmBebida['id'], PDO::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function eliminarAlmBebidaModelo($id)
	{
		$sql = "DELETE FROM $this->tabla WHERE idnutriBebida = ?";
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

	public function listarAlmBebidaMenuModelo()
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
