<?php

class Login extends Controllers
{
	
	public function __construct()
	{
        session_start();
        if(isset($_SESSION['login'])){
			header('Location: '.base_url().'/dashboard');
		}
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
	
	
}

  ?>