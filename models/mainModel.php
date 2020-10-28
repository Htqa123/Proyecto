<?php

include_once 'models/categoriasModel.php';
$instanciaCategorias = new categoriasModel();
$objetoCate = $instanciaCategorias->filtrarCategorias();

include_once 'models/categoriasModel.php';
class mainModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    // public function insert($datos){
    //     // insertar datos en la BD
    //     try{
    //     $query = $this->db->connect()->prepare('INSERT INTO administrador (admiNomb, admiFech, admiClav)
    //          VALUES(:admiNomb,:admiFech, :admiClav)');
    //         $query->execute(['admiNomb' => $datos['admiNomb'], 'admiFech' => $datos['admiFech'], 'admiClav' => $datos['admiClav']]);
    //         return true;
    //     }catch(PDOException $e){
            
    //         return false;
    //     }
        
    // }

    
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
}
?>