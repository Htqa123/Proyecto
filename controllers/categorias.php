<?php

class Categorias extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->categorias = [];
        $this->view->mensaje = "";
        
    }

    function render(){
    
        $categorias = $this->model->filtrarCategorias();
        $categorias = $this->model->consulta_categorias();
        $this->view->categorias = $categorias;
        $this->view->render('categorias/index');
       
        
    }

    function registrarCategorias(){
        
 
        @$cateCodi = @$_POST['cateCodi'];
        $cateNomb    = $_POST['cateNomb'];
        @$cateFech  =@$_POST['cateFech'];
        @$cateDesc  = @$_POST['cateDesc'];

      
        $mensaje = "";

        if($this->model->insert(['cateCodi' => $cateCodi, 'cateNomb' => $cateNomb, 'cateFech' => $cateFech, 'cateDesc' => $cateDesc])){
            $mensaje = "Registro guardado con éxito";
        }else{
            $mensaje = "Registro ya existe";
        }

        $this->view->mensaje = $mensaje;
        $this->render();
        
    }
}

?>