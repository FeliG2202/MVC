<?php

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;
use LionDatabase\Drivers\MySQL\MySQL as DB;

class AlmTipoModelo extends Connection
{

	private $tabla;

	function __construct()
	{
		$this->tabla = 'nutritipo';
	}


	public function registrarAlmTipoModelo($nutriTipo)
	{
		$sql = "INSERT INTO $this->tabla(nutriTipoNombre) VALUES (?)";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $nutriTipo, PDO::PARAM_STR);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function consultarAlmTipoModelo() {
		return DB::table('nutritipo')->select()->getAll();
	}


	public function consultarAlmTipoIdModelo($id)
	{
		$sql = "SELECT * FROM $this->tabla WHERE idNutriTipo=?";

		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
			if ($stmt->execute()) {
				return $stmt->fetch();
			} else {
				return [];
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function actualizarAlmTipoModelo($datosAlmTipo)
	{
		$sql = "UPDATE $this->tabla SET nutriTipoNombre=? WHERE idnutriTipo=?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosAlmTipo['nombreTipo'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosAlmTipo['id'], PDO::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function eliminarAlmTipoModelo($id)
	{
		$sql = "DELETE FROM $this->tabla WHERE idnutriTipo = ?";
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

	public function listarAlmTipoMenuModelo()
	{
		$sql = "SELECT * FROM $this->tabla WHERE 1";
		try {
			$stmt =  $this->conectar()->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}
}
