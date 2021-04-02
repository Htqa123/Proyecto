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
  public function sessionLogin(int $iduser){
    $this->intIdUsuario = $iduser;
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
        FROM persons p
        INNER JOIN roles r
        ON p.rolid = r.idrol
        WHERE p.persId = $this->intIdUsuario";
        $request = $this->select($sql);
        $_SESSION['userData'] = $request;
    return $request;
  }

}
?>