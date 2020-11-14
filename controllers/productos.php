<?php

class Productos extends Controllers
{
	
	public function __construct()
	{
		parent::__construct();

	}
	public function Productos()
	{
		$data['page_tag'] = "Productos";
		$data['page_title'] ="Productos";
		$data['page_name'] = "Productos";
		////$data['page_content'] = "Informacion de la pagina"; sirve para dar informacion.
		$this->views->getView($this,"Productos", $data);
	}
	
	public function setProducto(){
		///dep($_POST);
		if($_POST) {
		if(empty($_POST['listProd']) || empty($_POST['txtprodNomb']) ||
		empty($_POST['txtprodPrec']) || empty($_POST['txtprodMode']) || empty($_POST['txtprodMarc']) ||
		empty($_POST['txtprodStock']) || empty($_POST['listNitprov']) || empty($_POST['listStatus']) ) 
		{
			$arrResponse = array("status" => false, "msg" => 'Datos incorrectos');

		}else{
			$intlistProd = intval(strClean($_POST['listProd']));
			$strprodNomb = ucwords (strClean($_POST['txtprodNomb']));
			$intprodPrec = intval (strClean($_POST['txtprodPrec']));
			$strprodMode = ucwords(strClean($_POST['txtprodMode']));
			$strprodMarc = ucwords (strClean($_POST['txtprodMarc']));
            $intprodStock = intval(strClean($_POST['txtprodStock']));
            $intlistNitprov = intval(strClean($_POST['listNitprov']));
			$intStatus = intval(strClean($_POST['listStatus']));

		
			$request_user = $this->model->insertProductos(
            $intlistProd,
			$strprodNomb,
			$intprodPrec,
			$strprodMode,
			$strprodMarc,
			$intprodStock,
			$intlistNitprov,
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
	public function getProductos()
	{
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
                    <button class="btn btn-secondary btn-sm btnViewUsuario" us="'.$arrData[$i]['prodCodi'].'" title="Ver usuario"><i class="fa fa-address-book-o" aria-hidden="true"></i></button> 
                    <button class="btn btn-primary btn-sm btnEditUsuario" us="'.$arrData[$i]['prodCodi'].'" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn-sm btnDelUsuario" us="'.$arrData[$i]['prodCodi'].'" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
                    </div>';
            }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
	}

	public function getUsuario(int $idpersona){
	 $idpersona = intval($idpersona);
	 if($idpersona > 0)
	 {
	  $arrData = $this->model->selectUsuario($idpersona);
	  //dep($arrData);
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