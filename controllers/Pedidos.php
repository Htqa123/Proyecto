<?php

class Pedidos extends Controllers
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
	public function Pedidos()
	{
		$data['page_tag'] = "Pedidos";
		$data['page_title'] ="Pedidos";
		$data['page_name'] = "Pedidos";
		////$data['page_content'] = "Informacion de la pagina"; sirve para dar informacion.
		$this->views->getView($this,"Pedidos", $data);
	}

	///////////////////funcion para insertar pedidos

	public function setPedidos(){
		dep($_POST);
		if($_POST) {
		if(empty($_POST['txtCant']) || empty($_POST['txtprodNomb']) || empty($_POST['txtprodPrec'])) 
		{
			$arrResponse = array("txtCant" => false, "msg" => "Datos incorrectos");

		}else{
			$strprodNomb = ucwords (strClean($_POST['txtprodNomb']));
            $intprodPrec = intval(strClean($_POST['txtCant']));
            $intCant    = intval(strClean($_POST['txtcant']));
		
			$request_user = $this->model->insertPedidos(
			$intCant,
			$intprodPrec,
			$strprodNomb
			);

			if($request_user > 1)
			{
				
				$arrResponse = array('status' => true, 'msg' => 'Datos Guardados con éxito');

			}else if($request_user == 'exist')
			{
				$arrResponse = array('status' => false, 'msg' => 'El Email o la identificacion ya existe, ingrese otro');

			}else{

				$arrResponse = array("status" => false, "msg" => 'No es posible guardar los datos');
			}

		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

		}
		die();
	}


	public function getPedidos(){

		$arrData =$this->model->selectPedidos();
		for($i = 0; $i < count($arrData); $i++)
			{
				if($arrData[$i]['status'] == 1)
				{
					$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				}else{
					$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
				}

				$arrData[$i]['options'] = '<div class="text-center">
				<button class="btn btn-secondary btn-sm btnViewProductos" pr="'.$arrData[$i]['prodCodi'].'" title="Ver Detalle"><i class="fa fa-plus"></i>&nbsp;Detalle</button> 
				<button class="btn btn-primary btn-sm btnCarrito" pr="'.$arrData[$i]['prodCodi'].'" title="Agregar Producto"><i class="fa fa-shopping-cart"></i>&nbsp;Agregar</button>
				
				</div>';
		}

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
	}

	public function getProducto(int $prodCodi){
	 $prodCodi = intval($prodCodi);
	 if($prodCodi > 0)
	 {
	  $arrData = $this->model->selectPedido($prodCodi);
	  ///dep($arrData);
	  if(empty($arrData))
	  {
		  $arrResponse = array('status' => false, 'msg' => 'Datos incorrectos');
	  }else{
		  $arrResponse = array('status' => true,  'data' => $arrData);
	  }
	  echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
	 }
	 die();
	}


	
	public function getAgregar(int $prodCodi){
		$prodCodi = intval($prodCodi);
		if($prodCodi > 0)
		{
		 $arrData = $this->model->AgregarProducto($prodCodi);
		 ///dep($arrData);
		 if(empty($arrData))
		 {
			 $arrResponse = array('status' => false, 'msg' => 'Datos incorrectos');
		 }else{
			 $arrResponse = array('status' => true,  'data' => $arrData);
		 }
		 echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	   }
	
}

  ?>