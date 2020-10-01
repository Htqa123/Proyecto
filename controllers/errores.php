<?php

class Errores extends Controller{

    function __construct(){

        parent::__construct();

        $this->view->mensaje = "Lo sentimos hubo un error al tratar de cargar el sitio";
        $this->view->render('errores/index');
        }
    }


?>