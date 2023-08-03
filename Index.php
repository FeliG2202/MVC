<?php 
session_start();
///////CONTROLADORES /////////////////////
require_once("Controllers/TemplateControlador.php");
require_once("Controllers/PersonaControlador.php");
require_once("Controllers/usuarioControlador.php");
require_once("Controllers/rolControlador.php");
require_once("Controllers/rolUsuarioControlador.php");
require_once("Controllers/MenuControlador.php");
require_once("Controllers/RolMenuControlador.php");
require_once("Controllers/OpcionesMenuControlador.php");
require_once("Controllers/NavBarControlador.php");
require_once("Controllers/AlmAcompControlador.php");
require_once("Controllers/AlmBebidaControlador.php");
require_once("Controllers/AlmEnergeControlador.php");
require_once("Controllers/AlmEnsalControlador.php");
require_once("Controllers/AlmProteControlador.php");
require_once("Controllers/AlmSopaControlador.php");
require_once("Controllers/AlmTipoControlador.php");
require_once("Controllers/AlmMenuControlador.php");
require_once("Controllers/AlmDiaControlador.php");
require_once("Controllers/AlmArrozControlador.php");
require_once("Controllers/PedAlmMenuControlador.php");

///////////MODELOS ///////////////////////
require_once("Models/TemplateModelo.php");
require_once("Models/PersonaModelo.php");
require_once("Models/usuarioModelo.php");
require_once("Models/RolModelo.php");
require_once("Models/RolUsuarioModelo.php");
require_once("Models/MenuModelo.php");
require_once("Models/RolMenuModelo.php");
require_once("Models/OpcionesMenuModelo.php");
require_once("Models/AlmAcompModelo.php");
require_once("Models/AlmBebidaModelo.php");
require_once("Models/AlmEnergeModelo.php");
require_once("Models/AlmEnsalModelo.php");
require_once("Models/AlmProteModelo.php");
require_once("Models/AlmSopaModelo.php");
require_once("Models/AlmTipoModelo.php");
require_once("Models/AlmMenuModelo.php");
require_once("Models/AlmDiaModelo.php");
require_once("Models/AlmArrozModelo.php");
require_once("Models/PedAlmMenuModelo.php");

$templateControlador = new templateControlador();
include_once($templateControlador->cargarTemplate());
