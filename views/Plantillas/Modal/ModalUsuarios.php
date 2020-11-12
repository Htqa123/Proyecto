
<div class="modal fade" id="ModalUsuarios" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
        <form id="formUsuarios" name="formUsuarios">
            <input type="hidden" id="idUsuario" name="idUsuario" class="form-horizontal" value="">
            <p class="text-primary">Todos los campos son obligatorios.</p>
             
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="txtIdentificacion">Identificacion</label>
                     <input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion" required="">
                 </div>
             </div>

             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="txtNombre">Nombre</label>
                     <input type="text" class="form-control" id="txtNombre" name="txtNombre" required="">
                 </div>
                 <div class="form-group col-md-6">
                     <label for="txtApellido">Apellidos</label>
                     <input type="text" class="form-control" id="txtApellido" name="txtApellido" required="">
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="txtTelefono">Teléfono</label>
                     <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" required="">
                 </div>
                 <div class="form-group col-md-6">
                     <label for="txtEmail">Email</label>
                     <input type="email" class="form-control" id="txtEmail" name="txtEmail" required="">
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="listRolid">Tipo usuarios</label>
                     <select class="form-control" data-live-search="true"  name="listRolid" id="listRolid" required>
                     <option value=""></option>
                     </select>
                 </div>
                 <div class="form-group col-md-6">
                     <label for="listStatus">Status</label>
                     <select class="form-control" class="selectpicker" data-style="btn-success"  id="listStatus" name="listStatus" required>
                         <option value="1">Activo</option>
                         <option value="2">Inactivo</option>
                     </select>
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="txtPassword">Password</label>
                     <input type="password" class="form-control" id="txtPassword" name="txtPassword" required="">
                 </div>
             </div>
             
            <div class="tile-footer">
            <button class="btn btn-primary" id="btnActionForm" type="submit">
                <span id="btnText">Guardar</span>
            </button>
            <button class="btn btn-secondary" data-dismiss="modal" type="submit">Cancelar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>