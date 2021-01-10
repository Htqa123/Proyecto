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
     $this->strUsuario = $usuario;
     $this->strPassword = $password;
     $sql = "SELECT persId, status  FROM personas WHERE 
     persEmail = '$this->strUsuario' AND
     persPass = '$this->strPassword' AND
     status != 0 ";
     
     $request = $this->select($sql);
     return $request;
  }

}
?>