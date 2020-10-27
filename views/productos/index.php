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
    <button type="button" id="Btn-modal" class="btn btn-success" onClick='mostrarModal()'>Nuevo Producto</button>

  </div>
  <h1 class="center">Ver Producto</h1>
  <div style="background:blue" class="center"><?php echo $this->mensaje; ?></div>
  <div id="main-2" align="center" class="form-control">


    <table id="table1" align="center" border="4" style="width:auto; height:20px;" class="table table-condensed table-bordered table-hover">
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Producto</th>
          <th>Categoria</th>
          <th>Detalle</th>
          <th>Marca</th>
          <th>Stock</th>
          <th>Operación</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once 'models/producto.php';
        foreach ($this->productos as $row) {
          $producto = new productos();
          $productos = $row;
        ?>
          <tr>
            <td><?php echo $productos->prodCodi; ?></td>
            <td><?php echo $productos->prodNomb; ?></td>
            <td><?php echo $productos->prodCodiCant; ?></td>
            <td><?php echo $productos->prodMode; ?></td>
            <td><?php echo $productos->prodMarc; ?></td>
            <td><?php echo $productos->prodStock; ?></td>
            
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
          <h5 class="modal-title">Registro Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" id="form1" action="<?php echo constant('URL'); ?>productos/registrarProductos" method="POST">
           
          <div class="form-group"> 
                <label for="prodCodi">Código Producto</label><br>
                <input type="text"  name="prodCodi" id="prodCodi" required>
            </div>
          

            <div class="form-group">
              <label for="prodCodiCant">Categorías:</label><br>
              <select class="custom-select" id="prodCodiCant" name="prodCodiCant">

                <option value="cateCodi">Seleccione Categoria:</option>
                <?php
                      include_once 'models/categoriasModel.php';
                      $instanciaCategorias = new categoriasModel();
                      $objetoCate = $instanciaCategorias->consulta_categorias();
                      foreach ($objetoCate as $p) { ?>
                      <option value="<?php echo $p->cateCodi; ?>"><?php echo $p->cateNomb; ?></option> 
                     
              <?php } ?> 
              </select>
            </div>

            <div class="form-group"> 
                <label for="prodNomb">Nombre Producto</label><br>
                <input type="text" name="prodNomb" id="prodNomb" required>
            </div>
            <div class="form-group"> 
                <label for="prodPrec">Precio</label><br>
                <input type="text" name="prodPrec" id="prodPrec" required>
            </div>
            <div class="form-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Detalle</span>
                <textarea id="prodMode" name="prodMode" class="form-control" aria-label="With textarea"></textarea>
              </div>
            </div>
            <div class="form-group"> 
                <label for="prodMarc">Marca</label><br>
                <input type="text" name="prodMarc" id="prodMarc" required>
            </div>
            <div class="form-group"> 
                <label for="prodStock">Unidades Disponibles</label><br>
                <input type="text" name="prodStock" id="prodStock" required>
            </div>


            <div class="form-group">
              <label for="prodNitProv">Proveedor:</label><br>
              <select class="custom-select" id="prodNitProv" name="prodNitProv">

                <option value="prodFech">Seleccione Proveedor:</option>
                <?php
                      include_once 'models/proveedoresModel.php';
                      $instanciaProv = new proveedoresModel();
                      $objetoProv = $instanciaProv->consulta_proveedores();
                      foreach ($objetoProv as $p) { ?>
                      <option value="<?php echo $p->provNit; ?>"><?php echo $p->provNomb; ?></option> 
             
              <?php } ?>
              </select>
            </div>

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
<script>
  
  //Cuando se hace la selección
$("select").change(function(){

//Normalmente se envía el value del select
var cateCodi = $("#cateNomb").val();
console.log(cateNomb);

//Puedes capturar el texto seleccionado
var prodCodiCant = $("select option:selected").text();

//Y asignar el texto al input
$("#prodCodiCant").val(cateCodi);

});
</script>

</html>