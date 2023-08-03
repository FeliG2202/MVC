<?php

class MenuControlador
{

	private $MenuModelo;

	function __construct()
	{
		$this->MenuModelo = new MenuModelo();
	}

	public function registrarMenuControlador()
	{
		if (isset($_POST['btnRegMenu'])) {
			return !$this->MenuModelo->registrarMenuModelo($_POST['nombreMenu'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmMenu&view=frmRegMenu"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmMenu&view=frmConMenu"];
		}
	}

	public function consultarMenuControlador()
	{
		if (isset($_POST['btnBuscarMenu'])) {
			if (isset($_POST['datoBusqueda'])) {
				$rolBuscado = $_POST['datoBusqueda'];
			}
		} else {
			$rolBuscado = '';
		}

		return $this->MenuModelo->consultarMenuModelo($rolBuscado);
	}

	public function consultarMenuIdControlador()
	{
		if (isset($_GET['id'])) {
			return $this->MenuModelo->consultarMenuIdModelo($_GET['id']);
		}
	}

	public function actualizarMenuControlador()
	{
		if (isset($_POST['updMenu'])) {
			$datosMenu = [
				'menuNombre' => $_POST['menuNombre'],
				'menuEstado' => $_POST['menuEstado'],
				'id' => $_GET['id']
			];
			return !$this->MenuModelo->actualizarMenuModelo($datosMenu)
				? (object) ['request' => false, 'url' => "index.php?folder=frmMenu&view=frmEditMenu"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmMenu&view=frmConMenu"];
		}
	}

	public function eliminarMenuControlador()
	{
		if (isset($_GET['id'])) {
			return !$this->MenuModelo->eliminarMenuModelo($_GET['id'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmMenu&view=frmConMenu"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmMenu&view=frmConMenu"];
		}
	}
}
