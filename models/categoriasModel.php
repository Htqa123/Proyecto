<?php

include_once 'models/categoria.php';

class categoriasModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        // insertar datos en la BD
        try{
            $query = $this->db->connect()->prepare('INSERT INTO categorias (cateCodi, cateNomb, cateFech, cateDesc) VALUES(:cateCodi, :cateNomb, :cateFech, :cateDesc)');
            $query->execute(['cateCodi' => $datos['cateCodi'], 'cateNomb' => $datos['cateNomb'], 'cateFech' => $datos['cateFech'], 'cateDesc' => $datos['cateDesc']]);
            return true;
        }catch(PDOException $e){
            
            return false;
        }
        
    }

    public function filtrarCategorias()
    {
        {
            $items = [];
    
            try{
    
               $query = $this->db->connect()->query("SELECT *FROM categorias WHERE cateNomb LIKE % 
               :buscar % ");
                var_dump($query);
                while($row = $query->fetch()){
                    $item = new Categoria();
                    
                    $item->cateCodi = $row['cateCodi'];
                    $item->cateNomb    = $row['cateNomb'];
                    $item->cateFech  = $row['cateFech'];
                    $item->cateDesc  = $row['cateDesc'];
    
                    array_push($items, $item);
                    var_dump($item);
                }
    
                return $items;
            }catch(PDOException $e){
                return [];
            }
        }

    }

    
    public function consulta_categorias()
    {
        $items = [];

        try{

           $query = $this->db->connect()->query("SELECT *FROM categorias");
           
            while($row = $query->fetch()){
                $item = new Categoria();
                
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