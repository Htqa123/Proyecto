<?php  

    function base_url()
    {
    	return BASE_URL;
    }
    function media()
    {
      return BASE_URL."Public/";
    }

    function headerAdmin($data="")
    {
      $view_header = "Views/Plantillas/header_admin.php";
      require_once ($view_header);
    }

    function footerAdmin($data="")
    {
      $view_footer = "Views/Plantillas/footer_admin.php";
      require_once ($view_footer);
    }
    function navAdmin($data="")
    {
      $view_nav = "Views/Plantillas/nav_admin.php";
      require_once ($view_nav);
    }

    function getModal(string $nameModal, $data)
    {
      $view_modal = "Views/Plantillas/Modal/{$nameModal}.php";
      require_once ($view_modal);
    }
    function sendEmail($data,$template)
    {
        $asunto = $data['asunto'];
        $emailDestino = $data['email'];
        $empresa = NOMBRE_REMITENTE;
        $remitente = EMAIL_REMITENTE;
        //ENVIO DE CORREO
        $de = "MIME-Version: 1.0\r\n";
        $de .= "Content-type: text/html; charset=UTF-8\r\n";
        $de .= "From: {$empresa} <{$remitente}>\r\n";
        ob_start();
        require_once("Views/Template/Email/".$template.".php");
        $mensaje = ob_get_clean();
        $send = mail($emailDestino, $asunto, $mensaje, $de);
        return $send;
    }

    function getPermisos(int $idmodulo){
        require_once ("Models/PermisosModel.php");
        $objPermisos = new PermisosModel();
        $idrol = $_SESSION['userData']['idrol'];
        $arrPermisos = $objPermisos->permisosModulo($idrol);
        $permisos = '';
        $permisosMod = '';
        if(count($arrPermisos) > 0 ){
            $permisos = $arrPermisos;
            $permisosMod = isset($arrPermisos[$idmodulo]) ? $arrPermisos[$idmodulo] : "";
        }
        $_SESSION['permisos'] = $permisos;
        $_SESSION['permisosMod'] = $permisosMod;
    }

    function sessionUser(int $idpersona){
        require_once ("Models/LoginModel.php");
        $objLogin = new LoginModel();
        $request = $objLogin->sessionLogin($idpersona);
        return $request;
    }

    function dep($data)
    {
    	$format = print_r('<pre>');
    	$format .=print_r($data);
    	$format .=print_r('</pre>');
    	return $format;
    }
    function sendEmail($data,$template)
    {
        $asunto = $data['asunto'];
        $emailDestino = $data['email'];
        $empresa = NOMBRE_REMITENTE;
        $remitente = EMAIL_REMITENTE;
        //ENVIO DE CORREO
        $de = "MIME-Version: 1.0\r\n";
        $de .= "Content-type: text/html; charset=UTF-8\r\n";
        $de .= "From: {$empresa} <{$remitente}>\r\n";
        ob_start();
        require_once("Views/Template/Email/".$template.".php");
        $mensaje = ob_get_clean();
        $send = mail($emailDestino, $asunto, $mensaje, $de);
        return $send;
    }

    function getPermisos(int $idmodulo){
        require_once ("Models/PermisosModel.php");
        $objPermisos = new PermisosModel();
        $idrol = $_SESSION['userData']['idrol'];
        $arrPermisos = $objPermisos->permisosModulo($idrol);
        $permisos = '';
        $permisosMod = '';
        if(count($arrPermisos) > 0 ){
            $permisos = $arrPermisos;
            $permisosMod = isset($arrPermisos[$idmodulo]) ? $arrPermisos[$idmodulo] : "";
        }
        $_SESSION['permisos'] = $permisos;
        $_SESSION['permisosMod'] = $permisosMod;
    }

    function sessionUser(int $idpersona){
        require_once ("Models/LoginModel.php");
        $objLogin = new LoginModel();
        $request = $objLogin->sessionLogin($idpersona);
        return $request;
    }

    function uploadImage(array $data, string $name){
        $url_temp = $data['tmp_name'];
        $destino    = 'Assets/images/uploads/'.$name;        
        $move = move_uploaded_file($url_temp, $destino);
        return $move;
    }

    function deleteFile(string $name){
        unlink('Assets/images/uploads/'.$name);
    }


    function strClean($strcadena)
    {
    	  $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strcadena);
        $string = trim($string);
        $string =stripslashes($string);
        $string =str_ireplace("<script>", "", $string);
        $string =str_ireplace("</script>", "", $string);
        $string =str_ireplace("<script src>", "", $string);
        $string =str_ireplace("<script tupe=>", "", $string);
        $string =str_ireplace("SELECT * FROM", "", $string);
        $string =str_ireplace("DELETE FROM", "", $string);
        $string =str_ireplace("INSERT INTO", "", $string);
        $string =str_ireplace("SELECT COUNT(*) FROM", "", $string);
        $string =str_ireplace("DROP TABLE", "", $string);
        $string =str_ireplace("OR '1'='1", "", $string);
        $string =str_ireplace('OR "1"="1"', "", $string);
        $string =str_ireplace('OR ´1´=´1´', "", $string);
        $string =str_ireplace("is NULL; --", "", $string);
        $string =str_ireplace("is NULL; --", "", $string);
        $string =str_ireplace("LIKE '", "", $string);
        $string =str_ireplace('LIKE "', "", $string);
        $string =str_ireplace("LIKE ´", "", $string);
        $string =str_ireplace("OR 'a'='a", "", $string);
        $string =str_ireplace('OR "a"="a', "", $string);
        $string =str_ireplace("OR ´a´=´a", "", $string);
        $string =str_ireplace("--", "", $string);
        $string =str_ireplace("^", "", $string);
        $string =str_ireplace("[", "", $string);
        $string =str_ireplace("]", "", $string);
        $string =str_ireplace("==", "", $string);
        return $string;
    }

    function passGenerator($Length = 10)
    {
    	$pass ="";
    	$longitudPass = $Length;
    	$cadena = "ABCDEFGHIJKLMNÑOPQRSTWVXYZabcdefghijklmnñopqrstwvxyz1234567890";
    	$logitudCadena = strlen($cadena);
    	for($i =1; $i<=$longitudPass; $i++)
    	{
          $pos = rand(0,$logitudCadena-1);
          $pass .=substr($cadena, $pos, 1);
    	}
    	return $pass;
    }
     function token()
     {
     	$r1 = bin2hex(random_bytes(10));
     	$r2 = bin2hex(random_bytes(10));
     	$r3 = bin2hex(random_bytes(10));
     	$r4 = bin2hex(random_bytes(10));
     	$token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
     	return $token;
     }
     function formatMoney($cantidad)
     {
     	$cantidad = number_format($cantidad,2, SPD,SPM);
     	return $cantidad;
     }

?>