 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

     <div class="d-flex align-items-center justify-content-between">
         <a href="/inicio" class="logo d-flex align-items-center">
             <img src="assets/img/logo.png" alt="">
             <span class="d-none d-lg-block">NiceAdmin</span>
         </a>
         <i class="bi bi-list toggle-sidebar-btn"></i>
     </div><!-- End Logo -->

     <nav class="header-nav ms-auto">
         <ul class="d-flex align-items-center">

             <li class="nav-item dropdown pe-3">

                 <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                     <i class="fas fa-user fa-fw"></i>
                 </a><!-- End Profile Iamge Icon -->

                 <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                     <?php if (isset($_SESSION['session'])) { ?>
                     <li><a class="dropdown-item d-flex align-items-center" href="/salir">Salir<i
                                 class="fad fa-sign-out-alt ms-2"></i></a></li>
                     <?php } else { ?>
                     <li><a class="dropdown-item d-flex align-items-center" href="/login"><i
                                 class="fad fa-sign-in-alt me-2"></i>Iniciar sesión</a></li>
                     <?php } ?>
                 </ul><!-- End Profile Dropdown Items -->
             </li><!-- End Profile Nav -->

         </ul>
     </nav><!-- End Icons Navigation -->

 </header><!-- End Header -->