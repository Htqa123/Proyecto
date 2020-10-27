<?php

class Proveedores extends Controller
{
   
    function __construct()
    {
        parent::__construct();
        $this->view->proveedores = [];
        $this->view->mensaje = "";
        
    }

    function render(){
       
        $proveedores = $this->model->consulta_proveedores();
        $this->view->proveedores = $proveedores;
        /////var_dump($medidas);
        $this->view->render('proveedores/index');
            
    }

    function registrarProveedores()
    {

        @$provNit = @$_POST['provNit'];
        @$provFech    = @$_POST['provFech'];
        @$provNomb = @$_POST['provNomb'];
        @$provDire  = @$_POST['provDire'];
        @$provTele  = @$_POST['provTele'];
        @$provPagi  = @$_POST['provPagi'];


        $mensaje = "";

        if($this->model->insert([
            'provNit' => $provNit,
            'provFech' => $provFech,
            'provNomb'=> $provNomb,
            'provDire' => $provDire,
            'provTele' => $provTele,
            'provPagi' => $provPagi
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