<?php

class Referencias extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->referencias = [];
        $this->view->mensaje = "";
        
    }

    function render(){
    
        $referencias = $this->model->get();
        $this->view->referencias = $referencias;
        $this->view->render('referencias/index');
       
        
    }

    function registrarReferencias(){

        $refeId = $_POST['refeId'];
        $refeNomb    = $_POST['refeNomb'];
        $refeMedi = $_POST['refeMedi'];
        $refeFech  = $_POST['refeFech'];
        $refeInact  = $_POST['refeInact'];


        $mensaje = "";

        if($this->model->insert(['refeId' => $refeId, 'refeNomb' => $refeNomb, 'refeMedi'=> $refeMedi, 'refeFech' => $refeFech, 'refeInact' => $refeInact])){
            $mensaje = "Registro guuardado con exito";
        }else{
            $mensaje = "Registro ya existe";
        }

        $this->view->mensaje = $mensaje;
        $this->render();
        
    }
}

?>