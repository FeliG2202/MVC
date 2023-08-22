<?php

namespace PHP\Controllers;

use PHP\Models\AlmTipoModelo;

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

	public function consultarAlmTipoControlador(){
		return $this->AlmTipoModelo->consultarAlmTipoModelo();
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
			$response = $this->AlmTipoModelo->actualizarAlmTipoModelo([
				'nombreTipo' => $_POST['nombreTipo'],
				'id' => $_GET['id']
			]);

			if (!$response) {
				return (object) [
					'request' => false,
					'url' => "index.php?folder=frmAlmTipo&view=frmAlmConTipo&status=error&message=Ocurrió un error al actualizar el menú",
				];
			}

			return (object) [
				'request' => true,
				'url' => "index.php?folder=frmAlmTipo&view=frmAlmConTipo&status=success&message=Menú actualizado correctamente",
			];
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
