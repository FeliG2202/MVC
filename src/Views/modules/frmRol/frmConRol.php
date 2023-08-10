<?php

use PHP\Controllers\RolControlador;

$rolControlador = new RolControlador();
$datosRoles = $rolControlador->consultarRolControlador();
?>

<!--//////////////////////////////////////////////////////-->

<h1 class="mt-4 text-center">Consultar Perfiles</h1>
<div class="card mb-4 p-4">
	<div class="card-body">
		<table id="datatablesSimple">
			<thead>
				<tr>
					<th>Nombre del Perfil</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Nombre del Perfil</th>
					<th>Opciones</th>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach ($datosRoles as $keyRol => $valueRol) {
					print '<tr>';
					print '<td>' . $valueRol['rolNombre'] . '</td>';

					print '<td>
					<a href="index.php?folder=frmRol&view=frmEditRol&id=' . $valueRol['idRol'] . '"><i class="fad fa-file-edit fa-lg text-success"></i></a>
					<a href="index.php?folder=frmRol&view=frmDeletRol&id=' . $valueRol['idRol'] . '"><i class="fad fa-file-times fa-lg text-danger"></i></a>
					</td>';
					print "</tr>";
				} ?>
			</tbody>
		</table>
	</div>
	<div class="gap-2 d-md-flex justify-content-md-end mt-2">
		<a href="index.php?folder=frmRol&view=frmRegRol">Registrar Perfil</a>
	</div>
</div>

