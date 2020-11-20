<?php 
class ProductosModel extends Mysql
{
  private $intlistProd;
  private $strprodNomb;
  private $intprodPrec;
  private $strprodMode;
  private $strprodMarc;
  private $strprodStock;
  private $listNitProv;
  private $intStatus;
  
  public function __construct()
  {
    parent::__construct();
  }
  public function insertProductos(int $listProd, string $prodNomb, 
  int $prodPrec, string $prodMode, string $prodMarc, int $prodStock,
  int $listNitProv, int $status){
   
    $this->intlistProd = $listProd;
    $this->strprodNomb = $prodNomb;
    $this->intprodPrec = $prodPrec;
    $this->strprodMode = $prodMode;
    $this->strprodMarc = $prodMarc;
    $this->strprodStock = $prodStock;
    $this->intlistNitProv = $listNitProv;
    $this->intStatus = $status;
    $return = 0;

    // $sql = "SELECT * FROM productos WHERE prodNomb =
    // '{$this->strprodNomb}'";
    // $request = $this->select_all($sql);
    
    if(empty($request)){
      $query_insert = "INSERT INTO productos (prodCodiCate, prodNomb, prodPrec, prodMode,
      prodMarc, prodStock, prodNitProv, status) value(?,?,?,?,?,?,?,?)";
      $arrData = array(
        $this->intlistProd,
        $this->strprodNomb,
        $this->intprodPrec,
        $this->strprodMode,
        $this->strprodMarc,
        $this->strprodStock,
        $this->intlistNitProv,
        $this->intStatus
      );
      $request_insert = $this->insert($query_insert, $arrData);
      $return = $request_insert;
    }else{
      $return ="exist";
    }
    return $return;
  } 

  /////método para traer los productos en la tabla

  public function selectProductos()
  {
    $sql ="SELECT *
    FROM productos p 
    INNER JOIN categorias c
    ON p.prodCodiCate = c.cateCodi
    WHERE p.status != 0"  ;
    //echo $sql;exit;
    $request = $this->select_all($sql);
    return $request;
  }

  public function selectProducto(int $prodCodi)
  {
    $this->prodCodi = $prodCodi;
    $sql ="SELECT  p.prodNomb,p.prodCodiCate, p.prodPrec, p.prodMode, p.prodMarc, p.prodNitProv,
    p.status, p.prodStock,   r.cateNomb, r.cateCodi, pv.provNomb,
    DATE_FORMAT(p.prodFech, '%d-%m-%Y') 
    as fechaRegistro
    FROM productos p
    JOIN proveedores pv
    ON p.prodNitProv = pv.provCodi
    INNER JOIN categorias r
    ON p.prodCodiCate = r.cateCodi
    WHERE p.prodCodi = $this->prodCodi";
    //echo $sql;exit; 
    $request = $this->select($sql);
    return $request;
  }
}
?>