<?php 
class ProductosModel extends Mysql
{
  private $intlistProd;
  private $strprodNomb;
  private $intprodPrec;
  private $strprodMode;
  private $strprodMarc;
  private $strprodStock;
  private $intlistNitprov;
  private $intStatus;
  
  public function __construct()
  {
    parent::__construct();
  }
  public function insertProductos(int $listProd, string $prodNomb, 
  int $prodPrec, string $prodMode, string $prodMarc, int $prodStock,
  int $listNitprov, int $status){
   
    $this->intlistProd = $listProd;
    $this->strprodNomb = $prodNomb;
    $this->intprodPrec = $prodPrec;
    $this->strprodMode = $prodMode;
    $this->strprodMarc = $prodMarc;
    $this->strprodStock = $prodStock;
    $this->intlistNitprov = $listNitprov;
    $this->intStatus = $status;
    $return = 0;

    $sql = "SELECT * FROM productos WHERE prodNomb =
    '{$this->strprodNomb}'";
    $request = $this->select_all($sql);
    
    if(empty($request)){
      $query_insert = "INSERT INTO productos (prodNomb,prodCodiCate , prodPrec, prodMode,
      prodMarc, prodStock, prodNitProv, status) value(?,?,?,?,?,?,?,?)";
      $arrData = array(
        $this->intlistProd,
        $this->strprodNomb,
        $this->intprodPrec,
        $this->strprodMode,
        $this->strprodMarc,
        $this->strprodStock,
        $this->intlistNitprov,
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
    $sql ="SELECT p.prodCodi, p.prodNomb, p.prodFech, p.prodPrec,
    p.prodMode, p.prodMarc, p.prodStock, p.prodNitProv, p.adminNomb,
    p.status, c.cateNomb
    FROM productos p
    INNER JOIN categorias c
    ON p.prodCodiCate = c.cateCodi
    WHERE p.status != 0" ;
    $request = $this->select_all($sql);
    return $request;
  }

  public function selectUsuario(int $idpersona)
  {
    $this->intIdUsuario = $idpersona;
    $sql ="SELECT p.idpersona, p.identificacion, p.nombres, p.apellidos, p.telefono, p.email_user,
    p.status, r.nombrerol, r.idrol, DATE_FORMAT(p.Fech, '%d-%m-%Y') as fechaRegistro
    FROM personas p
    INNER JOIN roles r
    ON p.rolid = r.idrol
    WHERE p.idpersona = $this->intIdUsuario";
    ///echo $sql;exit; 
    $request = $this->select($sql);
    return $request;
  }
}
?>