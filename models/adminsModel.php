<?php

include_once 'models/admin.php';
class AdminsModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        // insertar datos en la BD
        try{
        $query = $this->db->connect()->prepare('INSERT INTO administrador (admiNomb, admiFech, admiClav)
             VALUES(:admiNomb,:admiFech, :admiClav)');
            $query->execute(['admiNomb' => $datos['admiNomb'], 'admiFech' => $datos['admiFech'], 'admiClav' => $datos['admiClav']]);
            return true;
        }catch(PDOException $e){
            
            return false;
        }
        
    }

    
    public function consulta_Admins(){
        $items = [];

        try{

           $query = $this->db->connect()->query("SELECT*FROM administrador");
           
            while($row = $query->fetch()){
                $item = new Admin();
                
                $item->admiNomb = $row['admiNomb'];
                $item->admiFech    = $row['admiFech'];
                $item->admiClav  = $row['admiClav'];

                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }
}

?>