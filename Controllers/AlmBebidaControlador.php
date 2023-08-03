<?php

class AlmBebidaControlador
{

	private $AlmBebidaModelo;

	function __construct()
	{
		$this->AlmBebidaModelo = new AlmBebidaModelo();
	}

	public function registrarAlmBebidaControlador()
	{
		if (isset($_POST['regAlmBebida'])) {
			return !$this->AlmBebidaModelo->registrarAlmBebidaModelo($_POST['nombreBebida'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmBebida&view=frmAlmRegBebida"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmBebida&view=frmAlmConBebida"];
		}
	}

	public function consultarAlmBebidaControlador()
	{
		if (isset($_POST['btnBuscarBebida'])) {
			if (isset($_POST['datoBusqueda'])) {
				$rolBuscado = $_POST['datoBusqueda'];
			}
		} else {
			$rolBuscado = '';
		}

		return $this->AlmBebidaModelo->consultarAlmBebidaModelo($rolBuscado);
	}

	public function consultarAlmBebidaIdControlador()
	{
		if (isset($_GET['id'])) {
			return $this->AlmBebidaModelo->consultarAlmBebidaIdModelo($_GET['id']);
		}
	}

	public function actualizarAlmBebidaControlador()
	{
		if (isset($_POST['updBebida'])) {
			$datosAlmBebida = [
				'nombreBebida' => $_POST['nombreBebida'],
				'id' => $_GET['id']
			];
			return !$this->AlmBebidaModelo->actualizarAlmBebidaModelo($datosAlmBebida)
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmBebida&view=frmAlmEditBebida"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmBebida&view=frmAlmConBebida"];
		}
	}

	public function eliminarAlmBebidaControlador()
	{
		if (isset($_GET['id'])) {
			return !$this->AlmBebidaModelo->eliminarAlmBebidaModelo($_GET['id'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmBebida&view=frmAlmConBebida"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmBebida&view=frmAlmConBebida"];
		}
	}

	public function listarAlmBebidaMenuControlador()
	{
		return $this->AlmBebidaModelo->listarAlmBebidaMenuModelo();
	}
}
