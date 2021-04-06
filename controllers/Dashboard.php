<?php

class Dashboard extends Controllers
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
	
	public function Dashboard()
	{
		
		$data['page_tag'] = "Dashboard-SISO";
		$data['page_title'] ="Bienvenido al sitio";
		$data['page_name'] = "dashboard";
		
		///$data['page_content'] = "Informacion de la pagina";
		$this->views->getView($this,"dashboard", $data);
	}

	public function verUsuarios()
	{
		$arrData =$this->model->selectUsuarios();
		
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
	}
	public function verLog()
	{
		$arrDataLog =$this->model->selectLog();
		///Sdep($arrDataLog);
		echo json_encode($arrDataLog, JSON_UNESCAPED_UNICODE);
        die();
	}

}

  ?>