<?php 

class OpcionesMenuControlador {
	
	public $menuControlador;
	private $opcionMenuModelo;

	function __construct()	{
		$this->menuControlador = new MenuControlador();
		$this->opcionMenuModelo = new OpcionesMenuModelo();
	}


	public function registrarOpcionMenuControlador() {
		if (isset($_POST['btnregOpcionMenu'])) {
			$datosOpcionMenu = array(
				'idMenu' => $_POST['idMenu'],
				'opcionMenuNombre' => $_POST['opcionMenuNombre'],
				'opcionesmenu_folder' => $_POST['opcionesmenu_folder'],
				'opcionMenuEnlace' => $_POST['opcionMenuEnlace']
			);

			return !$this->opcionMenuModelo->registrarOpcionMenuModelo($datosOpcionMenu) 
			? (object) ['request' => false, 'url' => "index.php?folder=frmMenu&view=frmRegOpcionesMenu"] 
			: (object) ['request' => true, 'url' => "index.php?folder=frmMenu&view=frmRegOpcionesMenu"];
		}
	}

	public function consultarOpcionesMenuIdControlador($idMenu){
		return $this->opcionMenuModelo->consultarOpcionesMenuIdModelo($idMenu);
	}
}