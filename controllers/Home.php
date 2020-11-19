<?php

class Home extends Controllers
{
	
	public function __construct()
	{
		parent::__construct();

	}
	public function home()
	{
		
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
				<button class="btn btn-secondary btn-sm btnCarrito" pr="'.$arrData[$i]['prodCodi'].'" title="Ver productos"><i class="fa fa-shopping-cart"></i>&nbsp; Añadir</button> 
				<button class="btn btn-primary btn-sm btnEditProductos" pr="'.$arrData[$i]['prodCodi'].'" title="Editar"><i class="fa fa-shopping-cart aria-hidden="true"></i></button>
				<button class="btn btn-danger btn-sm btnDelUsuario" pr="'.$arrData[$i]['prodCodi'].'" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
				</div>';
		}

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
	}
}

  ?>