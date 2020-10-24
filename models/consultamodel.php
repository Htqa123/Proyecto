<?php

include_once 'models/categorias.php';


class ConsultaModel extends Model{


    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $items = [];

        try{

            $query = $this->db->connect()->query("SELECT*FROM categorias");

            while($row = $query->fetch()){
                $item = new Categorias();
                $item->cateCodi = $row['cateCodi'];
                $item->cateNomb    = $row['cateNomb'];
                $item->cateFech  = $row['cateFech'];
                $item->cateDesc  = $row['cateDesc'];

                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }
}

?>