<?php

class PedAlmMenuControlador
{

	private $PedAlmMenuModelo;

	public function __construct()
	{
		$this->PedAlmMenuModelo = new PedAlmMenuModelo();
	}

	public function procesarFormulario()
	{
		if (isset($_POST['btnPedDatosPers'])) {
			$row = $this->PedAlmMenuModelo->validarIdentificacion((int) $_POST['identMenu']);

			if (!$row) {
				return (object) ['request' => false, 'url' => "index.php?folder=frmPed&view=frmPedPersId"];
			}

			return (object) [
				'request' => true,
				'url' => "index.php?folder=frmPed&view=frmPedDatosPers&idPersona={$row['idPersona']}"
			];
		}
	}

	public function consultarAlmMenuIdControlador()
	{
		if (isset($_GET['idPersona'])) {
			return $this->PedAlmMenuModelo->consultarAlmMenuIdModelo($_GET['idPersona']);
		}
	}
}
