<h1 class="mt-4 text-center">Relacion de Solicitudes</h1>

<div class="card">
    <div class="card-body">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                <i class="fal fa-file-spreadsheet"></i>
            </button>
        </div>

        <hr>

        <table class="table table-hover table-sm w-100" id="table-menu">
            <thead>
                <tr>
                    <th>Nombre completo</th>
                    <th>Pedido</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

</div>

<!-- Formulario de Generador de Reporte -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="exampleModalLabel">Reporte de Relacion de Solicitudes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" id="form-report-dates">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Desde:</label>
                        <input type="date" class="form-control" id="date_start" onchange="validarFechas()" required>
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Hasta:</label>
                        <input type="date" class="form-control" id="date_end" onchange="validarFechas()" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Generar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- //////////////////////////////////////////////////////// -->
<script type="text/javascript">
    (function() {
        axios.get(`${host}/api/frmPed/frmConPedMenu/leer-menu`).then(res => {
            if (!res.data.status) {
                new DataTable('#table-menu', {
                    data: res.data,
                    columns: [
                        { data: 'personaNombreCompleto' },
                        { data: 'menuSeleccionadoDiaPersona' },
                        { data: 'fecha_actual' }
                    ]
                });
            }
        });
    })();

    document.getElementById("form-report-dates").addEventListener("submit", (event) => {
        event.preventDefault();

        const form = new FormData();
        form.append("date_start", document.getElementById("date_start").value);
        form.append("date_end",  document.getElementById("date_end").value);

        axios.post(`${host}/api/reporte/almuerzos`, form, {
            headers: {
                "Content-Type": "multipart/form-data"
            },
            responseType: "blob"
        }).then(res => {
            if (res.status === 204) {
                alert("No hay datos en el sistema");
            } else {
                const link = document.createElement("a");
                link.href = window.URL.createObjectURL(new Blob([res.data]));
                link.setAttribute("download",`reporte-${dayjs().format("YYYY-MM-DD")}.xlsx`);
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        }).catch(err => {
            alert("Ocurrió un error al generar el reporte");
        });
    });
</script>
