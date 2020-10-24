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

        @$prodCodi = @$_POST['prodCodi'];
        @$prodNomb    = @$_POST['prodNomb'];
        @$prodCodiCant = @$_POST['prodCodiCant'];
        @$prodFech = @$_POST['prodFech'];
        @$prodPrec  = @$_POST['prodPrec'];
        @$prodMode  = @$_POST['prodMode'];
        @$prodMarc  = @$_POST['prodMarc'];
        @$prodStock  = @$_POST['prodStock'];
        @$prodNitProv  = @$_POST['prodNitProv'];
        @$prodImag  = @$_POST['prodImag'];
        @$admiNomb  = @$_POST['admiNomb'];


        $mensaje = "";

        if($this->model->insert([

            'prodCodi' => $prodCodi,
            'prodNomb' => $prodNomb,
            'prodCodiCant'=> $prodCodiCant,
            'prodFech' => $prodFech,
            'prodPrec' => $prodPrec,
            'prodMode' => $prodMode,
            'prodMarc' => $prodMarc,
            'prodStock' => $prodStock,
            'prodNitProv' => $prodNitProv,
            'prodImag' => $prodImag,
            'admiNomb' => $admiNomb,
            ]))
            {
            $mensaje = "Registro guardado con exito";
        }else{
            $mensaje = "Registro ya existe";
        }

        $this->view->mensaje = $mensaje;
        $this->render();
        
    }
}

?>