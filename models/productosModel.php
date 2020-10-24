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
    $query = $this->db->connect()->prepare('INSERT INTO productos (prodCodi, prodNomb, prodCodiCant,
             prodFech, prodPrec, prodMode, prodMarc,prodStock,prodNitProv, prodImag,admiNomb)
             VALUES(:prodCodi, :prodNomb, :prodCodiCant, :prodFech, :prodPrec, :prodMode, :prodMarc,
             :prodStock, :prodNitProv, :prodImag, :admiNomb)');
            $query->execute([
                'prodCodi' => $datos['prodCodi'],
                'prodNomb' => $datos['prodNomb'],
                'prodCodiCant' => $datos['prodCodiCant'],
                'prodFech'=> $datos['prodFech'],
                'prodPrec' => $datos['prodPrec'],
                'prodMode' => $datos['prodMode'],
                'prodMarc' => $datos['prodMarc'],
                'prodStock' => $datos['prodStock'],
                'prodNitProv' => $datos['prodNitProv'],
                'prodImag' => $datos['prodImag'],
                'admiNomb' => $datos['admiNomb']
                ]);
             var_dump($datos);
            return true;
        }catch(PDOException $e){
            
            return false;
        }
        
    }

    
    public function get(){
        $items = [];

        try{

           $query = $this->db->connect()->query("SELECT * FROM productos");
           
            while($row = $query->fetch()){
                $item = new Producto();
                
                $item->prodCodi = $row['prodCodi'];
                $item->prodNomb    = $row['prodNomb'];
                $item->prodCodiCant  = $row['prodCodiCant'];
                $item->prodFech  = $row['prodFech'];
                $item->prodPrec  = $row['prodPrec'];
                $item->prodMode  = $row['prodMode'];
                $item->prodMarc  = $row['prodMarc']; 
                $item->prodStock  = $row['prodStock'];
                $item->prodNitProv  = $row['prodNitProv'];
                $item->prodImag  = $row['prodImag'];
                $item->admiNomb  = $row['admiNomb'];

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


    public function consulta_referencia()
    {
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