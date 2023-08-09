<?php

class AlmAcompControlador
{

	private $AlmAcompModelo;

	function __construct()
	{
		$this->AlmAcompModelo = new AlmAcompModelo();
	}

	public function registrarAlmACompControlador()
	{
		if (isset($_POST['regAlmAcomp'])) {
			return !$this->AlmAcompModelo->registrarAlmAcompModelo($_POST['nombreAcomp'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmAcomp&view=frmAlmRegAcomp"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmAcomp&view=frmAlmConAcomp"];
		}
	}

	public function consultarAlmACompControlador()
	{
		if (isset($_POST['btnBuscarAcomp'])) {
			if (isset($_POST['datoBusqueda'])) {
				$rolBuscado = $_POST['datoBusqueda'];
			}
		} else {
			$rolBuscado = '';
		}

		return $this->AlmAcompModelo->consultarAlmAcompModelo($rolBuscado);
	}

	public function consultarAlmACompIdControlador()
	{
		if (isset($_GET['id'])) {
			return $this->AlmAcompModelo->consultarAlmACompIdModelo($_GET['id']);
		}
	}

	public function actualizarAlmACompControlador()
	{
		if (isset($_POST['updAcomp'])) {
			$datosAlmAComp = [
				'nombreAcomp' => $_POST['nombreAcomp'],
				'id' => $_GET['id']
			];
			return !$this->AlmAcompModelo->actualizarAlmAcompModelo($datosAlmAComp)
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmAcomp&view=frmAlmEditAcomp"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmAcomp&view=frmAlmConAcomp"];
		}
	}

	public function eliminarAlmACompControlador()
	{
		if (isset($_GET['id'])) {
			return !$this->AlmAcompModelo->eliminarAlmAcompModelo($_GET['id'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmAcomp&view=frmAlmConAcomp"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmAcomp&view=frmAlmConAcomp"];
		}
	}

	public function listarAlmAcompMenuControlador()
	{
		return $this->AlmAcompModelo->listarAlmAcompMenuModelo();
	}
}
