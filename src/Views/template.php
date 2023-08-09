<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- STYLES CSS -->
    <link rel="stylesheet" href="<?php echo(host); ?>/src/Views/assets/fontawesome/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?php echo(host); ?>/src/Views/assets/css/styles.css" rel="stylesheet" />

    <title>JUNICAL MEDICAL S.A.S</title>
    <link rel="icon" type="image/x-icon" href="<?php echo(host); ?>/src/Views/assets/img/LogoBot.png" />
</head>

<body class="sb-nav-fixed">
    <!-- se llama el menu de navegación -->
    <?php include("modules/components/NavBar.php"); ?>

    <!-- se llama el contenido de la pagina-->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include_once("modules/components/Sidebar.php"); ?>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <?php include(
                        (new \PHP\Controllers\TemplateControlador())->cargarPaginaAlTemplate()
                    ); ?>
                </div>
            </main>

            <?php include_once("modules/components/Footer.php"); ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo(host); ?>/src/Views/assets/js/datatables-simple-demo.js"></script>
    <script src="<?php echo(host); ?>/src/Views/assets/js/scripts.js"></script>

</body>

</html>