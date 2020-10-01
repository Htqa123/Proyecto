<?php

include_once 'models/referencia.php';
class referenciasModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        // insertar datos en la BD
        try{
            $query = $this->db->connect()->prepare('INSERT INTO referencias (refeId, refeNomb, refeMedi, refeFech, refeInact)
             VALUES(:refeId, :refeNomb, :refeMedi, :refeFech, :refeInact)');
            $query->execute(['refeId' => $datos['refeId'], 'refeNomb' => $datos['refeNomb'], 'refeMedi' => $datos['refeMedi'], 'refeFech' => $datos['refeFech'], 'refeInact' => $datos['refeInact']]);
            return true;
        }catch(PDOException $e){
            
            return false;
        }
        
    }

    
    public function get(){
        $items = [];

        try{

           $query = $this->db->connect()->query("SELECT*FROM referencias");
           
            while($row = $query->fetch()){
                $item = new Referencia();
                
                $item->refeId = $row['refeId'];
                $item->refeNomb    = $row['refeNomb'];
                $item->refeMedi  = $row['refeMedi'];
                $item->refeFech  = $row['refeFech'];
                $item->refeInact  = $row['refeInact'];

                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }
}

?>