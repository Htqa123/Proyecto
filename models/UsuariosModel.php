<?php 
class UsuariosModel extends Mysql
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


  ////insertar usuarios con el modal
  public function insertUsuario(string $persIden, string $persNomb, 
  string $persApel, string $persTele, string $persEmail, string $persPass, string $tipoid, string $status){
   
    $this->strIdentificacion = $persIden;
    $this->strNombre = $persNomb;
    $this->strApellido = $persApel;
    $this->intTelefono = $persTele;
    $this->strEmail = $persEmail;
    $this->strPassword = $persPass;
    $this->intTipoId = $tipoid;
    $this->intStatus = $status;
    $return = 0;

    $sql = "SELECT * FROM personas WHERE persEmail =
    '{$this->strEmail}' OR persIden = '{$this->strIdentificacion}' ";
    $request = $this->select_all($sql);
    
    if(empty($request)){
      $query_insert = "INSERT INTO personas (persIden, persNomb, persApel,persTele,
      persEmail, persPass, rolid, status) value(?,?,?,?,?,?,?,?)";
      $arrData = array(
        $this->strIdentificacion,
        $this->strNombre,
        $this->strApellido,
        $this->intTelefono,
        $this->strEmail,
        $this->strPassword,
        $this->intTipoId,
        $this->intStatus
      );
      $request_insert = $this->insert($query_insert, $arrData);
      $return = $request_insert;
    }else{
      $return ="exist";
    }
    return $return;
  } 

    public function selectUsuarios()
    {
      $sql ="SELECT p.persId, p.persIden, p.persNomb, p.persApel, p.persTele, p.persEmail,
      p.status, r.roleNomb
      FROM personas p
      INNER JOIN roles r
      ON p.rolid = r.idrol
      WHERE p.status != 0";
      $request = $this->select_all($sql);
      return $request;

    }

    public function selectUsuario(int $persId)
    {
      $this->intIdUsuario = $persId;
      $sql ="SELECT p.persId, p.persIden, p.persNomb, p.persApel, p.persTele, p.persEmail,
      p.status, r.roleNomb, r.idrol, DATE_FORMAT(p.persFech, '%d-%m-%Y') as fechaRegistro
      FROM personas p
      INNER JOIN roles r
      ON p.rolid = r.idrol
      WHERE p.persId = $this->intIdUsuario";
      ///echo $sql;exit; 
      $request = $this->select($sql);
      return $request;
    }

    public function updateUsuario(int $persId, string $persIden, string $persNomb, string $persApel,
    int $persTele, string $persEmail, string $persPass, int $tipoid, int $status){

      $this->intIdUsuario = $persId;
      $this->strIdentificacion = $persIden;
      $this->strNombre = $persNomb;
      $this->strApellido = $persApel;
      $this->intTelefono = $persTele;
      $this->strEmail = $persEmail;
      $this->strPassword = $persPass;
      $this->intTipoId = $tipoid;
      $this->intStatus = $status;

      $sql = "SELECT * FROM personas WHERE (persEmail = '{$this->strEmail}' AND persId != $this->intIdUsuario)
										  OR (persIden = '{$this->strIdentificacion}' AND persId != $this->intIdUsuario) ";
			$request = $this->select_all($sql);
      
      if(empty($request))
			{
				if($this->strPassword  != "")
				{
					$sql = "UPDATE personas SET persIden=?, persNomb=?, persApel=?, persTele=?, persEmail=?, persPass=?, rolid=?, status=? 
							WHERE persId = $this->intIdUsuario ";
					$arrData = array($this->strIdentificacion,
	        						$this->strNombre,
	        						$this->strApellido,
	        						$this->intTelefono,
	        						$this->strEmail,
	        						$this->strPassword,
	        						$this->intTipoId,
	        						$this->intStatus);
				}else{
					$sql = "UPDATE personas SET persIden=?, persNomb=?, persApel=?, persTele=?, persEmail=?, rolid=?, status=? 
							WHERE persId = $this->intIdUsuario ";
					$arrData = array($this->strIdentificacion,
	        						$this->strNombre,
	        						$this->strApellido,
	        						$this->intTelefono,
	        						$this->strEmail,
	        						$this->intTipoId,
	        						$this->intStatus);
				}
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
			return $request;
    }

    public function deleteUsuario(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE personas SET status = ? WHERE persId = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
		}
}
?>