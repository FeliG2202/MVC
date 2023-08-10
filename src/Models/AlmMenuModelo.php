<?php

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;

class AlmMenuModelo extends Connection {

	private $tabla = 'nutrimenu';
	private $vista = 'view_nutrimenu';

	function registrarAlmMenuModelo($datosAlmMenu) {
		$sql = "INSERT INTO $this->tabla(idNutriTipo, idNutriDias, idNutriSopa, idNutriArroz, idNutriProte, idNutriEnerge, idNutriAcomp, idNutriEnsal, idNutriBebida) VALUES (?,?,?,?,?,?,?,?,?)";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosAlmMenu['idNutriTipo'], PDO::PARAM_INT);
			$stmt->bindParam(2, $datosAlmMenu['idNutriDias'], PDO::PARAM_INT);
			$stmt->bindParam(3, $datosAlmMenu['idNutriSopa'], PDO::PARAM_INT);
			$stmt->bindParam(4, $datosAlmMenu['idNutriArroz'], PDO::PARAM_INT);
			$stmt->bindParam(5, $datosAlmMenu['idNutriProte'], PDO::PARAM_INT);
			$stmt->bindParam(6, $datosAlmMenu['idNutriEnerge'], PDO::PARAM_INT);
			$stmt->bindParam(7, $datosAlmMenu['idNutriAcomp'], PDO::PARAM_INT);
			$stmt->bindParam(8, $datosAlmMenu['idNutriEnsal'], PDO::PARAM_INT);
			$stmt->bindParam(9, $datosAlmMenu['idNutriBebida'], PDO::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			}else{
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function consultarAlmMenuModelo($nutriMenuBuscado) {
		$nutriMenuBuscado = "%".$nutriMenuBuscado."%";
		$sql = "SELECT * FROM $this->vista WHERE nutriTipoNombre LIKE ? OR nutriDiasNombre LIKE ? OR nutriSopaNombre LIKE ? OR nutriArrozNombre LIKE ? OR nutriProteNombre LIKE ? OR nutriEnergeNombre LIKE ? OR nutriAcompNombre LIKE ? OR nutriEnsalNombre LIKE ? OR nutriBebidaNombre LIKE ?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $nutriMenuBuscado, PDO::PARAM_STR);
			$stmt->bindParam(2, $nutriMenuBuscado, PDO::PARAM_STR);
			$stmt->bindParam(3, $nutriMenuBuscado, PDO::PARAM_STR);
			$stmt->bindParam(4, $nutriMenuBuscado, PDO::PARAM_STR);
			$stmt->bindParam(5, $nutriMenuBuscado, PDO::PARAM_STR);
			$stmt->bindParam(6, $nutriMenuBuscado, PDO::PARAM_STR);
			$stmt->bindParam(7, $nutriMenuBuscado, PDO::PARAM_STR);
			$stmt->bindParam(8, $nutriMenuBuscado, PDO::PARAM_STR);
			$stmt->bindParam(9, $nutriMenuBuscado, PDO::PARAM_STR);
			return !$stmt->execute() ? [] : $stmt->fetchAll();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}		
	}

	public function consultarAlmMenuIdModelo($id) {
		$sql = "SELECT * FROM $this->tabla WHERE idNutriMenu=?";
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
	
}