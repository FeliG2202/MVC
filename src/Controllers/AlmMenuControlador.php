<?php 

namespace PHP\Controllers;

use PHP\Models\AlmMenuModelo;

class AlmMenuControlador {
	
	private $AlmMenuModelo;

	public function __construct() {
		$this->AlmMenuModelo = new AlmMenuModelo();
	}	

	public function registrarAlmMenuControlador() {
		if (isset($_POST['btnSaveAlmRegMenu'])) {
			$datosAlmMenu = array('idNutriTipo' => $_POST['idNutriTipo'],
				'idNutriDias' => $_POST['idNutriDias'],
				'idNutriSopa' => $_POST['idNutriSopa'],
				'idNutriArroz' => $_POST['idNutriArroz'],
				'idNutriProte' => $_POST['idNutriProte'],
				'idNutriEnerge' => $_POST['idNutriEnerge'],
				'idNutriAcomp' => $_POST['idNutriAcomp'],
				'idNutriEnsal' => $_POST['idNutriEnsal'],
				'idNutriBebida' => $_POST['idNutriBebida']);
			return !$this->AlmMenuModelo->registrarAlmMenuModelo($datosAlmMenu) 
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmMenu&view=frmAlmRegMenu"] 
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmMenu&view=frmAlmConMenu"];
		}
	}

	public function consultarAlmMenuControlador(){
		if (isset($_POST['btnBuscarMenu'])) {
			if (isset($_POST['datoBusqueda'])) {
				$datoBusqueda = $_POST['datoBusqueda'];
			}
		} else{
			$datoBusqueda = '';
		}
		return $this->AlmMenuModelo->consultarAlmMenuModelo($datoBusqueda);
	}

	public function consultarAlmMenuIdControlador(){
		if (isset($_GET['id'])) {
			return $this->AlmMenuModelo->consultarAlmMenuIdModelo($_GET['id']);
		}
	}

	
}