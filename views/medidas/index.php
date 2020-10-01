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
<button type="button" id="Btn-modal" class="btn btn-success" onClick='mostrarModal()'>Nueva Medida</button>

</div>
<h1 class="center">Ver Medidas</h1>
    <div id="main-2" class="form-control" align="center">
        
       
        <table id="table1" align="center" border="4" style="width:auto; height:20px;" class="table table-condensed table-bordered table-hover">
            <thead>
                <tr> 
                    <th>#</th>
                    <th>Medidas</th>
                    <th>Descripción</th>
                    <th>Fecha de creación</th>
                    <th>Estado</th>
                    <th>Operación</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once 'models/medida.php';
                    foreach($this->medidas as $row){
                        $medidas = new medidas();
                        $medidas = $row; 
                ?>
                <tr>
                    <td><?php echo $medidas->mediId; ?></td>
                    <td><?php echo $medidas->mediNomb; ?></td>
                    <td><?php echo $medidas->mediDesc; ?></td>
                    <td><?php echo $medidas->mediFech; ?></td>
                    <td><?php echo $medidas->mediInact; ?></td>
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
        <h5 class="modal-title">Ingrese la medida</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="form1" action=" <?php echo constant('URL'); ?>medidas/registrarMedidas" method="POST">
           
            <div class="form-group"> 
                <label for="mediNomb">Nombre de la medida</label><br>
                <input type="text" name="mediNomb" id="mediNomb" required>
            </div>

            <div class="form-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Descripción</span>
             <textarea id="mediDesc" neme="mediDesc" class="form-control" aria-label="With textarea"></textarea>
             </div>
            </div>

            <div class="form-group">
            <input type="submit" class="btn btn-default" value="Crear medida">
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
