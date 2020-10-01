<?php

class Productos extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->Productos = [];
        $this->view->mensaje = "";
        
    }

    function render(){
    
        $productos = $this->model->get();
        $this->view->productos = $productos;
        $this->view->render('productos/index');
       
        
    }

    function registrarProductos(){

        $proId = $_POST['proId'];
        $prodRefe    = $_POST['prodRefe'];
        $prodCate = $_POST['prodCate'];
        $prodFech  = $_POST['prodFech'];
        $prodDesc  = $_POST['prodDesc'];
        $prodInact  = $_POST['prodInact'];


        $mensaje = "";

        if($this->model->insert(['proId' => $proId, 'prodRefe' => $prodRefe, 'prodCate'=> $prodCate, 'prodFech' => $prodFech, 'prodDesc' => $prodDesc, 'prodInact' => $prodInact])){
            $mensaje = "Registro guuardado con exito";
        }else{
            $mensaje = "Registro ya existe";
        }

        $this->view->mensaje = $mensaje;
        $this->render();
        
    }
}

?>