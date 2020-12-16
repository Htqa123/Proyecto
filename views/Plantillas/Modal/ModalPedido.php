
<div class="modal fade" id="ModalPedidos" name="ModalPedidos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Agregar al carrito</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
      <table class="table table-hover  table-bordered" id="">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Producto</th> 
                  <th>Precio</th>
                  <th>Cantidad</th>
                </tr>
            </thead>
              <tbody>      
              </tbody>
        </table>
      </div>
    </div>
  </div>
</div>






<div class="modal fade" id="ModalAgregar" name="ModalAgregar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Agregar al carrito</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
        <form id="formPedidos" name="formPedidos">
            <input type="hidden" id="idproductos" name="idproductos" class="form-horizontal" value="">
            <p class="text-primary">Desea agregar el producto</p>
             
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="txtprodNomb"></label>
                     <input type="hidden" class="form-control" id="txtprodNomb" name="txtprodNomb">
                 </div>
             </div>

             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="txtprodPrec"></label>
                     <input type="hidden" class="form-control" id="txtprodPrec" name="txtprodPrec">
                 </div>
             </div>
             <div class="form-row">
                
                 <div class="form-group col-md-6">
                     <label for="txtprodStock"></label>
                     <input type="hidden" class="form-control" id="txtprodStock" name="txtprodStock">
                 </div>
                 <div class="form-group col-md-6">
                     <label for="txtprodMode">Ingrese cantidad</label>
                     <input type="num" class="form-control" id="txtCant" name="txtCant" required="">
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



<div class="modal fade" id="ModalViewProductos"  tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header primary" style="background-color:#009688">
        <h5 class="modal-title" id="titleModal">Datos del producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
       <table class="teble table-bordered">
        <tbody>
            <tr>
                <td>Categoría</td>
                <td id=celIdentificacion></td>
            </tr>
            <tr>
                <td>Nombre Producto</td>
                <td id=celNombres></td>
            </tr>
            <tr>
                <td>Precio</td>
                <td id=celApellidos></td>
            </tr>
            <tr>
                <td>Descripción</td>
                <td id=celTelefono></td>
            </tr>
            <tr>
                <td>Cantidad</td>
                <td id=celEmail></td>
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






