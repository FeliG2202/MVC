<?php 
$navBar = new NavBarControlador();
$datosmenu = $navBar->menuControlador->consultarMenuControlador();
?>
<nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
	<div class="sb-sidenav-menu">
		<div class="nav">
			<?php foreach ($datosmenu as $keyMenu => $valueMenu) {
				echo '<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#'.strtolower(str_replace(" ", "_", $valueMenu['menuNombre'])).'" aria-expanded="false">
				<div class="sb-nav-link-icon"></div>
				'.$valueMenu['menuNombre'].'
				<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>';

				echo '<div class="collapse" id="'.strtolower(str_replace(" ", "_", $valueMenu['menuNombre'])).'" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
				<nav class="sb-sidenav-menu-nested nav">';
				foreach ($navBar->opcionMenuControlador->consultarOpcionesMenuIdControlador($valueMenu['idMenu']) as $keyOpcion => $valueOpcion) {
					$folder = $valueOpcion['opcionesmenu_folder'];
					$view = $valueOpcion['opcionMenuEnlace'];
					$name = $valueOpcion['opcionMenuNombre'];

					if ($folder === null) {
						echo("<a class='nav-link' href='index.php?view={$view}'>{$name}</a>");
					} else {
						echo("<a class='nav-link' href='index.php?folder={$folder}&view={$view}'>{$name}</a>");
					}
				}
				echo '</nav>
				</div>';
			}?>
		</div>
	</div>
	<div class="sb-sidenav-footer">
		<div class="small">Logged in as:</div>
		Start Bootstrap
	</div>
</nav>


