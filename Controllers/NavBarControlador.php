<?php 


class NavBarControlador {
	
	public $menuControlador;
	public $opcionMenuControlador;

	function __construct(){
		$this->menuControlador = new MenuControlador();
		$this->opcionMenuControlador = new OpcionesMenuControlador();
	
	}


}