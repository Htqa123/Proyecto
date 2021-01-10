<?php

class Login extends Controllers
{
	
	public function __construct()
	{
        session_start();
		parent::__construct();

	}
	public function login()
    {
		
		$data['page_tag'] = "Login";
		$data['page_title'] ="SISO";
		$data['page_name'] = "login";
		$data['page_functions_js'] = "functions_login.js";
		$this->views->getView($this,"login", $data);
    }
    
    public function loginUser(){
        //dep($_POST);
        if($_POST){
            if( empty($_POST['usuEmail']) || empty($_POST['usuCont'])){
               $arrResponse = array('status' => false, 'msg' => 'Error de datos');
            }else{
                $strUsuario = strtolower(strClean($_POST['usuEmail']));
                $srtPassword = hash("SHA256", $_POST['usuCont']);
                $requestUser = $this->model->loginUser($strUsuario, $srtPassword);
                //dep($requestUser);
                if(empty($requestUser)){
                    $arrResponse = array('status' => false, 'msg' => 'El usuario o la contraseña es incorrecto');
                }else{
                    $arrData = $requestUser;
                    if($arrData['status'] == 1){
                        $_SESSION['idUser'] = $arrData['persId'];
                        $_SESSION['login'] = true;
                        $arrResponse = array('status' => true, 'msg' => 'ok' );
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Usuario inactivo');
                    }
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
	
	// public function getProductos(){

	// 	$arrData =$this->model->selectProductos();
	// 	for($i = 0; $i < count($arrData); $i++)
	// 		{
	// 			if($arrData[$i]['status'] == 1)
	// 			{
	// 				$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
	// 			}else{
	// 				$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
	// 			}

	// 			$arrData[$i]['options'] = '<div class="text-center">
	// 			<button class="btn btn-secondary btn-sm btnCarrito" pr="'.$arrData[$i]['prodCodi'].'" title="Ver productos"><i class="fa fa-shopping-cart"></i>&nbsp; Añadir</button> 
	// 			<button class="btn btn-primary btn-sm btnEditProductos" pr="'.$arrData[$i]['prodCodi'].'" title="Editar"><i class="fa fa-shopping-cart aria-hidden="true"></i></button>
	// 			<button class="btn btn-danger btn-sm btnDelUsuario" pr="'.$arrData[$i]['prodCodi'].'" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
	// 			</div>';
	// 	}

    //     echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    //     die();
	// }
}

  ?>