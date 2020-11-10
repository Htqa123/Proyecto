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
		$data['page_title'] ="Pagina principal";
		$data['page_name'] = "home";
		$data['page_content'] = "Informacion de la pagina";
		$this->views->getView($this,"home", $data);
	}
	
	// public function insertar()
	// {
	// 	$data = $this->model->setUser("carlos",18);
	// }

	// public function verusuario($id)
	// {
	// 	$data = $this->model->getUser($id);
	// 	print_r($data);
	// }
	// public function actualizar()
	// {
	// 	$data = $this->model->updateUser(1, "emilio",40);
	// 	print_r($data);
	// }

	// public function verusuarios()
	// {
	// 	$data = $this->model->getUsers();
	// 	print_r($data);
	// }
	// public function eliminarusuario($id)
	// {
	// 	$data = $this->model->delUser($id);
	// 	print_r($data);
	// }

}

  ?>