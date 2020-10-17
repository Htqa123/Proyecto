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
    <button type="button" id="Btn-modal" class="btn btn-success" onClick='mostrarModal()'>Nueva Producto</button>

  </div>
  <h1 class="center">Ver Producto</h1>
  <div id="main-2" align="center" class="form-control">


    <table id="table1" align="center" border="4" style="width:auto; height:20px;" class="table table-condensed table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre Categoría</th>
          <th>Nombre referencia</th>
          <th>Fecha creación</th>
          <th>Estado</th>
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
            <td><?php echo $productos->prodId; ?></td>
            <td><?php echo $productos->prodCate; ?></td>
            <td><?php echo $productos->prodRefe; ?></td>
            <td><?php echo $productos->prodFech; ?></td>
            <td><?php echo $productos->prodInact; ?></td>
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
          <h5 class="modal-title">Registro Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" id="form1" action="  <?php echo constant('URL'); ?>productos/registrarProductos" method="POST">

            <div class="form-group">
              <label for="prodCate">Nombre de la categoría:</label><br>
              <select class="custom-select input-lg" id="prodCate" name="prodCate">

                <option value="">Seleccione Categoria:</option>
                <?php
                      include_once 'models/categoriasModel.php';
                      $instanciamedidas = new categoriasModel();
                      $objetomedidas = $instanciamedidas->consulta_categorias();
                      foreach ($objetomedidas as $p) { ?>
                     <option value="cateNomb"><?php echo $p->cateNomb; ?></option> 
                     
              <?php } ?> 
              </select>
            </div>

            <div class="form-group">
              <label for="prodRefe">Nombre de la Referencia:</label><br>
              <select class="custom-select" id="prodRefe" name="prodRefe">

                <option value="mediId">Seleccione Referencia:</option>
                <?php
                      include_once 'models/referenciasModel.php';
                      $instanciareferencias = new referenciasModel();
                      $objetomedidas = $instanciareferencias->consulta_referencia();
                      foreach ($objetomedidas as $p) { ?>
             <option value="refeNomb"><?php echo $p->refeNomb; ?></option> 
             
              <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label for="prodMedi">Medida Producto:</label><br>
              <input type="text" name="prodMedi" id="prodMedi" required>
            </div>

            <div class="form-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Descripción</span>
                <textarea id="prodDesc" name="prodDesc" class="form-control" aria-label="With textarea"></textarea>
              </div>
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-default" value="Crear producto">
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
var cateId = $("#cateNomb").val();
console.log(cateNomb);

//Puedes capturar el texto seleccionado
var prodCate = $("select option:selected").text();

//Y asignar el texto al input
$("#prodCate").val(cateId);

});
</script>

</html>