<?php

include_once 'models/categoria.php';
class categoriasModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        // insertar datos en la BD
        try{
            $query = $this->db->connect()->prepare('INSERT INTO categorias (cateId, cateNomb, cateFech, cateInact) VALUES(:cateId, :cateNomb, :cateFech, :cateInact)');
            $query->execute(['cateId' => $datos['cateId'], 'cateNomb' => $datos['cateNomb'], 'cateFech' => $datos['cateFech'], 'cateInact' => $datos['cateInact']]);
            return true;
        }catch(PDOException $e){
            
            return false;
        }
        
    }

    
    public function get(){
        $items = [];

        try{

           $query = $this->db->connect()->query("SELECT*FROM categorias");
           
            while($row = $query->fetch()){
                $item = new Categoria();
                
                $item->cateId = $row['cateId'];
                $item->cateNomb    = $row['cateNomb'];
                $item->cateFech  = $row['cateFech'];
                $item->cateInact  = $row['cateInact'];

                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }
}

?>