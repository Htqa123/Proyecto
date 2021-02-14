<?php 
class DashBoardModel extends Mysql
{
  public function __construct()
  {
    parent::__construct();
  }
  public function selectUsuarios()
  {
    $sql ="SELECT COUNT(*)  FROM personas ";
    $request = $this->select_all($sql);
    return $request;
    //dep($request);
  }


}
?>