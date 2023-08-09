<?php

use PHP\Controllers\PedAlmMenuControlador;
use PHP\Controllers\TemplateControlador;

$PedAlmMenuControlador = new PedAlmMenuControlador();
$menuPorDias = $PedAlmMenuControlador->consultarMenuDiaControlador();
$request = $PedAlmMenuControlador->registrarMenuDiaControlador();

if ($request != null) {
    if ($request->request) {
        TemplateControlador::redirect($request->url);
    }
}
?>


<div class="col-lg-8 mx-auto mt-5 mb-5 p-4 rounded shadow-sm">
    <div class="row">
        <div class="col mb-3">
            <h1 class="text-center">Menú del Día</h1>
        </div>
    </div>
    <?php TemplateControlador::response(
        $request,
        "",
        "Ocurrio un error, Intentelo de nuevo"
    ); ?>
    <div class="row mt-4">
        <!-- Tarjeta 1 -->
        <?php
        foreach ($menuPorDias['data'] as $key => $value) {
            print '<div class="col-md-6 p-2">';
            echo ('<form method="POST">');
            echo ("<input type='hidden' name='selected-idm' value='{$value['idNutriMenu']}'>");
            echo ("<input type='hidden' name='selected-idp' value='{$_GET['idPersona']}'>");
            print '<div class="card" id="tarjeta1">';
            print '<div class="card-body">';
            print '<h5 class="card-title">' . $value['nutriTipoNombre'] . '</h5>';
            echo ("<hr>");
            echo ("<h6>{$menuPorDias['date']['from']} / {$menuPorDias['date']['to']}</h6>");
            print '<p class="card-text">' . $value['nutriDiasNombre'] . '</p>';
            /* Selecionar componentes del almuerzo */
            print '<div class="checkbox-group">';
            print '<div class="form-check checkbox-container">';
            print  '<input name="selected-list[]" class="form-check-input" type="checkbox" value="' . $value['nutriSopaNombre'] . '" id="flexCheckDefault" onclick="handleCheckboxClick(this)">';
            print   '<label class="form-check-label" for="flexCheckDefault">' . $value['nutriSopaNombre'] . '</label>';
            print '</div>';

            print '<div class="form-check checkbox-container">';
            print '<input name="selected-list[]" class="form-check-input" type="checkbox" value="' . $value['nutriArrozNombre'] . '" id="flexCheckDefault" onclick="handleCheckboxClick(this)">';
            print '<label class="form-check-label" for="flexCheckDefault">' . $value['nutriArrozNombre'] . '</label>';
            print '</div>';

            print '<div class="form-check checkbox-container">';
            print  '<input name="selected-list[]" class="form-check-input" type="checkbox" value="' . $value['nutriProteNombre'] . '" id="flexCheckDefault" onclick="handleCheckboxClick(this)">';
            print   '<label class="form-check-label" for="flexCheckDefault">' . $value['nutriProteNombre'] . '</label>';
            print '</div>';

            print '<div class="form-check checkbox-container">';
            print  '<input name="selected-list[]" class="form-check-input" type="checkbox" value="' . $value['nutriEnergeNombre'] . '" id="flexCheckDefault" onclick="handleCheckboxClick(this)">';
            print   '<label class="form-check-label" for="flexCheckDefault">' . $value['nutriEnergeNombre'] . '</label>';
            print '</div>';

            print '<div class="form-check checkbox-container">';
            print  '<input name="selected-list[]" class="form-check-input" type="checkbox" value="' . $value['nutriAcompNombre'] . '" id="flexCheckDefault" onclick="handleCheckboxClick(this)">';
            print   '<label class="form-check-label" for="flexCheckDefault">' . $value['nutriAcompNombre'] . '</label>';
            print '</div>';

            print '<div class="form-check checkbox-container">';
            print  '<input name="selected-list[]" class="form-check-input" type="checkbox" value="' . $value['nutriEnsalNombre'] . '" id="flexCheckDefault" onclick="handleCheckboxClick(this)">';
            print   '<label class="form-check-label" for="flexCheckDefault">' . $value['nutriEnsalNombre'] . '</label>';
            print '</div>';

            print '<div class="form-check checkbox-container">';
            print  '<input name="selected-list[]" class="form-check-input" type="checkbox" value="' . $value['nutriBebidaNombre'] . '" id="flexCheckDefault" onclick="handleCheckboxClick(this)">';
            print   '<label class="form-check-label" for="flexCheckDefault">' . $value['nutriBebidaNombre'] . '</label>';
            print '</div>';
            print '</div>';
            print '</div>';

            echo ('<div class="mt-4 p-2"><button type="submit" name="btnPedDatosPers" class="btn btn-success w-100">Seleccionar</button></div>');
            print  '</div>';
            echo ("</form>");
            print '</div>';
        }
        ?>
    </div>
</div>