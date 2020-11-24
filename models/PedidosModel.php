<?php 
class PedidosModel extends Mysql
{
  public function __construct()
  {
    parent::__construct();
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
    p.prodMode, c.cateNomb, p.prodPrec, p.status
    FROM productos p
    INNER JOIN categorias c
    ON   p.prodCodiCate = c.cateCodi
    WHERE p.status != 0";
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