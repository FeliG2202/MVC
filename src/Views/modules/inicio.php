<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 rounded shadow-sm">
    <h2 class="text-center">Solicitud de Alimentos</h2>
    <hr>

    <?php
    $hora_actual = date('H:i');
    $hora_inicio = '00:00';
    $hora_fin = '24:00';

    if ($hora_actual >= $hora_inicio && $hora_actual <= $hora_fin) { ?>
        <form class="form" id="form-consul-menu">
           <div class="row mb-3">
                <label for="empleadoDocumento" class="form-label">Digite número de identificación</label>
                <input type="number" id="empleadoDocumento" class="form-control" required>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" id="btnPedDatosEmp" class="btn btn-success">Siguiente</button>
            </div>
        </form>
    <?php } else { ?>
        <div class="alert alert-warning">
            <strong>Nota: </strong>El horario para solicitar el menú comienza desde las
            <strong>8:00 AM</strong> hasta las <strong>10:00 AM</strong>
        </div>
    <?php }
    ?>
</div>

<!-- ================================backend================================== -->
<script type="text/javascript">
    getInput("form-consul-menu").addEventListener("submit", (event) => {
        event.preventDefault();

        axios.post(`${host}/api/frmPedEmp/empl`, {
            empleadoDocumento: getInput("empleadoDocumento").value,
            regAlmTipo: getInput("btnPedDatosEmp").value
        })
        .then(({ data }) => {
            console.log(data);
            if (data.status) {
                console.log(data.idEmpleado);
            } else {
                window.location.href = `${url}/index.php?folder=frmPedEmp&view=frmPedDatosEmp&idEmpleado=${data.idEmpleado}`;
            }
        })
        .catch(err => {
            console.log(err);
        });
    });
</script>
