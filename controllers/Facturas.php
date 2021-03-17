<?php

class Facturas extends Controllers
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
	public function Facturas()
	{
		$data['page_tag'] = "Facturas";
		$data['page_title'] ="Facturas";
		$data['page_name'] = "Facturas";
		////$data['page_content'] = "Informacion de la pagina"; sirve para dar informacion.
		$this->views->getView($this,"Facturas", $data);
	}

	///////////////////funcion para insertar productos

	public function setFacturas(){
		dep($_POST);
		if($_POST) {
		if(empty($_POST['listEmpresa']) || 
		empty($_POST['txtprovNumeFact']) ||
		empty($_POST['txtprovValoFact']) ||
		empty($_POST['listStatus']) 
		) 
		{
			$arrResponse = array("txtprovNumeFact" => false, "msg" => 'Datos incorrectos');

		}else{

			$intlistEmpresa = intval(strClean($_POST['listEmpresa']));
			$intprovNumeFact = intval (strClean($_POST['txtprovNumeFact']));
            $intprovValoFact = intval(strClean($_POST['txtprovValoFact']));
			$intStatus = intval(strClean($_POST['listStatus']));
		
			$request_user = $this->model->insertFacturas(
			$intlistEmpresa,
			$intprovNumeFact,
			$intprovValoFact,
			$intStatus
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

////metodo para cargar tabla de las facturas
	public function getFacturas(){

		$arrData =$this->model->selectFacturas();
		for($i = 0; $i < count($arrData); $i++)
			{
				if($arrData[$i]['status'] == 1)
				{
					$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				}else{
					$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
				}

				$arrData[$i]['options'] = '<div class="text-center">
				<button class="btn btn-secondary btn-sm btnViewProductos" pr="'.$arrData[$i]['provFactId'].'" title="Ver Detalle"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Detalle</button> 
				<button class="btn btn-primary" pr="'.$arrData[$i]['provFactId'].'" title="Editar"><i class="fa fa-pencil"></i></button>
				</div>';
		}


        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
	}

	public function getFactura(int $provFactId){
	 $provFactId = intval($provFactId);
	 if($provFactId > 0)
	 {
	  $arrData = $this->model->selectFactura($provFactId);
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