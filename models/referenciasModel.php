<?php
include_once 'models/medidasModel.php';
$instanciamedidas = new medidasModel();
$objetomedidas = $instanciamedidas->consulta_Medidas();
/////var_dump($objetomedidas);
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
           /// echo $_POST['refeMedi'];
        }catch(PDOException $e){
            
            return false;
        }
        
    }

    
    public function consulta_referencia(){
        $items = [];

        try{

           $query = $this->db->connect()->query("SELECT * FROM referencias r LEFT JOIN medidas m ON r.refeMedi=m.mediId;");
           
            while($row = $query->fetch()){
                $item = new Referencia();
                
                $item->refeId = $row['refeId'];
                $item->refeNomb    = $row['refeNomb'];
                $item->refeMedi  = $row['mediNomb'];
                $item->refeFech  = $row['refeFech'];
                $item->refeInact  = $row['refeInact'];

                array_push($items, $item);
            }

            return $items;   

        }catch(PDOException $e){
            return [];
        } 
    }
    public function consulta_Medidas(){
        $items = [];

        try{

           $query = $this->db->connect()->query("SELECT mediId, mediNomb FROM medidas WHERE mediId=mediId");
           
            while($row = $query->fetch()){
                $item = new Medida();
                
                $item->mediId = $row['mediId'];
                $item->mediNomb    = $row['mediNomb'];
                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }
}
?>