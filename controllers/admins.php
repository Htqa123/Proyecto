<?php

class Admins extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->Admins = [];
        $this->view->mensaje = "";
        
    }

    function render(){
    
        $admins = $this->model->consulta_Admins();
        $this->view->admins = $admins;
        $this->view->render('admins/index');
       
        
    }

    function registrar_Admins(){

        @$admiNomb = @$_POST['admiNomb'];
        @$admiFech    = @$_POST['admiFech'];
        @$admiClav = @$_POST['admiClav'];
        
        $mensaje = "";

        if($this->model->insert(['admiNomb' => $admiNomb, 'admiFech' => $admiFech, 'admiClav'=> $admiClav])){
            $mensaje = "Registro guuardado con exito";
        }else{
            $mensaje = "Registro ya existe";
        }

        $this->view->mensaje = $mensaje;
        $this->render();
        
    }
}

?>