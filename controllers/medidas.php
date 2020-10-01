<?php

class Medidas extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->Medidas = [];
        $this->view->mensaje = "";
        
    }

    function render(){
    
        $medidas = $this->model->get();
        $this->view->medidas = $medidas;
        $this->view->render('medidas/index');
       
        
    }

    function registrarMedidas(){

        @$mediId = @$_POST['mediId'];
        $mediNomb    = $_POST['mediNomb'];
        @$mediFech = @$_POST['mediFech'];
        @$mediDesc  = @$_POST['mediDesc'];
        @$mediInact  = @$_POST['mediInact'];
        
        $mensaje = "";

        if($this->model->insert(['mediId' => $mediId, 'mediNomb' => $mediNomb, 'mediFech'=> $mediFech, 'mediDesc' => $mediDesc, 'mediInact' => $mediInact])){
            $mensaje = "Registro guuardado con exito";
        }else{
            $mensaje = "Registro ya existe";
        }

        $this->view->mensaje = $mensaje;
        $this->render();
        
    }
}

?>