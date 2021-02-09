<?php
class Permisos extends Controllers
{
	
	public function __construct()
	{
		parent::__construct();
		session_start();
        if(empty($_SESSION['login']))
        {
			header('Location: '.base_url().'/login');
	    }

	}
	public function getPermisosRol(int $idrol)
	{
		$rolId = intval($idrol);
		if ($idrol > 0) {
			arrModulos = $this->model->selectModulos();
		}
		
	}
}

?>