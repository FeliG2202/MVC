<?php


class TemplateModelo
{

	public function validarEnlacesModelo($folder, $view)
	{
		$cmp = "Views/modules/";

		if (!file_exists($cmp . $folder . $view)) {
			return $cmp . 'inicio.php';
		} else {
			return $cmp . $folder . $view;
		}

		return $cmp;
	}
}
