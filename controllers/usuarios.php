<?php

class Usuarios extends Controllers
{
	
	public function __construct()
	{
		parent::__construct();
		// session_start();
		// 	session_regenerate_id(true);
		// 	if(empty($_SESSION['login']))
		// 	{
		// 		header('Location: '.base_url().'/login');
		// 		die();
		// 	}
		// 	getPermisos(1);

	}
	public function Usuarios()
	{
		// if(empty($_SESSION['permisosMod']['r'])){
		// 	header("Location:".base_url().'/dashboard');
		// }
		$data['page_tag'] = "usuarios";
		$data['page_title'] ="usuarios";
		$data['page_name'] = "usuarios";
		////$data['page_content'] = "Informacion de la pagina"; sirve para dar informacion.
		$this->views->getView($this,"usuarios", $data);
	}
	
	public function setUsuario(){
		//dep($_POST['txtpersIden']);
		if($_POST) {
		if(empty($_POST['txtpersIden']) || empty($_POST['txtpersNomb']) ||
		empty($_POST['txtpersApel']) || empty($_POST['txtpersTele']) || empty($_POST['txtpersEmail']) ||
		empty($_POST['listRolid']) || empty($_POST['listStatus']) ) 
		{
			$arrResponse = array("status" => false, "msg" => 'Datos incorrectos');

		}else{
			$idUsuario = intval($_POST['idUsuario']);
			$strIdentificacion = strClean($_POST['txtpersIden']);
			$strNombre = ucwords (strClean($_POST['txtpersNomb']));
			$strApellido = ucwords (strClean($_POST['txtpersApel']));
			$intTelefono = intval(strClean($_POST['txtpersTele']));
			$strEmail = strtolower (strClean($_POST['txtpersEmail']));
			$intTipoId = intval(strClean($_POST['listRolid']));
			$intStatus = intval(strClean($_POST['listStatus']));


			if($idUsuario == 0)
			{
				$option = 1;
				$strPassword = empty($_POST['txtpersPass']) ? hash("SHA256",passGenerator()) : hash("SHA256", $_POST['txtpersPass']);
		    	$request_user = $this->model->insertUsuario($strIdentificacion,
						$strNombre,
						$strApellido,
						$intTelefono,
						$strEmail,
						$strPassword,
						$intTipoId,
			            $intStatus);

			}else{
				$option = 2;
				$strPassword = empty($_POST['txtpersPass']) ? hash("SHA256",passGenerator()) : hash("SHA256", $_POST['txtpersPass']);
		    	$request_user = $this->model->insertUsuario($idUsuario,
				        $strIdentificacion,
						$strNombre,
						$strApellido,
						$intTelefono,
						$strEmail,
						$strPassword,
						$intTipoId,
			            $intStatus);
			}


			if($request_user > 0)
			{
				if($option == 1)
				{
					$arrResponse = array('status' => true, 'msg' => 'Datos Guardados con éxito');
				}else{
					$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados con éxito');
				}
				

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
	
	public function getUsuarios()
	{
		$arrData =$this->model->selectUsuarios();
		for($i = 0; $i < count($arrData); $i++)
                {
                    if($arrData[$i]['status'] == 1)
                    {
                        $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                    }else{
                        $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                    }

                    $arrData[$i]['options'] = '<div class="text-center">
                    <button class="btn btn-secondary btn-sm btnViewUsuario" us="'.$arrData[$i]['persId'].'" title="Ver usuario"><i class="fa fa-address-book-o" aria-hidden="true">Ver usuario</i></button> 
                    <button class="btn btn-primary btn-sm btnEditUsuario" us="'.$arrData[$i]['persId'].'" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i>Editar</button>
                    <button class="btn btn-danger btn-sm btnDelUsuario" us="'.$arrData[$i]['persId'].'" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i>Eliminar</button> 
                    </div>';
            }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
	}

	public function getUsuario(int $persId){
	 $idperson = intval($persId);
	 if($idperson > 0)
	 {
	  $arrData = $this->model->selectUsuario($idperson);
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