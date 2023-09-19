<div class="col-12 col-sm-12 col-md-11 col-lg-10 mx-auto my-5 p-4 bg-gris rounded shadow-sm">
	<h2 class="text-center">Registrar Menu</h2>
	<hr>

	<div class="gap-2 d-md-flex justify-content-md-end my-2">
		<a href="index.php?folder=frmAlmMenu&view=frmAlmConMenu" class="btn btn-outline-secondary">
			<i class="fas fa-search me-2"></i>Consultar
		</a>
	</div>

	<form class="form" id="form-create-menu">
		<div class="row">
			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="idtipos_menu">Tipo Menu</label>
					<select id="idtipos_menu" name="idtipos_menu" class="form-select" required autofocus>
						<option value="null" selected>Seleccione</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="iddias">Día</label>
					<select id="iddias" name="iddias" class="form-select" required>
						<option value="null" selected>Seleccione</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="idsemana">Semana</label>
					<select id="idsemana" name="idsemana" class="form-select" required>
						<option value="null" selected>Seleccione</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="idproduct7">Sopa</label>
					<select id="idproduct7" name="idproduct7" class="form-select">
						<option value="null" selected>Seleccione</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="idproduct2">Arroz</label>
					<select id="idproduct2" name="idproduct2" class="form-select">
						<option value="null" selected>Seleccione</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="idproduct6">Proteina</label>
					<select id="idproduct6" name="idproduct6" class="form-select">
						<option value="null" selected>Seleccione</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="idproduct4">Energetico</label>
					<select id="idproduct4" name="idproduct4" class="form-select">
						<option value="null" selected>Seleccione</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="idproduct1">Acompañamiento</label>
					<select id="idproduct1" name="idproduct1" class="form-select">
						<option value="null" selected>Seleccione</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="idproduct5">Ensalada</label>
					<select id="idproduct5" name="idproduct5" class="form-select">
						<option value="null" selected>Seleccione</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="idproduct3">Bebida</label>
					<select id="idproduct3" name="idproduct3" class="form-select">
						<option value="null" selected>Seleccione</option>
					</select>
				</div>
			</div>
		</div>

		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<button type="submit" id="btnSaveAlmRegMenu" class="btn btn-success btn-block">Guardar</button>
		</div>
	</form>
</div>

<!-- ================================backend================================== -->
<script type="text/javascript">
	uploadSelect([
		objectSelect('/api/tipo/read', 'idtipos_menu', 'idtipos_menu', ['tipos_menu_name']),
		objectSelect('/api/dias/read', 'iddias', 'iddias', ['dias_name']),
		objectSelect('/api/semana/read', 'idsemana', 'idsemana', ['semana_name']),
		objectSelect('/api/product/7/read', 'idproduct7', 'idproduct7', ['product7_name']),
		objectSelect('/api/product/2/read', 'idproduct2', 'idproduct2', ['product2_name']),
		objectSelect('/api/product/6/read', 'idproduct6', 'idproduct6', ['product6_name']),
		objectSelect('/api/product/4/read', 'idproduct4', 'idproduct4', ['product4_name']),
		objectSelect('/api/product/1/read', 'idproduct1', 'idproduct1', ['product1_name']),
		objectSelect('/api/product/5/read', 'idproduct5', 'idproduct5', ['product5_name']),
		objectSelect('/api/product/3/read', 'idproduct3', 'idproduct3', ['product3_name'])
		]);

	// REGISTRAR FORMULARIO
	addEvent(['form-create-menu'], 'submit', (event) => {
		event.preventDefault();

		axios.post(`${host}/api/nutrimenu/create`, {
			idtipos_menu: getInput("idtipos_menu").value,
			iddias: getInput("iddias").value,
			idsemana: getInput("idsemana").value,
			idproduct7: getInput("idproduct7").value,
			idproduct2: getInput("idproduct2").value,
			idproduct6: getInput("idproduct6").value,
			idproduct4: getInput("idproduct4").value,
			idproduct1: getInput("idproduct1").value,
			idproduct5: getInput("idproduct5").value,
			idproduct3: getInput("idproduct3").value,
			btnSaveAlmRegMenu: getInput("btnSaveAlmRegMenu").value
		})
		.then(res => {
			if (res.data.status === "success") {
				window.location.href = `${url}/index.php?folder=frmAlmMenu&view=frmAlmConMenu`;
			}
		})
		.catch(err => {
			console.log(err);
		});
	});
</script>