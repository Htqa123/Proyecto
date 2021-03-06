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

                        $arrData = $this->model->sessionLogin($_SESSION['idUser']);
						$_SESSION['userData'] = $arrData;
                        

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

    public function resetPass()
    {
       // dep($_POST);
       if($_POST){
           if(empty($_POST['txtEmailReset'])){
               $arrResponse = array('status' => false, 'msg' => 'error de datos' );
            }else{
                $token = token();
                $strEmail = strtolower(strClean($_POST['txtEmailReset']));
                $arrData = $this->model->getUserEmail($strEmail);
                if(empty($arrData)){
                    $arrResponse = array('status' => false, 'msg' => 'Usuario no existe');

                }else{
                    $persId = $arrData['persId'];
                    $nombreUsuario = $arrData['persNomb'].' '.$arrData['persApel'];
                    $url_recovery = base_url().'/login/confirmarUser/'.$strEmail.'/'.$token;
                    $requestUpdate = $this->model->setTokenUser($persId,$token);
                    if($requestUpdate){
                        $arrResponse = array('status' => true,
                        'msg' => 'Se envio un email a tu correo para cambiar tu contraseña');
                    }else{
                        $arrResponse = array('status' => false,
                        'msg' => 'No es posible realizar la solicitud intenta más tarde.');
                }
            }
           }
           echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
       }
        die();
    }

     public function confirmUser(string $params)
     {
         if(empty($params)){
             header('Location:'.base_url());
         }else{
                $arrParams = explode(',', $params);
                $strEmail =strClean($arrParams[0]);
                $strToken = strClean($arrParams[1]);
                
                $arrResponse = $this->model->getusuario($strToken, $strToken);
                if(empty($arrResponse))
                {
                    header("Location:".base_url());
                }else{
                        $data['page_tag'] = "cambiar Contraseña";
                        $data['page_title'] ="Cambiar Contraseña";
                        $data['page_name'] = "login";
                        $data['persId'] = $arrResponse['persId'];
                        $data['page_functions_js'] = "functions_login.js";
                        $this->views->getView($this,"cambiar_password", $data);

                     }
                }
                die();
    }
    public function setPassword()
    {
        dep($_POST);
        die();
    } 
}

  ?>