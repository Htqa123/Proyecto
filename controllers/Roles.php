<?php

class Roles extends Controllers
{
    
            public function __construct()
            {
                parent::__construct();

            }
            public function Roles()
            {
                $data['page_id'] = 3;
                $data['page_tag'] = "Roles";
                $data['page_title'] ="Roles <small></small>";
                $data['page_name'] = "roles";
                ///$data['page_content'] = "Informacion de la pagina";
                $this->views->getView($this,"roles", $data);
            }
            
             public function getRoles()
                 {
                         $arrData = $this->model->selectRoles();

                         for($i = 0; $i < count($arrData); $i++)
                         {
                             if($arrData[$i]['status'] == 1)
                             {
                                 $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                             }else{
                                 $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                             }

                             $arrData[$i]['options'] = '<div class="text-center">
                             <button class="btn btn-secondary btn-sm btnPermisoRol" rl="'.$arrData[$i]['idrol'].'" title="Permisos"><i class="fa fa-user-secret" aria-hidden="true"></i></button> 
                             <button class="btn btn-primary btn-sm btnEditRol" rl="'.$arrData[$i]['idrol'].'" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                             <button class="btn btn-danger btn-sm btnDelRol" rl="'.$arrData[$i]['idrol'].'" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
                             </div>';
                     }

                 echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
                 die();
             }

              public function getRol( int $idrol)
              {
                  $roleCodi = intval(strClean($idrol));

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
                   
                      $roleCodi = intval($_POST['idRol']);
                            $roleNomb = strClean($_POST['txtNombre']);
                            $roleDesc = strClean($_POST['txtDescripcion']);
                            $intStatus = intval($_POST['listStatus']);
                            
                            if($roleCodi == 0)
                            {
                                $request_rol = $this->model->insertRol($roleNomb, $roleDesc, $intStatus);
                                $option = 1;

                            }else{
                                $request_rol = $this->model->updateRol($roleCodi, $roleNomb, $roleDesc, $intStatus);
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

                    $roleCodi = intval($_POST['idrol']);
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