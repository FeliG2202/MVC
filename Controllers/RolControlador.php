<?php

class RolControlador
{

	private $rolModelo;
	function __construct()
	{
		$this->rolModelo = new RolModelo();
	}


	public function registrarRolControlador()
	{
		if (isset($_POST['regRol'])) {
			return !$this->rolModelo->registrarRolModelo($_POST['nombrePerfil'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmPersona&view=frmRegPersona"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmPersona&view=frmConPersona"];
		}
	}


	public function consultarRolControlador()
	{
		if (isset($_POST['btnBuscarRol'])) {
			if (isset($_POST['datoBusqueda'])) {
				$rolBuscado = $_POST['datoBusqueda'];
			}
		} else {
			$rolBuscado = '';
		}
		return $this->rolModelo->consultarRolModelo($rolBuscado);
	}


	public function consultarRolIdControlador()
	{
		if (isset($_GET['id'])) {
			return $this->rolModelo->consultarRolIdModelo($_GET['id']);
		}
	}


	public function actualizarRolControlador()
	{
		if (isset($_POST['updRol'])) {
			$datosRol = array(
				'nombrePerfil' => $_POST['nombrePerfil'],
				'id' => $_GET['id']
			);
			return !$this->rolModelo->actualizarRolModelo($datosRol)
				? (object) ['request' => false, 'url' => "index.php?folder=frmPersona&view=frmEditPersona"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmPersona&view=frmConPersona"];
		}
	}


	public function eliminarRolControlador()
	{
		if (isset($_GET['id'])) {

			return !$this->rolModelo->eliminarRolModelo($_GET['id'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmPersona&view=frmConPersona"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmPersona&view=frmConPersona"];
		}
	}
}
