<?php

use PHP\Controllers\TemplateControlador;

$request = (new UsuarioControlador())->validateSession();

if ($request != null) {
  if ($request->request) {
    TemplateControlador::redirect($request->url);
  }
}
?>

<!-- FORMULARIO PARA INGRESAR EL LOGIN -->
<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
  <div class="w-100 text-center mb-3">
    <img src="Views/assets/img/LogoBot.png" class="img-fluid w-25 h-25">
  </div>

  <hr>

  <?php if ($request != null) {
    if (!$request->request) {
      echo(TemplateControlador::error($request->message));
    }
  } ?>

  <form method="POST">
    <div class="form-group mb-3">
      <label>Nombre de Usuario</label>
      <input type="text" name="login" placeholder="Ingrese su Usuario" class="form-control" required autocomplete="off">
    </div>

    <div class="form-group mb-3">
      <label>Contraseña</label>
      <input type="password" name="password" placeholder="Ingrese su Contraseña" class="form-control" required>
    </div>

    <button type="submit" name="regLogin" class="btn btn-success">Ingresar</button>
  </form>
</div>