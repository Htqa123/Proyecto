<?php

class Roles extends Controllers
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
public function Roles()
{
    
    $data['page_tag'] = "Roles";
    $data['page_title'] ="Roles <small></small>";
    $data['page_name'] = "Roles";
    ///$data['page_content'] = "Informacion de la pagina";
    $this->views->getView($this,"roles", $data);
}
    ////consultar data y muestra la tabla

    public function getRoles()
        {
                $arrData = $this->model->selectRoles();
                 //dep($arrData);
                for($i = 0; $i < count($arrData); $i++)
                {
                    if($arrData[$i]['status'] == 1)
                    {
                        $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                    }else{
                        $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                    }

                    $arrData[$i]['options'] = '<div class="text-center">
                    <button class="btn btn-secondary btn-sm btnPermisoRol" rl="'.$arrData[$i]['roleId'].'" title="Permisos"><i class="fa fa-user-secret" aria-hidden="true"></i></button> 
                    <button class="btn btn-primary btn-sm btnEditRol" rl="'.$arrData[$i]['roleId'].'" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn-sm btnDelRol" rl="'.$arrData[$i]['roleId'].'" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
                    </div>';
            }

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
    }

///fin de la culsulta, y la logíca de la tabla

    public function getSelectRoles(){
        $htmlOptions = "";
        $arrData = $this->model->selectRoles();
        if(count($arrData) > 0){
            for($i=0; $i < count($arrData); $i++){
                $htmlOptions .= '<option value="'.$arrData[$i]['roleId'].'">'.$arrData[$i]['roleNomb'].'</option>';
            }
        }
        echo $htmlOptions;
        die();
    }
    

    public function getRol( int $roleId)
    {
        $roleCodi = intval(strClean($roleId));

        if($roleCodi > 0)
            {

$arrData = $this->model->selectRol($roleCodi);
if(empty($arrData))
{ 

$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');

}else{

$arrResponse = array('status' => true, 'data' => $arrData);

}

echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    }
            die();
    }

public function setRol()
{
        
                $intIdrol = intval($_POST['roleId']);
                $roleNomb = strClean($_POST['txtroleNomb']);
                $roleDesc = strClean($_POST['txtroleDesc']);
                $intStatus = intval($_POST['listStatus']);
                
                if($intIdrol == 0)
                {
                    $request_rol = $this->model->insertRol($roleNomb, $roleDesc, $intStatus);
                    $option = 1;

                }else{
                    $request_rol = $this->model->updateRol($intIdrol, $roleNomb, $roleDesc, $intStatus);
                    $option = 2;

                }

                if($request_rol > 0)
                {
                    if($option == 1)
                    {

                        $arrResponse = array('status' => true, 'msg' => 'Datos guardados con exito.');
                    }else{

                        $arrResponse = array('status' => true, 'msg' => 'Datos Actualizado con exito.');
                    }

                    }else if ($request_rol == 'exist') 
                    {

                    $arrResponse = array('status' => false, 'msg' => 'El rol ya existe.');

                }else{

                    $arrResponse = array("status" => false, "msg" => 'No se pueden guardar los datos.');

                }

            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                die();
}

public function delRol()
{
    if($_POST){

        $roleCodi = intval($_POST['roleId']);
        $requestDelete =  $this->model->deleteRol($roleCodi);
        if($requestDelete == 'ok'){

            $arrResponse = array('status' => true, 'msg' => 'se ha eliminado con exito el rol');

        }elseif ($requestDelete == 'exist') {

            $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar el rol');

        }else{

            $arrResponse = array('status' => false, 'msg' => 'Error al tratar de eliminado el rol');

        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    die();
}

}

?>