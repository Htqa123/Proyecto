<?php

class Home extends Controllers
{
	
	public function __construct()
	{
		parent::__construct();

	}
	public function home()
	{
		$data['page_id'] = 1;
		$data['page_tag'] = "Home";
		$data['page_title'] ="Bienvenido al Sistema de Información Surti Osorio";
		$data['page_name'] = "home";
		$data['page_content'] = "Este sistema sirve para la gestion y control de las diversas operaciones de las tiendas asociadas, en el siguiente botón podras encontar un manual de usuario para ayudarte a comenzar en el sistema";
		$this->views->getView($this,"home", $data);
	}
}

  ?>