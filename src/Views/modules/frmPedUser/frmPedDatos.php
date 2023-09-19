<div class="col-12 col-sm-11 col-md-10 col-lg-10 mx-auto mt-5 mb-5 p-4 rounded shadow">
    <div class="row">
        <div class="col mb-3">
            <h2 class="text-center">Datos Personales</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="mb-3">
                <label class="mb-2">Número de Identifición</label>
                <input type="text" id="users_document" class="form-control" readonly>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="mb-3">
                <label class="mb-2">Nombre Completo</label>
                <input type="text" id="users_fullname" class="form-control" readonly>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="mb-3">
                <label class="mb-2">Numero de Celular</label>
                <input type="text" id="users_cell" class="form-control" readonly>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="mb-3">
                <label class="mb-2">Correo Electronico</label>
                <input type="text" id="users_email" class="form-control" readonly>
            </div>
        </div>
    </div>

    <hr>

    <form method="POST">
        <div class="alert alert-warning">
            <strong>Nota: </strong>El código de verificación se ha enviado
            a la cuenta de correo asociada al usuario
        </div>

        <div class="form row mb-3">
            <div class="form-group col-md-6">
                <label class="mb-2">Código de verificación</label>
            </div>

            <div class="col">
                <input type="text" id="code-1" name="cod-1" maxlength="1" oninput="validarNumero(this, 'code-2', 'code-1')" class="form-control" required autocomplete="off">
            </div>

            <div class="col">
                <input type="text" id="code-2" name="cod-2" maxlength="1" oninput="validarNumero(this, 'code-3', 'code-1')" class="form-control" required autocomplete="off">
            </div>

            <div class="col">
                <input type="text" id="code-3" name="cod-3" maxlength="1" oninput="validarNumero(this, 'code-4', 'code-2')" class="form-control" required autocomplete="off">
            </div>

            <div class="col">
                <input type="text" id="code-4" name="cod-4" maxlength="1" oninput="validarNumero(this, 'code-5', 'code-3')" class="form-control" required autocomplete="off">
            </div>

            <div class="col">
                <input type="text" id="code-5" name="cod-5" maxlength="1" oninput="validarNumero(this, 'code-6', 'code-4')" class="form-control" required autocomplete="off">
            </div>

            <div class="col">
                <input type="text" id="code-6" name="cod-6" maxlength="1" oninput="validarNumero(this, 'code-7', 'code-5')" class="form-control" required autocomplete="off">
            </div>

            <input type="submit" id="submitForm" style="display: none;">
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-warning" name="btnValCode">Verificar</button>
        </div>
    </form>
</div>


<!-- ================================backend=====u============================= -->


<script type="text/javascript">
    const urlParams = new URLSearchParams(window.location.href);
     console.log(urlParams);

    axios.get(`${host}/api/frmPedEmpleado/read/${urlParams.get('idusers')}`)
    .then(response => {
        const datos = response.data;

        getInput('users_document').value = datos.users_document;
        getInput('users_fullname').value = datos.users_fullname;
        getInput('users_cell').value = datos.users_cell;
        getInput('users_email').value = datos.users_email;
    })
    .catch(error => {
        console.error('Error al obtener los datos:', error);
    });

    enviarBtn.addEventListener('click', () => {
        const url = `${host}/index.php?folder=frmPedEmp&view=frmPedMenuEmp&idEmpleado=${urlParams.get('idEmpleado')}`;
        window.location.href = url;
    });
</script>