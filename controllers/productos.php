<?php

class Productos extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->Productos = [];
        $this->view->categorias = [];
        $this->view->referencias = [];
        $this->view->mensaje = "";
        
    }

    function render(){
    
        $productos = $this->model->get();
        $this->view->productos = $productos;
        $categorias = $this->model->consulta_categorias();
        $referencias = $this->model->consulta_referencia();
        $this->view->render('productos/index');
       
        
    }

    function registrarProductos(){

        @$prodId = @$_POST['prodId'];
        @$prodRefe    = @$_POST['prodRefe'];
        @$prodCate = @$_POST['prodCate'];
        @$prodMedi = @$_POST['prodMedi'];
        @$prodFech  = @$_POST['prodFech'];
        @$prodDesc  = @$_POST['prodDesc'];
        @$prodInact  = @$_POST['prodInact'];


        $mensaje = "";

        if($this->model->insert(['prodId' => $prodId, 'prodRefe' => $prodRefe, 'prodCate'=> $prodCate, 'prodMedi' => $prodMedi, 'prodFech' => $prodFech, 'prodDesc' => $prodDesc, 'prodInact' => $prodInact])){
            $mensaje = "Registro guardado con exito";
        }else{
            $mensaje = "Registro ya existe";
        }

        $this->view->mensaje = $mensaje;
        $this->render();
        
    }
}

?>