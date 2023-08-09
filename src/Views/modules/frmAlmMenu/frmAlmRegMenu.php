<?php 

$almMenuControlador = new AlmMenuControlador();
$request = $almMenuControlador->registrarAlmMenuControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
} 

////////////// LLAMAR CONTROLADOR TIPO MENU //////////////
$listarAlmTipoMenuControlador = new AlmTipoControlador();
$listarAlmTipoMenu = $listarAlmTipoMenuControlador->listarAlmTipoMenuControlador();
////////////// LLAMAR CONTROLADOR DIA MENU //////////////
$listarAlmDiaMenuControlador = new AlmDiaControlador();
$listarAlmDiaMenu = $listarAlmDiaMenuControlador->listarAlmDiaMenuControlador();
////////////// LLAMAR CONTROLADOR SOPA MENU //////////////
$listarAlmSopaMenuControlador = new AlmSopaControlador();
$listarAlmSopaMenu = $listarAlmSopaMenuControlador->listarAlmSopaMenuControlador();
////////////// LLAMAR CONTROLADOR ARROZ MENU //////////////
$listarAlmArrozMenuControlador = new AlmArrozControlador();
$listarAlmArrozMenu = $listarAlmArrozMenuControlador->listarAlmArrozMenuControlador();
////////////// LLAMAR CONTROLADOR PROTEINA //////////////
$listarAlmProteMenuControlador = new AlmProteControlador();
$listarAlmProteMenu = $listarAlmProteMenuControlador->listarAlmProteMenuControlador();
////////////// LLAMAR CONTROLADOR ENERGETICO //////////////
$listarAlmEnergeMenuControlador = new AlmEnergeControlador();
$listarAlmEnergeMenu = $listarAlmEnergeMenuControlador->listarAlmEnergeMenuControlador();
////////////// LLAMAR CONTROLADOR ACOMPAÑAMIENTO //////////////
$listarAlmAcompMenuControlador = new AlmAcompControlador();
$listarAlmAcompMenu = $listarAlmAcompMenuControlador->listarAlmAcompMenuControlador();
////////////// LLAMAR CONTROLADOR ENSALADA //////////////
$listarAlmEnsalMenuControlador = new AlmEnsalControlador();
$listarAlmEnsalMenu = $listarAlmEnsalMenuControlador->listarAlmEnsalMenuControlador();
////////////// LLAMAR CONTROLADOR BEBIDA //////////////
$listarAlmBebidaMenuControlador = new AlmBebidaControlador();
$listarAlmBebidaMenu = $listarAlmBebidaMenuControlador->listarAlmBebidaMenuControlador();
?>

<div class="col-lg-7 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
	<h2 class="text-center">Registrar Menu</h2>
	<hr>
	<?php TemplateControlador::response(
			$request,
			"Menu Almuerzo Registrado Correctamente",
			"Ocurrio un error, Intentelo de nuevo"
		); ?>
	<form class="form" method="post">
		
		<div class="form row mb-3">
			<div class="form-group col-md-6">
				<!--////////////// PRIMERA PREGUNTA //////////////-->
				<label for="" class="form-label">Tipo del Menu</label>
				<select name="idNutriTipo" class="form-control" required>
					<option value="">Seleccione Tipo del Menu</option>
					<?php 
					foreach ($listarAlmTipoMenu as $key => $value) {
						print '<option value="'.$value['idNutriTipo'].'">'.$value['nutriTipoNombre'].'</option>';
					}
					?>
				</select>
			</div> 
			<!--////////////// SEGUNDA PREGUNTA //////////////-->
			<div class="form-group col-md-6">
				<label for="" class="form-label">Día</label>
				<select name="idNutriDias" class="form-control" required>
					<option value="">Seleccione el día</option>
					<?php 
					foreach ($listarAlmDiaMenu as $key => $value) {
						print '<option value="'.$value['idNutriDias'].'">'.$value['nutriDiasNombre'].'</option>';
					}
					?>
				</select>
			</div> 
		</div>
		<div class="form row mb-3">
			<!--////////////// TERCERA PREGUNTA //////////////-->
			<div class="form-group col-md-6">
				<label for="" class="form-label">Sopa</label>
				<select name="idNutriSopa" class="form-select" required>
					<option value="">seleccione la sopa</option>
					<?php 
					foreach ($listarAlmSopaMenu as $key => $value) {
						print '<option value="'.$value['idNutriSopa'].'">'.$value['nutriSopaNombre'].'</option>';
					}
					?>
				</select>
			</div> 

			<div class="form-group col-md-6">
				<!--////////////// CUARTA PREGUNTA //////////////-->
				<label for="" class="form-label">Arroz</label>
				<select name="idNutriArroz" class="form-select" required>
					<option value="">seleccione Tipo de arroz</option>
					<?php 
					foreach ($listarAlmArrozMenu as $key => $value) {
						print '<option value="'.$value['idNutriArroz'].'">'.$value['nutriArrozNombre'].'</option>';
					}
					?>
				</select>
			</div> 
		</div>
		<div class="form row mb-3">
			<div class="form-group col-md-6">
				<!--////////////// QUINTA PREGUNTA //////////////-->
				<label for="" class="form-label">Proteina</label>
				<select name="idNutriProte" class="form-select" required>
					<option value="">seleccione la proteina</option>
					<?php 
					foreach ($listarAlmProteMenu as $key => $value) {
						print '<option value="'.$value['idNutriProte'].'">'.$value['nutriProteNombre'].'</option>';
					}
					?>
				</select>
			</div> 

			<div class="form-group col-md-6">
				<!--////////////// SEXTA PREGUNTA //////////////-->
				<label for="" class="form-label">Energetico</label>
				<select name="idNutriEnerge" class="form-select" required>
					<option value="">seleccione el energetico</option>
					<?php 
					foreach ($listarAlmEnergeMenu as $key => $value) {
						print '<option value="'.$value['idNutriEnerge'].'">'.$value['nutriEnergeNombre'].'</option>';
					}
					?>
				</select>
			</div> 
		</div>
		<div class="form row mb-3">
			<div class="form-group col-md-6">
				<!--////////////// SEPTIMA PREGUNTA //////////////-->
				<label for="" class="form-label">Acompañamiento</label>
				<select name="idNutriAcomp" class="form-select" required>
					<option value="">seleccione el acompañamiento</option>
					<?php 
					foreach ($listarAlmAcompMenu as $key => $value) {
						print '<option value="'.$value['idNutriAcomp'].'">'.$value['nutriAcompNombre'].'</option>';
					}
					?>
				</select>
			</div> 

			<div class="form-group col-md-6">
				<!--////////////// OCTAVA PREGUNTA //////////////-->
				<label for="" class="form-label">Ensalada</label>
				<select name="idNutriEnsal" class="form-select" required>
					<option value="">seleccione la ensalada</option>
					<?php 
					foreach ($listarAlmEnsalMenu as $key => $value) {
						print '<option value="'.$value['idNutriEnsal'].'">'.$value['nutriEnsalNombre'].'</option>';
					}
					?>
				</select>
			</div> 
		</div>
		<div class="form row mb-3">
			<!--////////////// NOVENA PREGUNTA //////////////-->
			<div class="form-group col-md-6">
				<label for="" class="form-label">Bebida</label>
				<select name="idNutriBebida" class="form-select" required>
					<option value="">seleccione la bebida</option>
					<?php 
					foreach ($listarAlmBebidaMenu as $key => $value) {
						print '<option value="'.$value['idNutriBebida'].'">'.$value['nutriBebidaNombre'].'</option>';
					}
					?>
				</select>
			</div> 
		</div>

		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<button type="submit" name="btnSaveAlmRegMenu" class="btn btn-success btn-block">Guardar</button>
		</div>
		
	</form>

</div>
