<?php

class Proveedores extends Controllers
{
	
	public function __construct()
	{
		parent::__construct();

	}
	public function Proveedores()
	{
		$data['page_tag'] = "Proveedores";
		$data['page_title'] ="Proveedores";
		$data['page_name'] = "Proveedores";
		////$data['page_content'] = "Informacion de la pagina"; sirve para dar informacion.
		$this->views->getView($this,"Proveedores", $data);
	}
	
	public function setUsuario(){
		///dep($_POST);
		if($_POST) {
		if(empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) ||
		empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmail']) ||
		empty($_POST['listRolid']) || empty($_POST['listStatus']) ) 
		{
			$arrResponse = array("status" => false, "msg" => 'Datos incorrectos');

		}else{
			$strIdentificacion = strClean($_POST['txtIdentificacion']);
			$strNombre = ucwords (strClean($_POST['txtNombre']));
			$strApellido = ucwords (strClean($_POST['txtApellido']));
			$intTelefono = intval(strClean($_POST['txtTelefono']));
			$strEmail = strtolower (strClean($_POST['txtEmail']));
			$intTipoId = intval(strClean($_POST['listRolid']));
			$intStatus = intval(strClean($_POST['listStatus']));

			$strPassword = empty($_POST['txtPassword']) ? hash("SHA256",passGenerator()) : hash("SHA256", $_POST['txtPassword']);
			$request_user = $this->model->insertUsuario($strIdentificacion,
			$strNombre,
			$strApellido,
			$intTelefono,
			$strEmail,
			$strPassword,
			$intTipoId,
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
	public function getProveedores()
	{
		$arrData =$this->model->selectProveedores();
		for($i = 0; $i < count($arrData); $i++)
                {
                    if($arrData[$i]['status'] == 1)
                    {
                        $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                    }else{
                        $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                    }

                    $arrData[$i]['options'] = '<div class="text-center">
                    <button class="btn btn-secondary btn-sm btnViewUsuario" us="'.$arrData[$i]['provCodi'].'" title="Ver usuario"><i class="fa fa-address-book-o" aria-hidden="true"></i></button> 
                    <button class="btn btn-primary btn-sm btnEditUsuario" us="'.$arrData[$i]['provCodi'].'" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn-sm btnDelUsuario" us="'.$arrData[$i]['provCodi'].'" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
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

/////metodo para extraer provedores	

	public function getSelectProveedores(){
        $htmlOptions = "";
        $arrData = $this->model->selectProveedores();
        if(count($arrData) > 0){
            for($i=0; $i < count($arrData); $i++){
                $htmlOptions .= '<option value="'.$arrData[$i]['provCodi'].'">'.$arrData[$i]['provNomb'].'</option>';
            }
        }
        echo $htmlOptions;
        die();
    }
    
	
}

  ?>