<?php

session_start();
date_default_timezone_set("America/Bogota");

require_once("./vendor/autoload.php");
define("host", "http://localhost:8000");
// define("host", "http://10.100.207.49:8000/");

use PHP\Controllers\TemplateControlador;
include_once("config.php");
include_once((new TemplateControlador())->cargarTemplate());
