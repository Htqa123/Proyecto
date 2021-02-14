<?php 
class FacturasModel extends Mysql
{
  public function __construct()
  {
    parent::__construct();
  }


  public function insertFacturas(int $listEmpresa, int $provNumeFact, 
  int $provValoFact,  int $status){
   
    
    $this->intlistEmpresa = $listEmpresa;
    $this->intprovNumeFact = $provNumeFact;
    $this->intprovValoFact = $provValoFact;
    $this->intStatus = $status;
    $return = 0;

    
    if(empty($request)){
      $query_insert = "INSERT INTO proveedores_facturas (provNumeFact,  provValoFact,
         status, provFactCodi) value(?,?,?,?)";
      $arrData = array(
        
        $this->intlistEmpresa,
        $this->intprovNumeFact,
        $this->intprovValoFact,
        $this->intStatus,
      );
      $request_insert = $this->insert($query_insert, $arrData);
      $return = $request_insert;
    }else{
      $return ="exist";
    }
    return $return;
  } 

  ///metodo para mostrar datos en la tabla

  public function selectFacturas(){
    $sql ="SELECT provFactCodi,  provNumeFact, provValoFact,provFactFech,
    status
    FROM proveedores_facturas  WHERE status != 0"  ;
    //echo $sql;exit;
    $request = $this->select_all($sql);
    return $request;
  }

  public function selectFactura(int $provFactCodi ){
    $this->provFactCodi = $provFactCodi ;
    $sql ="SELECT p.provFactCodi, p.provNumeFact, p.provValoFact, C.provNit,
    c.provCodi, c.provNomb, p.status, DATE_FORMAT(p.provFactFech, '%d-%m-%Y') 
    as fechaRegistro
    FROM proveedores_facturas p
    left JOIN proveedores c
    ON   p.provFactId = c.provCodi
   WHERE p.status != 0 and c.provCodi ={$this->provFactId}";
    ///echo $sql;exit; 
    $request = $this->select($sql);
    return $request;
  }

  public function AgregarProducto(int $prodCodi ){
    $this->prodCodi = $prodCodi ;
    $sql ="SELECT prodCodi , prodNomb, prodStock, 
     prodPrec, status FROM productos 
    WHERE prodCodi = $this->prodCodi";
    ///echo $sql;exit; 
    $request = $this->select($sql);
    return $request;
  }
}
?>