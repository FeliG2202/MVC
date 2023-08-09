<?php

session_start();

require_once("./vendor/autoload.php");

use PHP\Controllers\TemplateControlador;

define("host", "http://localhost:8000");
// define("host", "https://mi-web.com");

include_once(
    (new TemplateControlador())->cargarTemplate()
);