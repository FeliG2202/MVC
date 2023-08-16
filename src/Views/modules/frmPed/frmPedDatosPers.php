<?php

use PHP\Controllers\PedAlmMenuControlador;
use PHP\Controllers\TemplateControlador;

$pedAlmMenuControlador = new PedAlmMenuControlador();
$datosPersona = null;

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $datosPersona = $pedAlmMenuControlador->consultarAlmMenuIdControlador();
}

$request = $pedAlmMenuControlador->validateCode();

if ($request != null) {
    if ($request->request) {
        TemplateControlador::redirect($request->url);
    }
}
?>

<div class="col-lg-8 mx-auto mt-5 mb-5 p-4 rounded shadow">
    <div class="row">
        <div class="col mb-3">
            <h1 class="text-center">Datos Personales</h1>
        </div>
    </div>

    <form method="POST">
        <div class="form row mb-3">
            <div class="form-group col-md-6">
                <label class="mb-2">Número de Identifición</label>
                <input type="text" name="numIdent" value="<?php print($datosPersona->personaDocumento); ?>" class="form-control" readonly>
            </div>

            <div class="form-group col-md-6">
                <label class="mb-2">Nombre Completo</label>
                <input type="text" name="NombreComp" value="<?php print($datosPersona->personaNombreCompleto); ?>" class="form-control" readonly>
            </div>
        </div>

        <div class="form row mb-3">
            <div class="form-group col-md-6">
                <label class="mb-2">Numero de Celular</label>
                <input type="text" name="NumeroCelular" value="<?php print($datosPersona->personaNumberCell); ?>" class="form-control" readonly>
            </div>

            <div class="form-group col-md-6">
                <label class="mb-2">Correo Electronico</label>
                <input type="text" name="Correo" value="<?php print($datosPersona->personaCorreo); ?>" class="form-control" readonly>
            </div>
        </div>

        <hr>

        <div class="alert alert-warning">
            <strong>Nota: </strong>El código de verificación se ha enviado
            a la cuenta de correo asociada al usuario
        </div>

        <?php if ($request != null && !$request->request) {
            TemplateControlador::error($request->message);
        } ?>

        <div class="form row mb-3">
            <div class="form-group col-md-6">
                <label class="mb-2">Código de verificación</label>
            </div>

            <div class="col">
                <input type="number" name="cod-1" class="form-control" required maxlength="1">
            </div>

            <div class="col">
                <input type="number" name="cod-2" class="form-control" required maxlength="1">
            </div>

            <div class="col">
                <input type="number" name="cod-3" class="form-control" required maxlength="1">
            </div>

            <div class="col">
                <input type="number" name="cod-4" class="form-control" required maxlength="1">
            </div>

            <div class="col">
                <input type="number" name="cod-5" class="form-control" required maxlength="1">
            </div>

            <div class="col">
                <input type="number" name="cod-6" class="form-control" required>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-warning" name="btnValCode">Verificar</button>
        </div>
    </form>
</div>
