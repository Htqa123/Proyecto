<?php

class Usuarios extends Controllers
{
	
	public function __construct()
	{
		parent::__construct();

	}
	public function Usuarios()
	{
		$data['page_tag'] = "usuarios";
		$data['page_title'] ="usuarios";
		$data['page_name'] = "usuarios";
		////$data['page_content'] = "Informacion de la pagina"; sirve para dar informacion.
		$this->views->getView($this,"usuarios", $data);
	}
	
	public function setUsuario(){
		dep($_POST);
		die();
	}
	
}

  ?>