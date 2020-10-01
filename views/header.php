<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SISO</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/login.css">
    
   
</head>
<body>
    
    <!-- <div id="header">
        <ul>
            <li><a href="<?php echo constant('URL'); ?>main">Inicio</a></li>
            <li><a href="<?php echo constant('URL'); ?>nuevo">Nuevo</a></li>
            <li><a href="<?php echo constant('URL'); ?>consulta">Consulta</a></li>
            <li><a href="<?php echo constant('URL'); ?>ayuda">Ayuda</a></li>
        
            <li class="right menu">
                <a class="item">Login</a>
                <a class="item">Registrarse</a>
           </li>
            
            
        </ul>
    </div> -->
<nav class="navbar navbar-expand-lg navbar-light"  >
  <a class="navbar-brand" href="<?php echo constant('URL'); ?>main">SISO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Configuración
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo constant('URL'); ?>categorias">Categorias</a>
          <a class="dropdown-item" href="<?php echo constant('URL'); ?>referencias">Referencias</a>
          <a class="dropdown-item" href="<?php echo constant('URL'); ?>medidas">Medidas</a>
          <a class="dropdown-item" href="<?php echo constant('URL'); ?>productos">Productos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Inventarios</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ventas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo constant('URL'); ?>categorias">Consultas</a>
          <a class="dropdown-item" href="#">Nuevo</a>
          <a class="dropdown-item" href="#">Reporte diario</a>
          <a class="dropdown-item" href="#">Reporte mensual</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Clientes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo constant('URL'); ?>categorias">Consultas</a>
          <a class="dropdown-item" href="#">Crear clientes</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Proveedores
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo constant('URL'); ?>categorias">Consulta</a>
          <a class="dropdown-item" href="#">Creae proveedores</a>
        </div>
      </li>
      
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>
    <script src="<?php echo constant('URL'); ?>public/js/jquery-3.5.1.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/bootstrap.min.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/bootstrap.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/app.js"></script> 
</body>
</html>