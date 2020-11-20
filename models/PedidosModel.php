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

  public function selectPedido(int $prodCodi )
  {
    $this->intIdUsuario = $prodCodi ;
    $sql ="SELECT p.prodCodi , p.prodNomb, p.prodMarc, p.prodStock, p.prodMode, c.cateNomb,
    p.status, p.prodPrec, DATE_FORMAT(p.prodFech, '%d-%m-%Y') as fechaRegistro
    FROM productos p
    INNER JOIN categorias c
    ON   p.prodCodiCate = c.cateCodi
    WHERE p.prodCodi = $this->intIdUsuario";
    ///echo $sql;exit; 
    $request = $this->select($sql);
    return $request;
  }
}
?>