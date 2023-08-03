<?php
require_once("Conexion.php");

class AlmTipoModelo extends Conexion
{

	private $tabla;

	function __construct()
	{
		$this->tabla = 'nutriTipo';
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


	public function consultarAlmTipoModelo($nutriTipoBuscado)
	{
		$nutriTipoBuscado = "%" . $nutriTipoBuscado . "%";
		$sql = "SELECT * FROM $this->tabla WHERE nutriTipoNombre LIKE ? ORDER BY nutriTipoNombre";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $nutriTipoBuscado, PDO::PARAM_STR);
			return !$stmt->execute() ? [] : $stmt->fetchAll();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function consultarAlmTipoIdModelo($id)
	{
		$sql = "SELECT * FROM $this->tabla WHERE idNutriTipo=?";
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
