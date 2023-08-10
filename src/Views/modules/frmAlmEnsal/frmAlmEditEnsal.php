<?php

use PHP\Controllers\AlmEnsalControlador;
use PHP\Controllers\TemplateControlador;

$almEnsalControlador = new AlmEnsalControlador();
$request = $almEnsalControlador->actualizarAlmEnsalControlador();
$datosEnsal = $almEnsalControlador->consultarAlmEnsalIdControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<div class="row">
	<div class="col-lg-6 mx-auto mt-5 mb-5 p-4 shadow-sm rounded">
		<h2 class="text-center">Editar Ensalada</h2>
		<hr>
		<?php TemplateControlador::response(
			$request,
			"",
			"Ocurrio un error, Intentelo de nuevo"
		); ?>
		<form class="form" method="post">
			<label for="" class="form-label">Nombres de la Ensalada</label>
			<input type="text" name="nombreEnsal" value="<?php print $datosEnsal[0]['nutriEnsalNombre'] ?>" class="form-control" required>
			<br>

			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				<button type="submit" name="updEnsal" class="btn btn-success">Actualizar</button>
			</div>
			<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
				<a href="index.php?folder=frmAlmEnsal&view=frmAlmConEnsal">Consultar Ensalada</a>
			</div>
		</form>
	</div>
</div>