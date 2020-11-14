
<div class="modal fade" id="ModalCategorias" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nueva Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tile">
              <div class="tile-body">
                <form id="formCategorias" name="formCategorias">
                  <input type="hidden" id="idCategoria" name="idCategoria" value="">
                  <div class="form-group">
                    <label for="control-label">Nombre</label>
                    <input class="form-control" id="txtcateNomb" name="txtcateNomb" type="text"  placeholder="Nombre de la cotegoría" required=""/>
                  </div>
                  <div class="form-group">
                    <label for="control-label">Descripción</label>
                    <textarea class="form-control" id="txtcateDesc" name="txtcateDesc" rows="2" placeholder="Descripción de la categoría" required=""></textarea>
                  </div>
                  <div class="form-group">
                    <label for="eje">Estado</label>
                    <select class="form-control" id="listStatus" name="listStatus" required="">
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                    </select>
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
  </div>
</div>