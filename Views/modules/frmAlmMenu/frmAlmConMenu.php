<?php
$almMenuControlador = new AlmMenuControlador();
//$request = $almMenuControlador->eliminarAlmMenuControlador();
$datosAlmMenu = $almMenuControlador->consultarAlmMenuControlador();

if (isset($request)) { ?>
    <script type="text/javascript">
        window.location.href = "<?php echo (!$request[0] ? $request[1] : $request[1]); ?>";
    </script>
<?php } ?>

<!--//////////////////////////////////////////////////////-->

<h1 class="mt-4 text-center">Consultar Menu Almuerzo</h1>
<div class="card mb-4 p-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Tipo Menu</th>
                    <th>Dia</th>
                    <th>Sopa</th>
                    <th>Arroz</th>
                    <th>Proteina</th>
                    <th>Energetico</th>
                    <th>Acompañante</th>
                    <th>Ensalada</th>
                    <th>Bebida</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Tipo Menu</th>
                    <th>Dia</th>
                    <th>Sopa</th>
                    <th>Arroz</th>
                    <th>Proteina</th>
                    <th>Energetico</th>
                    <th>Acompañante</th>
                    <th>Ensalada</th>
                    <th>Bebida</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                foreach ($datosAlmMenu as $key => $value) {
                    print '<tr>';
                    print '<td>' . $value['nutriTipoNombre'] . '</td>';
                    print '<td>' . $value['nutriDiasNombre'] . '</td>';
                    print '<td>' . $value['nutriSopaNombre'] . '</td>';
                    print '<td>' . $value['nutriArrozNombre'] . '</td>';
                    print '<td>' . $value['nutriProteNombre'] . '</td>';
                    print '<td>' . $value['nutriEnergeNombre'] . '</td>';
                    print '<td>' . $value['nutriAcompNombre'] . '</td>';
                    print '<td>' . $value['nutriEnsalNombre'] . '</td>';
                    print '<td>' . $value['nutriBebidaNombre'] . '</td>';

                    print '<td>
                    <a href="index.php?folder=frmAlmMenu&view=frmAlmEditMenu&id=' . $value['idNutriMenu'] . '"><i class="fad fa-file-edit fa-lg text-success"></i></a>
                    <a href="index.php?folder=frmAlmMenu&view=frmAlmDeltMenu&id=' . $value['idNutriMenu'] . '"><i class="fad fa-file-times fa-lg text-danger"></i></a>
                    </td>';
                    print "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="gap-2 d-md-flex justify-content-md-end mt-2">
        <a href="index.php?folder=frmAlmMenu&view=frmAlmRegMenu">Registrar Menu Almuerzo</a>
    </div>
</div>