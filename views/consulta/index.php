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

    <div id="">
        <h1 class="center">Ver categorías</h1>

        <table id="table1" align="center" border="4" style="width:auto; height:20px;" class="table table-condensed table-bordered table-hover">
            <thead>
                <tr> 
                    <th>#</th>
                    <th>Nombre categoria</th>
                    <th>Fecha creación</th>
                    <th>Estado</th>
                    <th>Operación</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once 'models/categorias.php';
                    foreach($this->categorias as $row){
                        $categorias = new Categorias();
                        $categorias = $row; 
                ?>
                <tr>
                    <td><?php echo $categorias->cateId; ?></td>
                    <td><?php echo $categorias->cateNomb; ?></td>
                    <td><?php echo $categorias->cateFech; ?></td>
                    <td><?php echo $categorias->cateInact; ?></td>
                    <td>
                    <button type="button" class="btn btn-primary">Editar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>

                <?php } ?>
            </tbody>
        </table>
        
    </div>

    <?php require 'views/footer.php'; ?>
</body>
</html>