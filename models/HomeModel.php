<?php 
class HomeModel extends Mysql
{
  public function __construct()
  {
    parent::__construct();
  }

  public function selectProductos()
  {
    $sql ="SELECT p.prodCodi, p.prodNomb, p.prodFech, p.prodPrec,
    p.prodMode, p.prodMarc,  p.prodStock, p.prodNitProv, p.adminNomb,
    p.status, c.cateNomb
    FROM productos p
    WHERE p.status != 0"  ;
    //echo $sql;exit;
    $request = $this->select_all($sql);
    return $request;
  }
}
?>