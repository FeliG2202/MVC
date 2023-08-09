<?php

class AlmDiaControlador
{

	private $AlmDiaModelo;
	function __construct()
	{
		$this->AlmDiaModelo = new AlmDiaModelo();
	}

	public function listarAlmDiaMenuControlador()
	{
		return $this->AlmDiaModelo->ListarAlmDiaMenuModelo();
	}
}
