<?php

    class RolesModel extends Mysql
	{
		public $intIdrol;
		public $strRol;
		public $strDescripcion;
		public $intStatus;
		
		public function __construct()
		{
			parent::__construct();
		}

		 public function selectRoles()
		 {
		 	$sql = "SELECT * FROM roles WHERE status != 0";
		 	$request = $this->select_all($sql);
	        
		 	return $request;
		 }

		 public function selectRol(int $roleId)
		 {
		 	$this->intIdrol = $roleId;
		 	$sql = "SELECT * FROM roles WHERE roleId = $this->intIdrol";
		 	$request = $this->select($sql);
		 	return $request;

		 }

		 public function insertRol(string $rol, string $descripcion, int $status)
		 {
		 	$return = "";
		 	$this->strRol = $rol;
		 	$this->strDescripcion = $descripcion;
		 	$this->intStatus = $status;

		 	$sql ="SELECT * FROM roles WHERE roleNomb = '{$this->strRol}' ";
		 	$request = $this->select_all($sql);

		 	if(empty($request))
		 	{

		 	$query_insert = "INSERT INTO roles (roleNomb,roleDesc,status) VALUES(?,?,?)";
		 	$arrData =  array($this->strRol, $this->strDescripcion, $this->intStatus);
		 	$request_insert = $this->insert($query_insert,$arrData);
		 	$return = $request_insert;
		    }else{
		    	$return = "exist";

		    }
		    return $return;
		 }

		 public function updateRol(int $idrol, string $rol, string $descripcion, int $status)
		 {
		 	$this->intIdrol = $idrol;
		 	$this->strRol = $rol;
		 	$this->strDescripcion = $descripcion;
		 	$this->intStatus = $status;

		 	$sql ="SELECT * FROM roles WHERE roleNomb = '$this->strRol' AND roleId !=  $this->intIdrol ";
		 	$request = $this->select_all($sql);

		 	if(empty($request))
		 	{

		 	$sql = "UPDATE roles SET roleNomb = ?, roleDesc = ?, status= ? WHERE roleId = $this->intIdrol";
		 	$arrData =  array($this->strRol, $this->strDescripcion, $this->intStatus);
		 	$request = $this->update($sql,$arrData);
		    }else{
		    	$request = "exist";

		    }
		    return $request;
		 }

		 public function deleteRol(int $roleId)
		 {
		 	$this->intIdrol = $roleId;
		 	$sql = "SELECT * FROM personas WHERE persRolId = $this->intIdrol ";
		 	$request = $this->select_all($sql);
		 	if(empty($request)){
		 		$sql= "UPDATE roles SET status = ? WHERE roleId = $this->intIdrol";
		 		$arrData = array(0);
		 		$request = $this->update($sql, $arrData);
		 		if($request){
		 			$request = 'ok';
		 		}else{
		 			$request = 'error';
		 		}
		 	}else{
		 		$request = 'exist';
		 	}
		 	return $request;
		 }	
	}

?>