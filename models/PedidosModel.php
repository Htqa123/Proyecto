<?php 
class PedidosModel extends Mysql
{
  public function __construct()
  {
    parent::__construct();
  }

  public function insertPedidos( string $prodNomb , 
  int $pediPrec,  int $pediCant, int $status){
   
    $this->strprodNomb = $prodNomb;
    $this->intprodPrec = $pediPrec;
    $this->strprodStock = $pediCant;
    $this->intStatus = $status;
    $return = 0;

     $sql = "SELECT * FROM productos WHERE prodCodi =
     '{$this->strprodNomb}'";
     $request = $this->select_all($sql);
    
    if(empty($request)){
      $query_insert = "INSERT INTO pedidos (pediNombProd,  pediCant, pediPrec,
         status) value(?,?,?,?)";
      $arrData = array(
        
        $this->strprodNomb,
        $this->intprodPrec,
        $this->strprodStock,
        $this->intStatus
      );
      $request_insert = $this->insert($query_insert, $arrData);
      $return = $request_insert;
    }else{
      $return ="exist";
    }
    return $return;
  } 

  public function selectPedidos(){
    $sql ="SELECT prodCodi,  prodNomb, prodPrec, prodMode, prodStock,
    status
    FROM productos  WHERE status != 0"  ;
    //echo $sql;exit;
    $request = $this->select_all($sql);
    return $request;
  }

  public function selectPedido(int $prodCodi ){
    $this->prodCodi = $prodCodi ;
    $sql ="SELECT p.prodCodi , p.prodNomb, p.prodMarc, p.prodStock, 
    p.prodMode, c.cateNomb, p.prodPrec, p.status, DATE_FORMAT(p.prodFech, '%d-%m-%Y') 
    as fechaRegistro
    FROM productos p
    INNER JOIN categorias c
    ON   p.prodCodiCate = c.cateCodi
   WHERE p.status != 0 and prodCodi ={$this->prodCodi}";
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