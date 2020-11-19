<?php

class Pedidos extends Controllers
{
	
	public function __construct()
	{
		parent::__construct();

	}
	public function Pedidos()
	{
		$data['page_tag'] = "Pedidos";
		$data['page_title'] ="Pedidos";
		$data['page_name'] = "Pedidos";
		////$data['page_content'] = "Informacion de la pagina"; sirve para dar informacion.
		$this->views->getView($this,"Pedidos", $data);
	}
	
	public function setProducto(){
		dep($_POST);
		if($_POST) {
		if(empty($_POST['listProd']) || empty($_POST['txtprodNomb']) ||
		empty($_POST['txtprodPrec']) || empty($_POST['txtprodMode']) || empty($_POST['txtprodMarc']) ||
		empty($_POST['txtprodStock']) || empty($_POST['listNitProv']) || empty($_POST['listStatus']) ) 
		{
			$arrResponse = array("status" => false, "msg" => 'Datos incorrectos');

		}else{
			$intlistProd = intval(strClean($_POST['listProd']));
			$strprodNomb = ucwords (strClean($_POST['txtprodNomb']));
			$intprodPrec = intval (strClean($_POST['txtprodPrec']));
			$strprodMode = ucwords(strClean($_POST['txtprodMode']));
			$strprodMarc = ucwords (strClean($_POST['txtprodMarc']));
            $intprodStock = intval(strClean($_POST['txtprodStock']));
            $intlistNitProv = intval(strClean($_POST['listNitProv']));
			$intStatus = intval(strClean($_POST['listStatus']));

		
			$request_user = $this->model->insertProductos(
            $intlistProd,
			$strprodNomb,
			$intprodPrec,
			$strprodMode,
			$strprodMarc,
			$intprodStock,
			$intlistNitProv,
			$intStatus);

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
				<button class="btn btn-secondary btn-sm btnViewProductos" pr="'.$arrData[$i]['prodCodi'].'" title="Ver referencia"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button> 
				<button class="btn btn-primary btn-sm btnCarrito" pr="'.$arrData[$i]['prodCodi'].'" title="Agregar"><i class="fa fa-plus-square"></i></button>
				
				</div>';
		}

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
	}

	public function getPedido(int $idproductos){
	 $idproductos = intval($idproductos);
	 if($idproductos > 0)
	 {
	  $arrData = $this->model->selectPedidos($idproductos);
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