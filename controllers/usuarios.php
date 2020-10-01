<?php

class Usuarios extends Controller{

    function __construct(){
        parent::__construct();
        
    }

    function render(){
        $this->view->render('usuarios/login');
    }

    
}

?>