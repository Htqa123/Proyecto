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
  <div style="background:blue" class="center"><?php echo $this->mensaje; ?></div>
  <div id="main-2" align="center" class="form-control">


    <table id="table1" align="center" border="4" style="width:auto; height:20px;" class="table table-condensed table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Categorías</th>
          <th>Referencias</th>
          <th>Medidas</th>
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
            <td><?php echo $productos->prodMedi; ?></td>
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

                <option value="prodCate">Seleccione Categoria:</option>
                <?php
                      include_once 'models/categoriasModel.php';
                      $instanciaCategorias = new categoriasModel();
                      $objetoCate = $instanciaCategorias->consulta_categorias();
                      foreach ($objetoCate as $p) { ?>
                      <option value="<?php echo $p->cateId; ?>"><?php echo $p->cateNomb; ?></option> 
                     
              <?php } ?> 
              </select>
            </div>

            <div class="form-group">
              <label for="prodRefe">Nombre de la Referencia:</label><br>
              <select class="custom-select" id="prodRefe" name="prodRefe">

                <option value="prodRefe">Seleccione Referencia:</option>
                <?php
                      include_once 'models/referenciasModel.php';
                      $instanciaReferencias = new referenciasModel();
                      $objetoReferencias = $instanciaReferencias->consulta_referencia();
                      foreach ($objetoReferencias as $p) { ?>
                      <option value="<?php echo $p->refeId; ?>"><?php echo $p->refeNomb; ?></option> 
             
              <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label for="prodRefe">Medida:</label><br>
              <select class="custom-select" id="prodMedi" name="prodMedi">

                <option value="prodMedi">Seleccione Referencia:</option>
                <?php
                      include_once 'models/medidasModel.php';
                      $instanciaMedidas = new medidasModel();
                      $objetoMedidas = $instanciaMedidas->consulta_medidas();
                      foreach ($objetoMedidas as $p) { ?>
                      <option value="<?php echo $p->mediId; ?>"><?php echo $p->mediNomb; ?></option> 
             
              <?php } ?>
              </select>
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