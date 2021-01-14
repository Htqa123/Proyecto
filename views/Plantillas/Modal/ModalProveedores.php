
<div class="modal fade" id="ModalProveedor" name="ModalProveedor" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
        <form id="formProveedor" name="formProveedor">
            <input type="hidden" id="idproveedor" name="idproveedor" class="form-horizontal" value="">
            <p class="text-primary">Todos los campos son obligatorios.</p>
             
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="txtprovNit">Nit proveedor</label>
                     <input type="text" class="form-control" id="txtprovNit" name="txtprovNit" required="">
                 </div>
                 <div class="form-group col-md-6">
                     <label for="txtprovNomb">Nombre proveedor</label>
                     <input type="text" class="form-control" id="txtprovNomb" name="txtprovNomb" required="">
                 </div>
             </div>

             <div class="form-row">       
                 <div class="form-group col-md-6">
                     <label for="txtprovDire">Dirección</label>
                     <input type="text" class="form-control" id="txtprovDire" name="txtprovDire" required="">
                 </div>
                 <div class="form-group col-md-6">
                     <label for="txtprovTele">Teléfono</label>
                     <input type="text" class="form-control" id="txtprovTele" name="txtprovTele" required="">
                 </div>
             </div>
             <div class="form-row">
                 
                 <div class="form-group col-md-6">
                     <label for="txtprovEmail">Email</label>
                     <input type="email" class="form-control" id="txtprovEmail" name="txtprovEmail" required="">
                 </div>
                 <div class="form-group col-md-6">
                     <label for="listStatus">Status</label>
                     <select class="form-control" class="selectpicker" data-style="btn-success"  id="listStatus" name="listStatus" required>
                         <option value="1">Activo</option>
                         <option value="2">Inactivo</option>
                     </select>
                 </div>
             </div>
                 
             <div class="form-group">
                    <label for="control-label">Descripción del proveedor</label>
                    <textarea class="form-control" id="txtprovDeta" name="txtprovDeta" rows="2" placeholder="Descripción del proveedor" required=""></textarea>
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



<div class="modal fade" id="ModalViewProveedor"  tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header primary" style="background-color:#009688">
        <h5 class="modal-title" id="titleModal">Datos del proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
       <table class="table table-bordered">
        <tbody>
            <tr>
                <td>Nit del proveedor</td>
                <td id=celprovNit></td>
            </tr>
            <tr>
               <td>Nombre proveedor</td>
                <td id=celprovNomb></td>
            </tr>
            <tr>
                <td>Dirección</td>
                <td id=celprovDire></td>
            </tr>
            <tr>
                <td>Teléfono</td>
                <td id=celprovTele></td>
            </tr>
            <tr>
                <td>Email</td>
                <td id=celprovEmail></td>
            </tr>
            <tr>
                <td>Detalle proveedor</td>
                <td id=celprovDeta></td>
            </tr>
            <tr>
                <td>Estado</td>
                <td id=celEstado></td>
            </tr>
            <tr>
                <td>Fech registro</td>
                <td id=celFechaRegistro></td>
            </tr>
        </tbody>
       </table>
      </div>
    <div class="modal-footer">
    <button class="btn btn-secondary" data-dismiss="modal" type="button">Cerrar</button>
    </div>
  </div>
</div>
</div>