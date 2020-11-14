<?php

class Categorias extends Controllers
{
    
            public function __construct()
            {
                parent::__construct();

            }
            public function Categorias()
            {
               
                $data['page_tag'] = "Categorias";
                $data['page_title'] ="Categorias <small></small>";
                $data['page_name'] = "Categorias";
                ///$data['page_content'] = "Informacion de la pagina";
                $this->views->getView($this,"categorias", $data);
            }
            
    public function getCategorias()
        {
                $arrData = $this->model->selectCategorias();

                for($i = 0; $i < count($arrData); $i++)
                {
                    if($arrData[$i]['status'] == 1)
                    {
                        $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                    }else{
                        $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                    }

                    $arrData[$i]['options'] = '<div class="text-center">
                    <button class="btn btn-secondary btn-sm btnPermisoRol" cc="'.$arrData[$i]['cateCodi'].'" title="Permisos"><i class="fa fa-address-book-o" aria-hidden="true"></i></button> 
                    <button class="btn btn-primary btn-sm btnEditCate" cc="'.$arrData[$i]['cateCodi'].'" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn-sm btnDelCate" cc="'.$arrData[$i]['cateCodi'].'" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
                    </div>';
            }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

              public function getCategoria( int $cateCodi)
              {
                  $intIdcate = intval(strClean($cateCodi));

                   if($intIdcate > 0)
                      {

       $arrData = $this->model->selectCategoria($intIdcate);
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

            public function setCategoria()
            {
                   
                    $intIdcate = intval($_POST['cateCodi']);
                    $strcateNomb = strClean($_POST['txtcateNomb']);
                    $strcateDesc = strClean($_POST['txtcateDesc']);
                    $intStatus = intval($_POST['listStatus']);
                    
                    if($intIdcate == 0)
                    {
                        $request_cate = $this->model->insertCategoria($strcateNomb, $strcateDesc, $intStatus);
                        $option = 1;

                    }else{
                        $request_cate = $this->model->updateCategoria($intIdcate, $strcateNomb, $strcateDesc, $intStatus);
                        $option = 2;

                    }

                    if($request_cate > 0)
                    {
                        if($option == 1)
                        {

                            $arrResponse = array('status' => true, 'msg' => 'Datos guardados con exito.');
                        }else{

                            $arrResponse = array('status' => true, 'msg' => 'Datos Actualizado con exito.');
                        }

                        }else if ($request_cate == 'exist') 
                        {

                        $arrResponse = array('status' => false, 'msg' => 'La categoía ya existe.');

                    }else{

                        $arrResponse = array("status" => false, "msg" => 'No se pueden guardar los datos.');

                    }

                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                    die();
            }

            public function delCategoria()
            {
                if($_POST){

                    $intIdcate = intval($_POST['cateCodi']);
                    $requestDelete =  $this->model->deleteCategoria($intIdcate);
                    if($requestDelete == 'ok'){

                        $arrResponse = array('status' => true, 'msg' => 'se ha eliminado con exito la categoría');

                    }elseif ($requestDelete == 'exist') {

                        $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar el categoría');

                    }else{

                        $arrResponse = array('status' => false, 'msg' => 'Error al tratar de eliminar la categoría');

                    }

                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }

                die();
            }

}

  ?>