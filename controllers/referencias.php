<?php

class Referencias extends Controller{

    public static $medidas;

    function __construct(){
        parent::__construct();
        $this->view->referencias = [];
        $this->view->medidas = [];
        $this->view->mensaje = "";
        
    }

    function render(){
       
        $referencias = $this->model->consulta_referencia();
        $this->view->referencias = $referencias;
        $medidas = $this->model->consulta_Medidas();
        /////var_dump($medidas);
        $this->view->render('referencias/index');
        
        
        
       
        
    }

    function registrarReferencias(){

        @$refeId = @$_POST['refeId'];
        $refeNomb    = $_POST['refeNomb'];
        @$refeMedi = @$_POST['refeMedi'];
        @$refeFech  = @$_POST['refeFech'];
        @$refeInact  = @$_POST['refeInact'];


        $mensaje = "";

        if($this->model->insert(['refeId' => $refeId, 'refeNomb' => $refeNomb, 'refeMedi'=> $refeMedi, 'refeFech' => $refeFech, 'refeInact' => $refeInact])){
            $mensaje = "Registro guardado con exito";
        }else{
            $mensaje = "Registro ya existe";
        }

        $this->view->mensaje = $mensaje;
        $this->render();
        
    }
}

?>