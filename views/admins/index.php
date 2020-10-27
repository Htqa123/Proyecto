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
<button type="button" id="Btn-modal" class="btn btn-success" onClick='mostrarModal()'>Nuevo administrador</button>

</div>
<h1 class="center">Ver administradores</h1>
<div style="background:blue" class="center"><?php echo $this->mensaje; ?></div>
    <div id="main-2" class="form-control" align="center">
        
       
        <table id="table1" align="center" border="4" style="width:auto; height:20px;" class="table table-condensed table-bordered table-hover">
            <thead>
                <tr> 
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Contraseña</th>
                    <th>Operación</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once 'models/admin.php';
                    foreach($this->admins as $row){
                        $admins = new Admin();
                        $admins = $row; 
                ?>
                <tr>
                    <td><?php echo $admins->admiNomb; ?></td>
                    <td><?php echo $admins->admiFech; ?></td>
                    <td><?php echo $admins->admiClav; ?></td>
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
        <h5 class="modal-title">Ingrese Administrador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="form1" action=" <?php echo constant('URL'); ?>admins/registrar_Admins" method="POST">
           
            <div class="form-group"> 
                <label for="admiNomb">Nombre</label><br>
                <input type="text" name="admiNomb" id="admiNomb" required>
            </div>


            <div class="form-group"> 
                <label for="admiClav">Passwor</label><br>
                <input type="text" name="admiClav" id="admiClav" required>
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

</html>
