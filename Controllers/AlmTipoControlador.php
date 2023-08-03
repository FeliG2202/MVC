<?php

class AlmTipoControlador
{

	private $AlmTipoModelo;

	function __construct()
	{
		$this->AlmTipoModelo = new AlmTipoModelo();
	}

	public function registrarAlmTipoControlador()
	{
		if (isset($_POST['regAlmTipo'])) {
			return !$this->AlmTipoModelo->registrarAlmTipoModelo($_POST['nombreTipo'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmTipo&view=frmAlmRegTipo"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmTipo&view=frmAlmConTipo"];
		}
	}

	public function consultarAlmTipoControlador()
	{
		if (isset($_POST['btnBuscarTipo'])) {
			if (isset($_POST['datoBusqueda'])) {
				$rolBuscado = $_POST['datoBusqueda'];
			}
		} else {
			$rolBuscado = '';
		}

		return $this->AlmTipoModelo->consultarAlmTipoModelo($rolBuscado);
	}

	public function consultarAlmTipoIdControlador()
	{
		if (isset($_GET['id'])) {
			return $this->AlmTipoModelo->consultarAlmTipoIdModelo($_GET['id']);
		}
	}

	public function actualizarAlmTipoControlador()
	{
		if (isset($_POST['updTipo'])) {
			$datosAlmTipo = [
				'nombreTipo' => $_POST['nombreTipo'],
				'id' => $_GET['id']
			];
			return !$this->AlmTipoModelo->actualizarAlmTipoModelo($datosAlmTipo)
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmTipo&view=frmAlmEditTipo"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmTipo&view=frmAlmConTipo"];
		}
	}

	public function eliminarAlmTipoControlador()
	{
		if (isset($_GET['id'])) {
			return !$this->AlmTipoModelo->eliminarAlmTipoModelo($_GET['id'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmTipo&view=frmAlmConTipo"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmTipo&view=frmAlmConTipo"];
		}
	}

	public function listarAlmTipoMenuControlador()
	{
		return $this->AlmTipoModelo->listarAlmTipoMenuModelo();
	}
}
