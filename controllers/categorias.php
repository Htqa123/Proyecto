<?php

class Categorias extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->categorias = [];
        $this->view->mensaje = "";
        
    }

    function render(){
    
        $categorias = $this->model->get();
        $this->view->categorias = $categorias;
        $this->view->render('categorias/index');
       
        
    }

    function registrarCategorias(){

        @$cateId = @$_POST['cateId'];
        $cateNomb    = $_POST['cateNomb'];
        @$cateFech  =@$_POST['cateFech'];
        @$cateInact  = @$_POST['cateInact'];

      
        $mensaje = "";

        if($this->model->insert(['cateId' => $cateId, 'cateNomb' => $cateNomb, 'cateFech' => $cateFech, 'cateInact' => $cateInact])){
            $mensaje = "Registro guardado con exito";
        }else{
            $mensaje = "Registro ya existe";
        }

        $this->view->mensaje = $mensaje;
        $this->render();
        
    }
}

?>