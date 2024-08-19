<?php

use PHP\Controllers\NavBarControlador;

$navBar = new NavBarControlador();
$menus = $navBar->menuControlador->consultarMenuControlador();


$addMenu = function ($menu_nombre) {
	$replace = strtolower(str_replace(" ", "_", $menu_nombre));
	return '<a class="nav-link collapsed" data-bs-target="#' . $replace . '" data-bs-toggle="collapse" href="#"><span>' . $menu_nombre . '</span><i
				class="bi bi-chevron-down ms-auto"></i></a>';
};

$addOption = function ($option) {
	$addLink = function () use ($option) {
		$folder = $option->opcionesmenu_folder;
		$view = $option->opcionMenuEnlace;
		$name = $option->opcionMenuNombre;

		if ($folder === null) {
			return "<a href='/{$view}'><span>{$name}</span></a>";
		} else {
			return "<a href='/{$folder}/{$view}'><i class='bi bi-circle'></i><span>{$name}</span></a>";
		}
	};

	if (isset($_SESSION['session'])) {
		if ($option->opcionMenuEstado === "online" || $option->opcionMenuEstado === "online/offline") {
			if (in_array($_SESSION['rol'], explode(",", $option->idRol))) {
				return $addLink();
			}
		}
	} elseif (!isset($_SESSION['session'])) {
		if ($option->opcionMenuEstado === "offline" || $option->opcionMenuEstado === "online/offline") {
			return $addLink();
		}
	}
};
?>

<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

	<li class="nav-item">
		<a class="nav-link " href="/inicio">
			<span>Inicio</span>
		</a>
	</li><!-- End Dashboard Nav -->

	<?php foreach ($menus as $keyMenu => $menu) {
				if (isset($_SESSION['session'])) {
					if ($menu->menuEstado === "online" || $menu->menuEstado === "online/offline") {
						if (in_array($_SESSION['rol'], explode(",", $menu->idRol))) {
							echo($addMenu($menu->menuNombre));
						}
					}
				} elseif (!isset($_SESSION['session'])) {
					if ($menu->menuEstado === "offline" || $menu->menuEstado === "online/offline") {
						echo($addMenu($menu->menuNombre));
					}
				}

                $str = strtolower(str_replace(" ", "_", $menu->menuNombre));
				
				echo('<ul id="' . $str . '" class="nav-content collapse " data-bs-parent="#sidebar-nav"><li>');
				

				$options = $navBar->opcionMenuControlador->consultarOpcionesMenuIdControlador($menu->idMenu);
				foreach ($options as $keyOpcion => $option) {
					echo($addOption($option));
				}
				echo'</li></ul>';
			} ?>

</ul>

</aside><!-- End Sidebar-->




