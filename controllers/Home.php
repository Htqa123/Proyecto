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
	public function getProductos(){

		$arrData =$this->model->selectProductos();
		for($i = 0; $i < count($arrData); $i++)
			{
				if($arrData[$i]['status'] == 1)
				{
					$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				}else{
					$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
				}

				$arrData[$i]['options'] = '<div class="text-center">

				<button class="btn btn-secondary btn-sm btnViewUsuario" pr="'.$arrData[$i]['prodCodi'].'" title="Ver usuario"><i class="fa fa-address-book-o" aria-hidden="true"></i></button> 
				<button class="btn btn-success btn-sm botonCarrito"><i class="fa fa-shopping-cart"></i>&nbsp; Añadir</button>
				</div>';
		}

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
	}
}

  ?>