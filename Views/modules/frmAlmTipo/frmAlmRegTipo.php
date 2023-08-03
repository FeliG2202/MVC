<?php 
$almTipoControlador = new AlmTipoControlador();
$request = $almTipoControlador->registrarAlmTipoControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<div class="row">
    <div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
        <h2 class="text-center">Registrar Tipo de Menu</h2>
        <hr>

        <?php TemplateControlador::response(
			$request,
			"Tipo Menu Registrado Correctamente",
			"Ocurrio un error, Intentelo de nuevo"
		); ?>

        <form class="form" method="post">
            <div class="row mb-3">
                <label for="" class="form-label">Nombre del Tipo de menú</label>
                <input type="text" name="nombreTipo" class="form-control" required>
            </div>
            <br>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" name="regAlmTipo" class="btn btn-success">Registrar</button>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                <a href="index.php?folder=frmAlmTipo&view=frmAlmConTipo">Consultar Tipo de Menú</a>
            </div>
        </form>
    </div>
</div>