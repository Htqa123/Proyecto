<?php

include_once 'models/producto.php';
class ProductosModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        // insertar datos en la BD
        try{
        $query = $this->db->connect()->prepare('INSERT INTO productos (prodId, prodRefe,prodCate, prodFech, prodDesc, prodInact)
             VALUES(:prodId, :prodRefe, :prodCate, :prodFech, :prodDesc, :prodInact)');
            $query->execute(['prodId' => $datos['prodId'], 'prodRefe' => $datos['prodRefe'], 'prodCate'=> $datos['prodCate'], 'prodFech' => $datos['prodFech'], 'prodDesc' => $datos['prodDesc'], 'prodInact' => $datos['prodInact']]);
            return true;
        }catch(PDOException $e){
            
            return false;
        }
        
    }

    
    public function get(){
        $items = [];

        try{

           $query = $this->db->connect()->query("SELECT*FROM productos");
           
            while($row = $query->fetch()){
                $item = new Producto();
                
                $item->mediId = $row['prodId'];
                $item->mediNomb    = $row['prodRefe'];
                $item->mediFech  = $row['prodCate'];
                $item->mediDesc  = $row['prodFech'];
                $item->mediInact  = $row['prodDesc'];
                $item->mediInact  = $row['prodInact'];

                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }
}

?>