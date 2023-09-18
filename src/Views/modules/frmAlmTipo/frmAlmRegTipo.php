<div class="row">
    <div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
        <h2 class="text-center">Registrar Tipo de Menu</h2>
        <hr>

        <div class="gap-2 d-md-flex justify-content-md-end my-2">
            <a href="index.php?folder=frmAlmTipo&view=frmAlmConTipo" class="btn btn-outline-secondary">
                <i class="fas fa-search me-2"></i>Consultar
            </a>
        </div>

        <form class="form" id="form-create-tipo">
            <div class="row mb-3">
                <label for="" class="form-label">Nombre del Tipo de menú</label>
                <input type="text" id="tipos_menu_name" class="form-control" required>
            </div>
            <br>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" id="regAlmTipo" class="btn btn-success">Registrar</button>
            </div>
        </form>
    </div>
</div>

<!-- ================================backend================================== -->
<script type="text/javascript">
    document.getElementById("form-create-tipo").addEventListener("submit", (event) => {
        event.preventDefault();

        axios.post(`${host}/api/tipo/create`, {
            tipos_menu_name: document.getElementById("tipos_menu_name").value,
            regAlmTipo: document.getElementById("regAlmTipo").value
        })
        .then(res => {
            // console.log(res);
            if (res.data.status === "success") {
                window.location.href = `${url}/index.php?folder=frmAlmTipo&view=frmAlmConTipo`;
            }
        })
        .catch(err => {
            console.log(err);
        });
    });
</script>