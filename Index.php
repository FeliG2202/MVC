<?php

session_start();
date_default_timezone_set("America/Bogota");

require_once("./vendor/autoload.php");
define("host", "http://127.0.0.1:8000");

use PHP\Controllers\TemplateControlador;
include_once("config.php");
include_once((new TemplateControlador())->cargarTemplate());
