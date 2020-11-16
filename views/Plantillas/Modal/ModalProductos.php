
<div class="modal fade" id="ModalProductos" name="ModalProductos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
        <form id="formProductos" name="formProductos">
            <input type="hidden" id="idproductos" name="idproductos" class="form-horizontal" value="">
            <p class="text-primary">Todos los campos son obligatorios.</p>
             
             <div class="form-row">
              <div class="form-group col-md-6">
                     <label for="listProd">Categoía</label>
                     <select class="form-control" data-live-search="true"  id="listProd"  name="listProd"  required> 
                     </select>
                 </div>
                 <div class="form-group col-md-6">
                     <label for="txtprodNomb">Nombre producto</label>
                     <input type="text" class="form-control" id="txtprodNomb" name="txtprodNomb" required="">
                 </div>
             </div>

             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="txtprodPrec">Precio</label>
                     <input type="text" class="form-control" id="txtprodPrec" name="txtprodPrec" required="">
                 </div>
                 <div class="form-group col-md-6">
                     <label for="txtprodMode">Detalle</label>
                     <input type="text" class="form-control" id="txtprodMode" name="txtprodMode" required="">
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="txtprodMarc">Marca</label>
                     <input type="text" class="form-control" id="txtprodMarc" name="txtprodMarc" required="">
                 </div>
                 <div class="form-group col-md-6">
                     <label for="txtprodStock">Cantidad</label>
                     <input type="text" class="form-control" id="txtprodStock" name="txtprodStock" required="">
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="listNitProv">Nit proveedor</label>
                     <select class="form-control" data-live-search="true"  id="listNitProv"  name="listNitProv"  required> 
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



<div class="modal fade" id="ModalViewUser"  tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header primary" style="background-color:#009688">
        <h5 class="modal-title" id="titleModal">Datos del usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
       <table class="teble table-bordered">
        <tbody>
            <tr>
                <td>Identificacion</td>
                <td id=celIdentificacion></td>
            </tr>
            <tr>
               <td>Nombres</td>
                <td id=celNombres></td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td id=celApellidos></td>
            </tr>
            <tr>
                <td>Teléfono</td>
                <td id=celTelefono></td>
            </tr>
            <tr>
                <td>Email</td>
                <td id=celEmail></td>
            </tr>
            <tr>
                <td>Tipo usuario</td>
                <td id=celTipoUsuario></td>
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