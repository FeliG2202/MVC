<?php 


class TemplateModelo {

	/**
	 * Validate and generate the appropriate link based on the provided $archivo.
	 *
	 * @param string $archivo The value used to determine the link.
	 * @return string The generated link based on the $archivo value.
	 */
	public function validarEnlacesModelo($archivo) {

		// Default link
		$enlace = "Views/modules/inicio.php";

		// Check specific values of $archivo to set the corresponding link
		if ($archivo == 'ok1' || $archivo == 'fa1') {
			$enlace = "Views/modules/Admin/frmRegPersona.php";
		} elseif ($archivo == 'ok2' || $archivo == 'fa2' || $archivo == 'ok3' || $archivo == 'fa3') {
			$enlace = "Views/modules/Admin/frmConPersona.php";
		} elseif ($archivo == 'ok4' || $archivo == 'fa4' || $archivo == 'ok6' || $archivo == 'fa6') {
			$enlace = "Views/modules/Admin/frmConUsuarios.php";
		} elseif ($archivo == 'ok5' || $archivo == 'fa5') {
			$enlace = "Views/modules/Admin/frmRegUsuario.php";
		} elseif ($archivo == 'ok7' || $archivo == 'fa7' || $archivo == 'ok9' || $archivo == 'fa9') {
			$enlace = "Views/modules/Admin/frmRegRol.php";
		} elseif ($archivo == 'ok8' || $archivo == 'fa8' || $archivo == 'ok15' || $archivo == 'fa15') {
			$enlace = "Views/modules/Admin/frmConRol.php";
		} elseif ($archivo == 'ok10' || $archivo == 'fa10' || $archivo == 'ok11' || $archivo == 'fa11' || $archivo == 'ok12' || $archivo == 'fa12') {
			$enlace = "Views/modules/Admin/frmEditRolUsuario.php";
		} elseif ($archivo == 'ok13' || $archivo == 'fa13') {
			$enlace = "Views/modules/Admin/frmRegMenu.php";
		} elseif ($archivo == 'ok14' || $archivo == 'fa14') {
			$enlace = "Views/modules/Admin/frmConMenu.php";
		} elseif ($archivo == 'ok16' || $archivo == 'fa16' || $archivo == 'ok17' || $archivo == 'fa17' || $archivo == 'ok18' || $archivo == 'fa18') {
			$enlace = "Views/modules/Admin/Menu/frmRegOpcionesMenu.php";
		} elseif ($archivo == 'ok19' || $archivo == 'fa19') {
			$enlace = "Views/modules/Admin/frmRegRolMenu.php";
		} elseif ($archivo == 'ok20' || $archivo == 'fa20' || $archivo == 'ok21' || $archivo == 'fa21') {
			$enlace = "Views/modules/Admin/frmRegOpcionesMenu.php";
		} elseif ($archivo == 'ok22' || $archivo == 'fa22') {
			$enlace = "Views/modules/inicio2.php";
		} elseif ($archivo == 'ok23' || $archivo == 'fa23') {
			$enlace = "../Views/modules/User/identificationForm.php";
		} elseif ($archivo) {
			$enlace = "Views/modules/User/".$archivo.".php";
		} elseif ($archivo) {
			$enlace = "Views/modules/Admin/".$archivo.".php";
		}

		return $enlace;
	}
}