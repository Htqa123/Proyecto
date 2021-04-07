<?php 
class LoginModel extends Mysql
{
    private $intIdusuario;
    private $strUsuario;
    private $strPassword;
    private $strToken;

  public function __construct()
  { 

    parent::__construct();
  }
  public function loginUser(string $usuario, string $password)
  {
    //  $usuario='claudiaoso@gmail.com';
    //  $password='2580';
     $this->strUsuario = $usuario;
     $this->strPassword = $password;
     $sql = "SELECT persId, status  FROM personas WHERE 
     persEmail = '$this->strUsuario' AND
     persPass = '$this->strPassword' AND
     status != 0 ";
     
     $request = $this->select($sql);
     return $request;
     
  }
  public function sessionLogin(int $idUser){
    $this->intIdUsuario = $idUser;
    //BUSCAR ROLE 
    $sql = "SELECT p.persId,
            p.persIden,
            p.persNomb,
            p.persApel,
            p.persTele,
            p.persEmail,
            p.nit,
            p.persDireFisc,
            r.idrol,r.roleNomb,
            p.status 
        FROM personas p
        INNER JOIN roles r
        ON p.rolid = r.idrol
        WHERE p.persId = $this->intIdUsuario";
        $request = $this->select($sql);
       
    return $request;
  }
  public function getUserEmail(string $strEmail){
    $this->strUsuario = $strEmail;
    $sql = "SELECT  persId, persNomb, persApel, status FROM personas WHERE persEmail = '$this->strUsuario' AND
    status=1 ";
    $request = $this->select($sql);
    return $request;

  }
  public function setTokenUser(int $persId, string $token){
    $this->intIdusuario = $persId;
    $this->strToken = $token;
    $sql = "UPDATE personas SET persToke = ? WHERE persId = $this->intIdusuario ";
    $arrData = array($this->strToken);
    $request = $this->update($sql, $arrData);
    return $request;
  }

}
?>