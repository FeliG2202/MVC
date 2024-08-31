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

    <script src="<?php echo(host); ?>/src/Views/assets/js/main.js"></script>
    <!-- Vendor CSS Files -->
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo(host); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo(host); ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo(host); ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo(host); ?>/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo(host); ?>/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo(host); ?>/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo(host); ?>/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="<?php echo(host); ?>/src/Views/assets/css/index.css" rel="stylesheet" />
    <link href="<?php echo(host); ?>/src/Views/assets/css/style.css" rel="stylesheet" />

    <!-- Vendor JS Files -->

    <script src="<?php echo(host); ?>/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?php echo(host); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo(host); ?>/vendor/chart.js/chart.umd.js"></script>
    <script src="<?php echo(host); ?>/vendor/echarts/echarts.min.js"></script>
    <script src="<?php echo(host); ?>/vendor/quill/quill.js"></script>
    <script src="<?php echo(host); ?>/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?php echo(host); ?>/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?php echo(host); ?>/vendor/php-email-form/validate.js"></script>
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