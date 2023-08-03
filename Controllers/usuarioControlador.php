<?php

class UsuarioControlador
{

	private $usuarioModelo;

	public function __construct()
	{
		$this->usuarioModelo = new UsuarioModelo();
	}

	public function registrarUsuarioControlador()
	{
		if (isset($_POST['regUsuario'])) {
			$datosUsuario = [
				'usuario' => $_POST['usuario'],
				'password' => $_POST['password'],
				'idPersona' => $_POST['idPersonas'],
				'estado' => 'Activo',
			];

			return !$this->usuarioModelo->registrarUsuarioModelo($datosUsuario)
				? (object) ['request' => false, 'url' => "index.php?folder=frmUsuarios&view=frmRegUsuario"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmUsuarios&view=frmConUsuarios"];
		}
	}

	public function validateSession()
	{
		if (isset($_POST['regLogin'])) {
			$data = [
				'login' => $_POST['login'],
				'password' => $_POST['password']
			];

			$files = (int) $files['files'] = $files = $this->usuarioModelo->validateSessionModelo($data);

			if ($files > 0) {
				return $this->loginSession($data);
			} else {
				return [false, "Error, su usuario o contraseña son incorrectos."];
			}
		}
	}

	private function loginSession(array $data)
	{
		$files = $this->usuarioModelo->loginSessionModelo($data);

		if ($files != false) {
			$_SESSION['idSession'] = true;
			$_SESSION['idUsuario'] = $files['idUsuario'];

			return [true, header("location:inicio2.php")];
		} else {
			return [false, "Ha ocurrido un error al ingresar."];
		}
	}

	public function consultarUsuarioControlador()
	{
		if (isset($_POST['btnBuscarusuario'])) {
			$datosUsuario =  $_POST['datoBusqueda'];
		} else {
			$datosUsuario = "";
		}

		$usuarioModelo = new UsuarioModelo();
		return $usuarioModelo->consultarUsuarioModelo($datosUsuario);
	}

	public function consultarUsuarioIdControlador()
	{
		if (isset($_GET['id'])) {
			$usuarioModelo = new UsuarioModelo();
			return $usuarioModelo->consultarUsuarioIdModelo($_GET['id']);
		}
	}

	public function actualizarUsuarioControlador()
	{
		if (isset($_POST['updusuario'])) {
			$datosUsuario = array(
				'login' => $_POST['login'],
				'password' => $_POST['password'],
				'estado' => $_POST['estado'],
				'id' => $_GET['id']
			);
			$usuarioModelo = new UsuarioModelo();
			return !$usuarioModelo->actualizarUsuarioModelo($datosUsuario)
				? (object) ['request' => false, 'url' => "index.php?folder=frmUsuarios&view=frmRegUsuarios"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmUsuarios&view=frmConUsuarios"];
		}
	}


	public function eliminarUsuarioControlador()
	{
		if (isset($_GET['id'])) {

			$usuarioModelo = new UsuarioModelo();
			return !$usuarioModelo->eliminarUsuarioModelo($_GET['id'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmUsuarios&view=frmConUsuarios"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmUsuarios&view=frmConUsuarios"];
		}
	}
}
