<?php

class PermisosModel extends Mysql
{
    public $intIdpermiso;
    public $intRolid;
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
}
?>