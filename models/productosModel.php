<?php

    class ProductosModel extends Mysql
	{
		public $intIdcate;
		public $strcateNomb;
		public $strcateDesc;
		public $strcateFech;
		public $intStatus;
		
		public function __construct()
		{
			parent::__construct();
		}

		 public function selectCategorias()
		 {
		 	$sql = "SELECT * FROM categorias WHERE status != 0";
		 	$request = $this->select_all($sql);
	        
		 	return $request;
		 }

		 public function selectCategoria(int $cateCodi)
		 {
		 	$this->intIdcate = $cateCodi;
		 	$sql = "SELECT * FROM categorias WHERE cateCodi = $this->intIdcate";
		 	$request = $this->select($sql);
		 	return $request;

		 }

		 public function insertCategoria(string $cateNomb, string $cateDesc, int $status)
		 {
		 	$return = "";
		 	$this->strcateNomb = $cateNomb;
			$this->strcateDesc = $cateDesc;
		 	$this->intStatus = $status;

		 	$sql ="SELECT * FROM categorias WHERE cateNomb = '{$this->strcateNomb}' ";
		 	$request = $this->select_all($sql);

		 	if(empty($request))
		 	{

		 	$query_insert = "INSERT INTO categorias (cateNomb,cateDesc,status) VALUES(?,?,?)";
		 	$arrData =  array($this->strcateNomb, $this->strcateDesc, $this->intStatus);
		 	$request_insert = $this->insert($query_insert,$arrData);
		 	$return = $request_insert;
		    }else{
		    	$return = "exist";

		    }
		    return $return;
		 }


		 public function updateCategoria(int $cateCodi, string $cateNomb, string $cateDesc, int $status)
		 {
		 	$this->intIdcate = $cateCodi;
		 	$this->strcateNomb = $cateNomb;
			$this->strcateDesc = $cateDesc;
		 	$this->intStatus = $status;

		 	$sql ="SELECT * FROM categorias WHERE cateNomb = '$this->strcateNomb' AND cateCodi !=  $this->intIdcate ";
		 	$request = $this->select_all($sql);

		 	if(empty($request))
		 	{

		 	$sql = "UPDATE categorias SET cateNomb = ?, cateDesc = ?, status= ? WHERE cateCodi = $this->intIdcate";
		 	$arrData =  array($this->strcateNomb, $this->strcateDesc, $this->intStatus);
		 	$request = $this->update($sql,$arrData);
		    }else{
		    	$request = "exist";

		    }
		    return $request;
		 }

		 public function deleteRol(int $idrol)
		 {
		 	$this->intIdrol = $idrol;
		 	$sql = "SELECT * FROM categorias WHERE cateCodi = $this->intIdcate ";
		 	$request = $this->select_all($sql);
		 	if(empty($request)){
		 		$sql= "UPDATE categorias SET status = ? WHERE cateCodi = $this->intIdcate";
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