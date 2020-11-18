<?php 
class ProveedoresModel extends Mysql
{
  private $intIdUsuario;
  private $strIdentificacion;
  private $strNombre;
  private $strApellido;
  private $intTelefono;
  private $strEmail;
  private $strPassword;
  private $strToken;
  private $intTipoId;
  private $intStatus;
  
  public function __construct()
  {
    parent::__construct();
  }
  public function insertProveedor(string $provNit, string $provNomb, 
  string $provDire, int $provTele, string $provEmail, string $provDeta, int $status){
   
    $this->strIdentificacion = $provNit;
    $this->strNombre = $provNomb;
    $this->strApellido = $provDire;
    $this->intTelefono = $provTele;
    $this->strEmail = $provEmail;
    $this->strPassword = $provDeta;
    $this->intStatus = $status;
    $return = 0;

    $sql = "SELECT * FROM proveedores WHERE provNomb =
    '{$this->strNombre}' OR provNit = '{$this->strIdentificacion}' ";
    $request = $this->select_all($sql);
    
    if(empty($request)){
      $query_insert = "INSERT INTO proveedores (provNit, provNomb, provDire,provTele,
      provEmail, provDeta,  status) value(?,?,?,?,?,?,?)";
      $arrData = array(
        $this->strIdentificacion,
        $this->strNombre,
        $this->strApellido,
        $this->intTelefono,
        $this->strEmail,
        $this->strPassword,
        $this->intStatus
      );
      $request_insert = $this->insert($query_insert, $arrData);
      $return = $request_insert;
    }else{
      $return ="exist";
    }
    return $return;
  } 

  public function selectProveedores()
  {
    $sql ="SELECT * FROM proveedores where provCodi =provCodi";
    $request = $this->select_all($sql);
    return $request;

  }

  public function selectProveedor(int $provCodi )
  {
    $this->intIdUsuario = $provCodi ;
    $sql ="SELECT provCodi ,provNit, provNomb, provDire,provTele,provEmail,
    status, provDeta, DATE_FORMAT(provFech, '%d-%m-%Y') as fechaRegistro
    FROM proveedores
    WHERE provCodi  = $this->intIdUsuario";
    ///echo $sql;exit; 
    $request = $this->select($sql);
    return $request;
  }
}
?>