<?php

/////var_dump($objetomedidas);
include_once 'models/proveedor.php';

class proveedoresModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        // insertar datos en la BD
        try{
            $query = $this->db->connect()->prepare('INSERT INTO proveedores (provNit, provFech, 
            provNomb, provDire, provTele,provPagi)
             VALUES(:provNit, :provFech, :provNomb, :provDire, :provTele, :provPagi)');
            $query->execute([
                'provNit' => $datos['provNit'],
                'provFech' => $datos['provFech'],
                'provNomb' => $datos['provNomb'],
                'provDire' => $datos['provDire'],
                'provTele' => $datos['provTele'],
                'provPagi' => $datos['provPagi']
                    ]);
            return true;
           /// echo $_POST['refeMedi'];
        }catch(PDOException $e)
        {
            
            return false;
        }
        
    }

    
    public function consulta_proveedores()
    {
        $items = [];

        try
        {

           $query = $this->db->connect()->query("SELECT * FROM proveedores");
           
            while($row = $query->fetch()){
                $item = new Proveedor();
                
                $item->provNit = $row['provNit'];
                $item->provFech    = $row['provFech'];
                $item->provNomb  = $row['provNomb'];
                $item->provDire  = $row['provDire'];
                $item->provTele  = $row['provTele'];
                $item->provPagi  = $row['provPagi'];

                array_push($items, $item);
            }

            return $items;   

        }
        catch(PDOException $e)
        {
            return [];
        } 
    }
    
}
?>