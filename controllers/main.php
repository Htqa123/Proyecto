
<?php

class Main extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->categorias = [];
        
    }

    function render(){
        $this->view->render('main/index');
        $categorias = $this->model->filtrarCategorias();
    }

    
}

?>