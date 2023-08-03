<?php
require_once("Conexion.php");

class PedAlmMenuModelo extends Conexion
{

  public $tabla = 'personas';

  public function validarIdentificacion($identMenu)
  {
    $sql = "SELECT idPersona FROM $this->tabla WHERE personaDocumento = ?";
    try {
      $stmt = $this->conectar()->prepare($sql);
      $stmt->bindParam(1, $identMenu);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo 'Error al validar el número de identificación: ' . $e->getMessage();
      return false;
    }
  }

  public function consultarAlmMenuIdModelo($idPersona)
  {
    $sql = "SELECT * FROM $this->tabla WHERE idPersona = ?";
		try {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare($sql);
			$stmt->bindParam(1, $idPersona, PDO::PARAM_INT);
			if ($stmt->execute()) {
				return $stmt->fetchAll();
			} else {
				return [];
			}
		} catch (PDOException $e) {
			print($e->getMessage());
		}
  }
}
