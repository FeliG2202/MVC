<?php 
require_once("Conexion.php");

class OpcionesMenuModelo extends Conexion {
	
	private $tabla;

	function __construct() {
		$this->tabla = 'opcionesmenu';
	}

	public function registrarOpcionMenuModelo($datosOpcionMenu){
		$sql = "INSERT INTO $this->tabla (opcionMenuNombre, opcionesmenu_folder, opcionMenuEnlace, idMenu) VALUES (?,?,?,?)";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosOpcionMenu['opcionMenuNombre'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosOpcionMenu['opcionesmenu_folder'], PDO::PARAM_STR);
			$stmt->bindParam(3, $datosOpcionMenu['opcionMenuEnlace'], PDO::PARAM_STR);
			$stmt->bindParam(4, $datosOpcionMenu['idMenu'], PDO::PARAM_INT);
			if($stmt->execute()){
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function consultarOpcionesMenuIdModelo($idMenu) {
		$sql = "SELECT * FROM `opcionesmenu` WHERE idMenu = ?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $idMenu, PDO::PARAM_INT);
			if($stmt->execute()){
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