<?php

session_start();
date_default_timezone_set("America/Bogota");

require_once("./vendor/autoload.php");

use PHP\Controllers\TemplateControlador;

define("host", "http://127.0.0.1:8000");
//define("host", "http://localhost/sistema-medico");

include_once("config.php");

include_once(
    (new TemplateControlador())->cargarTemplate()
);
