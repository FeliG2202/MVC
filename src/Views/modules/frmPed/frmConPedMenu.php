<?php

use PHP\Controllers\PedAlmMenuControlador;
use PHP\Controllers\TemplateControlador;

$pedAlmMenuControlador = new PedAlmMenuControlador();
$datosAlmMenu = $pedAlmMenuControlador->consultarAlmMenuApartControlador();
?>

<h1 class="mt-4 text-center">Almuerzos</h1>

<div class="card mb-4 p-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Nombre completo</th>
                    <th>Pedido</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosAlmMenu as $keyAlmMenu => $valueAlmMenu) { ?>
                    <tr>
                        <td><?php echo($valueAlmMenu->personaNombreCompleto); ?></td>
                        <td><?php echo( $valueAlmMenu->menuSeleccionadoDiaPersona); ?></td>
                        <td><?php echo($valueAlmMenu->fecha_actual); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
        <button type="button" class="btn btn-success" id="btn-report-excel">Crear Reporte</button>
    </div>
</div>

<script type="text/javascript">
    // Obtener la fecha actual
    var fechaActual = new Date();
    var año = fechaActual.getFullYear();
    var mes = fechaActual.getMonth() + 1;
    var dia = fechaActual.getDate();
    var formatoFechaSimple = (dia < 10 ? '0' : '') + dia + '/' + (mes < 10 ? '0' : '') + mes + '/' + año;
    document.getElementById("btn-report-excel").addEventListener("click", () => {
        axios.get("<?php echo(host); ?>/api/reporte/almuerzos", {
            responseType: "blob",
        }).then(res => {
            const link = document.createElement("a");
            link.href = window.URL.createObjectURL(new Blob([res.data]));
            link.setAttribute("download", "report_"+formatoFechaSimple+".xlsx");
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    });
</script>
