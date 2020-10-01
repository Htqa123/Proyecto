<?php

include_once 'models/medida.php';
class medidasModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        // insertar datos en la BD
        try{
        $query = $this->db->connect()->prepare('INSERT INTO medidas (mediId, mediNomb, mediFech, mediDesc, mediInact)
             VALUES(:mediId, :mediNomb, :mediFech, :mediDesc, :mediInact)');
            $query->execute(['mediId' => $datos['mediId'], 'mediNomb' => $datos['mediNomb'], 'mediFech' => $datos['mediFech'], 'mediDesc' => $datos['mediDesc'], 'mediInact' => $datos['mediInact']]);
            return true;
        }catch(PDOException $e){
            
            return false;
        }
        
    }

    
    public function get(){
        $items = [];

        try{

           $query = $this->db->connect()->query("SELECT*FROM medidas");
           
            while($row = $query->fetch()){
                $item = new Medida();
                
                $item->mediId = $row['mediId'];
                $item->mediNomb    = $row['mediNomb'];
                $item->mediFech  = $row['mediFech'];
                $item->mediDesc  = $row['mediDesc'];
                $item->mediInact  = $row['mediInact'];

                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }
}

?>