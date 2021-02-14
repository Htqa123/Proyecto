<?php


class PermisosModel extends Mysql
{
    public $permId;
    public $introlid;
    public $intmoduloid;
    public $r;
    public $w;
    public $u;
    public $d;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectModulos()
    {
        $sql = "SELECT * FROM modulos WHERE status != 0 ";
        $request = $this->select_all($sql);
        return $request;
    }
    public function selectPermisosRol( int $roleId)
    {
        $this->intRolid = $roleId;
        $sql ="SELECT * FROM permisos WHERE rolid = $this->intRolid";
        $request = $this->select_all($sql);
        return $request;
    }
}
?>