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
    

    <!-- <div id="main">
        <h1 class="center">Crear categorías</h1>

        <div class="center"><?php echo $this->mensaje; ?></div>

        <form class="form-horizontal" id="form1" action="  <?php echo constant('URL'); ?>nuevo/registrarCategorias" method="POST">

            <div class="form-group"> 
                <label for="cateNomb">Nombre de la categoría</label><br>
                <input type="text" name="cateNomb" id="" required>
            </div>
            
            <div class="form-group">
            <input type="submit" class="btn btn-default" value="Crear categoría">
            </div>

        </form>
    </div> -->
    
 
</div>
<div class="form-control">
<button type="button" id="Btn-modal" class="btn btn-success" onClick='mostrarModal()'>Nueva Categoría</button>

</div>
<h1 class="center">Ver categorías</h1>
    <div id="main-2" align="center" class="form-control">
        
       
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
                    include_once 'models/categoria.php';
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
</div>

     <?php require 'views/footer.php'; ?>
     <div class="modal" tabindex="-1" id="ventana-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ingrese la categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="form1" action="  <?php echo constant('URL'); ?>categorias/registrarCategorias" method="POST">

            <div class="form-group"> 
                <label for="cateNomb">Nombre de la categoría</label><br>
                <input type="text" name="cateNomb" id="" required>
            </div>
            
            <div class="form-group">
            <input type="submit" class="btn btn-default" value="Crear categoría">
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        
      </div>
    </div>
  </div>
</div>
    
</body>

</html>
