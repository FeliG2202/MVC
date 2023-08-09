<?php 
$almBebidaControlador = new AlmBebidaControlador();
$request = $almBebidaControlador->eliminarAlmBebidaControlador();
$datosAlmBebida = $almBebidaControlador->consultarAlmBebidaControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<!--//////////////////////////////////////////////////////-->

<h1 class="mt-4 text-center">Consultar Bebidas</h1>
<div class="card mb-4 p-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Nombre de la Bebida</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nombre de la Bebida</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
            <tbody>
			<?php 
					foreach ($datosAlmBebida as $keyAlmBebida => $valueAlmBebida) {
						print '<tr>';
						print '<td>'.$valueAlmBebida['nutriBebidaNombre'].'</td>';

						print '<td>
						<a href="index.php?folder=frmAlmBebida&view=frmAlmEditBebida&id='.$valueAlmBebida['idNutriBebida'].'"><i class="fad fa-file-edit fa-lg text-success"></i></a>
						<a href="index.php?folder=frmAlmTipo&view=frmAlmDeltBebida&id='.$valueAlmBebida['idNutriBebida'].'"><i class="fad fa-file-times fa-lg text-danger"></i></a>
						</td>';
						print "</tr>";
					}
					?>
            </tbody>
        </table>
    </div>
    <div class="gap-2 d-md-flex justify-content-md-end mt-2">
        <a href="index.php?folder=frmAlmBebida&view=frmAlmRegBebida">Registrar Bebida</a>
    </div>
</div>








        