<!DOCTYPE html>
<html lang="es">

<head>
    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="<?php echo(host); ?>/src/Views/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo(host); ?>/src/Views/assets/css/simple-datatables.css" rel="stylesheet">
    <link href="<?php echo(host); ?>/src/Views/assets/css/index.css" rel="stylesheet" />
    <link href="<?php echo(host); ?>/src/Views/assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo(host); ?>/src/Views/assets/fontawesome/css/all.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Vendor JS Files -->
    <script src="<?php echo(host); ?>/src/Views/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo(host); ?>/src/Views/assets/js/simple-datatables.js"></script>
    <script src="<?php echo(host); ?>/src/Views/assets/js/scripts.js"></script>
    <script src="<?php echo(host); ?>/src/Views/assets/js/alert.js"></script>
    

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- se llama el menu de navegación -->
    <?php include("modules/Components/NavBar.php"); ?>

    <?php include_once("modules/Components/Sidebar.php"); ?>

    <main id="main" class="main">

        <?php include((new \PHP\Controllers\TemplateControlador())->cargarPaginaAlTemplate());?>

    </main><!-- End #main -->

    <?php include_once("modules/Components/Footer.php"); ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


</body>

</html>