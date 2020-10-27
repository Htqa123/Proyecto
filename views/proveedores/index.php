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


  </div>
  <div class="form-control">
    <button type="button" id="Btn-modal" class="btn btn-success" onClick='mostrarModal()'>Nuevo Proveedor</button>

  </div>
  <h1 class="center">Ver Proveedores</h1>
  <div id="main-2" class="form-control" class="aling-item-righ" align="center">


    <table id="table1" align="righ" border="4" style="width:auto; height:20px;" class="table table-condensed table-bordered table-hover">
      <thead>
        <tr>
          <th>Nit</th>
          <th>Nombre</th>
          <th>Fecha</th>
          <th>Dirección</th>
          <th>Teléfono</th>
          <th>Pagina</th>
          <th>Operación</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once 'models/proveedor.php';
        foreach ($this->proveedores as $row) {
          $proveedores = new Proveedores();
          $proveedores = $row;
        ?>
          <tr>
            <td><?php echo $proveedores->provNit; ?></td>
            <td><?php echo $proveedores->provNomb;?></td>
            <td><?php echo $proveedores->provFech; ?></td>  
            <td><?php echo $proveedores->provDire; ?></td>
            <td><?php echo $proveedores->provTele; ?></td>
            <td><?php echo $proveedores->provPagi; ?></td>
            <td>
              <button type="button" class="btn btn-primary">Editar</button>
              <!-- <button type="button" class="btn btn-danger">Eliminar</button> -->
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
          <h5 class="modal-title">Nuevo Proveedor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" id="form1" action="<?php echo constant('URL'); ?>proveedores/registrarProveedores" method="POST">

            <div class="form-group">
              <label for="refeNomb">Nit Proveedor:</label><br>
              <input type="text" style="height:35px" name="provNit" id="provNit" required>
            </div>

            <div class="form-group">
              <label for="refeNomb">Nombre:</label><br>
              <input type="text" style="height:35px"  name="provNomb" id="provNomb" required>
            </div>

            <div class="form-group">
              <label for="refeNomb">Dirección:</label><br>
              <input type="text" style="height:35px" name="provDire" id="provDire" required>
            </div>

            <div class="form-group">
              <label for="refeNomb">Teléfono:</label><br>
              <input type="text" style="height:35px" name="provTele" id="provTele" required>
            </div>

            <div class="form-group">
              <label for="refeNomb">Página Web:</label><br>
              <input type="text" style="height:35px" name="provPagi" id="provPagi" required>
            </div>
 
            <br>
            <div class="form-group">
              <input type="submit" class="btn btn-default" value="Guardar">
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