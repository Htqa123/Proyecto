<?php
include_once 'models/categoriasModel.php';
$instanciaCategorias = new categoriasModel();
$objetoCate = $instanciaCategorias->consulta_categorias();

include_once 'models/referenciasModel.php';
$instanciaReferencias = new referenciasModel();
$objetoReferencias = $instanciaReferencias->consulta_referencia();

include_once 'models/medidasModel.php';
$instanciaMedidas = new medidasModel();
$objetoMedidas = $instanciaMedidas->consulta_medidas();

include_once 'models/producto.php';
class ProductosModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        // insertar datos en la BD
        try{
    $query = $this->db->connect()->prepare('INSERT INTO productos (prodId, prodRefe,prodCate,prodMedi, prodFech, prodDesc, prodInact)
             VALUES(:prodId, :prodRefe, :prodCate, :prodMedi, :prodFech, :prodDesc, :prodInact)');
            $query->execute(['prodId' => $datos['prodId'], 'prodMedi' => $datos['prodMedi'], 'prodRefe' => $datos['prodRefe'], 'prodCate'=> $datos['prodCate'], 'prodFech' => $datos['prodFech'], 'prodDesc' => $datos['prodDesc'], 'prodInact' => $datos['prodInact']]);
             var_dump($datos);
            return true;
        }catch(PDOException $e){
            
            return false;
        }
        
    }

    
    public function get(){
        $items = [];

        try{

           $query = $this->db->connect()->query("SELECT * FROM referencias r 
           LEFT JOIN medidas m 
           ON r.refeMedi=m.mediId
           left join productos p
           ON p.prodId = r.refeId
           left join categorias c
           ON c.cateId = p.prodId");
           
            while($row = $query->fetch()){
                $item = new Producto();
                
                $item->prodId = $row['prodId'];
                $item->prodRefe    = $row['prodRefe'];
                $item->prodCate  = $row['prodCate'];
                $item->prodMedi  = $row['prodMedi'];
                $item->prodFech  = $row['prodFech'];
                $item->prodDesc  = $row['prodDesc'];
                $item->prodInact  = $row['prodInact'];

                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

    public function consulta_categorias(){
        $items = [];

        try{

           $query = $this->db->connect()->query("SELECT mediId, mediNomb FROM medidas WHERE mediId=mediId");
           
            while($row = $query->fetch()){
                $item = new categoria();
                
                $item->mediId = $row['mediId'];
                $item->mediNomb    = $row['mediNomb'];
                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
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

}

?>