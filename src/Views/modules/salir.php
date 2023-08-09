<?php 

if (isset($_SESSION['session'])) {
	session_destroy();
	TemplateControlador::redirect("index.php?view=inicio");
}