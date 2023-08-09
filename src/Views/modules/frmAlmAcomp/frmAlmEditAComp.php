<?php

$almAcompControlador = new AlmAcompControlador();
$request = $almAcompControlador->actualizarAlmACompControlador();
$datosAcomp = $almAcompControlador->consultarAlmACompIdControlador();

/* VALIDACION DE REDIRECCIONAMIENTO DE PAGINA */
if ($request != null) {
    if ($request->request) {
        TemplateControlador::redirect($request->url);
    }
}
?>

<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
    <h2 class="text-center">Editar Acompañamiento</h2>
    <hr>
    <?php TemplateControlador::response(
        $request,
        "",
        "Ocurrio un error, Intentelo de nuevo"
    ); ?>
    <form class="form" method="post">
        <label for="" class="form-label">Nombres del Acompañamiento</label>
        <input type="text" name="nombreAcomp" value="<?php print $datosAcomp[0]['nutriAcompNombre'] ?>" class="form-control" required>
        <br>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" name="updAcomp" class="btn btn-success">Actualizar</button>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
            <a href="index.php?folder=frmAlmAcomp&view=frmAlmConAcomp">Consultar Acompañamiento</a>
        </div>
    </form>
</div>