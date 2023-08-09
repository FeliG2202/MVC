<?php

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;

class PedAlmMenuModelo extends Connection
{

  public $tabla = 'personas';
  public $tablaMDP = 'menu_seleccionado_dia_persona';

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
      $stmt = $this->conectar()->prepare($sql);
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

  public function consultarMenuModelo($dia, $semana)
  {
    $sql = "SELECT * FROM view_nutrimenu WHERE nutriDiasNombre=? AND nutriMenuSemana=?";

    try {
      $stmt = $this->conectar()->prepare($sql);
      $stmt->bindParam(1, $dia, PDO::PARAM_STR);
      $stmt->bindParam(2, $semana, PDO::PARAM_INT);
      return !$stmt->execute() ? [] : $stmt->fetchAll();
    } catch (PDOException $e) {
      print($e->getMessage());
    }
  }

  public function registrarMenuDiaModelo($data)
  {
    $sql = "INSERT INTO {$this->tablaMDP} (idPersona,idNutriMenu,menuSeleccionadoDiaPersona,fecha_actual) VALUES (?,?,?,?)";
    $menu_str = trim(implode(",", $data['list']));

    try {
      $stmt = $this->conectar()->prepare($sql);
      $stmt->bindParam(1, $data['idPersona'], PDO::PARAM_INT);
      $stmt->bindParam(2, $data['idMenu'], PDO::PARAM_INT);
      $stmt->bindParam(3, $menu_str, PDO::PARAM_STR);
      $stmt->bindParam(4, $data['date'], PDO::PARAM_STR);
      if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
  }
}
