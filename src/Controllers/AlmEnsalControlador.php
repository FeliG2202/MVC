<?php

namespace PHP\Controllers;

use PHP\Models\AlmEnsalModelo;

class AlmEnsalControlador
{

	private $AlmEnsalModelo;

	function __construct()
	{
		$this->AlmEnsalModelo = new AlmEnsalModelo();
	}

	public function registrarAlmEnsalControlador()
	{
		if (isset($_POST['regAlmEnsal'])) {
			return !$this->AlmEnsalModelo->registrarAlmEnsalModelo($_POST['nombreEnsal'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmEnsal&view=frmAlmRegEnsal"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmEnsal&view=frmAlmRegEnsal"];
		}
	}

	public function consultarAlmEnsalControlador()
	{
		if (isset($_POST['btnBuscarEnsal'])) {
			if (isset($_POST['datoBusqueda'])) {
				$rolBuscado = $_POST['datoBusqueda'];
			}
		} else {
			$rolBuscado = '';
		}

		return $this->AlmEnsalModelo->consultarAlmEnsalModelo($rolBuscado);
	}

	public function consultarAlmEnsalIdControlador()
	{
		if (isset($_GET['id'])) {
			return $this->AlmEnsalModelo->consultarAlmEnsalIdModelo($_GET['id']);
		}
	}

	public function actualizarAlmEnsalControlador()
	{
		if (isset($_POST['updEnsal'])) {
			$datosAlmEnsal = [
				'nombreEnsal' => $_POST['nombreEnsal'],
				'id' => $_GET['id']
			];
			return !$this->AlmEnsalModelo->actualizarAlmEnsalModelo($datosAlmEnsal)
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmEnsal&view=frmAlmEditEnsal"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmEnsal&view=frmAlmConEnsal"];
		}
	}

	public function eliminarAlmEnsalControlador()
	{
		if (isset($_GET['id'])) {
			return !$this->AlmEnsalModelo->eliminarAlmEnsalModelo($_GET['id'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmEnsal&view=frmAlmConEnsal"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmEnsal&view=frmAlmConEnsal"];
		}
	}

	public function listarAlmEnsalMenuControlador()
	{
		return $this->AlmEnsalModelo->listarAlmEnsalMenuModelo();
	}
}
