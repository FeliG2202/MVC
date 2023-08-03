<?php
$PedAlmMenuControlador = new PedAlmMenuControlador();
$datosPersona = $PedAlmMenuControlador->consultarAlmMenuIdControlador();
?>

<div class="col-lg-7 mx-auto mt-5 mb-5 p-4 rounded shadow-sm">
    <div class="row">
        <div class="col mb-3">
            <h1 class="text-center">Datos Personales</h1>
        </div>
    </div>
    <form method="POST">
        <div class="form row mb-3">
            <div class="form-group col-md-6">
                <label class="mb-2">Número de Identifición</label>
                <input type="text" name="numIdent" value="<?php print $datosPersona[0]['personaDocumento'] ?>"
                    class="form-control" disabled>
            </div>

            <div class="form-group col-md-6">
                <label class="mb-2">Nombre Completo</label>
                <input type="text" name="NombreComp" value="<?php print $datosPersona[0]['personaNombreCompleto'] ?>"
                    class="form-control" disabled>
            </div>
        </div>
        <div class="form row mb-3">
            <div class="form-group col-md-6">
                <label class="mb-2">Numero de Celular</label>
                <input type="text" name="NumeroCelular" value="<?php print $datosPersona[0]['personaNumberCell'] ?>"
                    class="form-control" disabled>
            </div>

            <div class="form-group col-md-6">
                <label class="mb-2">Correo Electronico</label>
                <input type="text" name="Correo" value="<?php print $datosPersona[0]['personaCorreo'] ?>"
                    class="form-control" disabled>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success" href="index.php?folder=frmPed&view=frmPedMenu">Siguiente</a>
        </div>
    </form>
</div>