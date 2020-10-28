<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SISO</title>
</head>
<body>
    <?php require 'views/header.php'; ?>

    <div id="main" style="text-align: center;">
        <h1 class="center">Bienvenido al sitio</h1>
        <form class="form-inline my-2 my-lg-0" action="<?php echo constant('URL') ?>categoriasModel/filtrarCategorias" method="GET">
             <input class="form-control mr-sm-2" type="search" name="cateNomb" id="cateNomb" placeholder="" aria-label="Search">
             <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
        <table id="table1" align="center" border="4" style="width:auto; height:20px;" class="table table-condensed table-bordered table-hover">
            <thead>
                <tr> 
                    <th>codigo</th>
                    <th>Nombre categoria</th>
                    <th>Fecha creación</th>
                    <th>Descripción</th>
                    <th>Operación</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once 'models/categoriasModel.php';
                    $instanciaCategorias = new categoriasModel();
                    $objetoCate = $instanciaCategorias->filtrarCategorias();

                    foreach($objetoCate as $row){
                ?>
                <tr>
                    <td><?php echo $row->cateCodi; ?></td>
                    <td><?php echo $row->cateNomb; ?></td>
                    <td><?php echo $row->cateFech; ?></td>
                    <td><?php echo $row->cateDesc; ?></td>
                    <td>
                    <button type="button" class="btn btn-primary">Editar</button>
                    <!-- <button type="button" class="btn btn-danger">Eliminar</button> -->
                    </td>
                </tr>

                <?php } ?>
            </tbody>
        </table>

        <!-- <form id="login1" action="/action_page.php">
            <div class="form-group">
                <label for="fname">   Usuario:</label>
                <input type="text" id="fname" name="fname" value="">
            </div>

            <div class="form-group">
                <label for="lname">Password:</label>
                <input type="text" id="lname" name="lname" value="">
            </div>
             <div class="form-group">
               <input type="submit" value="Submit">
             </div>
       </form> -->

    </div>
   
    <?php require 'views/footer.php'; ?>
</body>
</html>