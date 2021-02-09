
<div class="modal fade" id="ModalRoles" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tile">
              <div class="tile-body">
                <form id="formRol" name="formRol">
                  <input type="hidden" id="roleId" name="roleId" value="">
                  <div class="form-group">
                    <label for="control-label">Nombre</label>
                    <input class="form-control" id="txtroleNomb" name="txtroleNomb" type="text"  placeholder="Nombre del rol" required=""/>
                  </div>
                  <div class="form-group">
                    <label for="control-label">Descripción</label>
                    <textarea class="form-control" id="txtroleDesc" name="txtroleDesc" rows="2" placeholder="Descripción del rol" required=""></textarea>
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


<div class="modal fade modalPermisos" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">X</span>
        </button>
      </div>
        <div class="modal-body">
        <div  class="text-center"><h5>Permisos</h5></div> 
        <form action="" id="formPermisos" name="formPermisos">
            <div class="table-responsive">
              <table class="table table-hover  table-bordered" id="">
                  <thead>
                      <tr>
                        <th>#</th>
                        <th>Módulo</th> 
                        <th>Leer</th>
                        <th>Escribir</th>
                        <th>Actualizar</th>
                        <th>Eliminar</th>
                      </tr>
                  </thead>
                    <tbody> 
                    <tr>
                      <td>Usuario</td>  
                      <td>
                          <div class="toggle-flip">
                              <label>
                                <input type="checkbox"><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                              </label>
                        </div>
                      </td> 
                      <td>
                      <div class="toggle-flip">
                              <label>
                                <input type="checkbox"><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                              </label>
                        </div>
                      </td> 
                      <td>
                      <div class="toggle-flip">
                              <label>
                                <input type="checkbox"><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                              </label>
                        </div>
                      </td> 
                      <td>
                      <div class="toggle-flip">
                              <label>
                                <input type="checkbox"><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                              </label>
                        </div>
                      </td> 
                      <td>
                      <div class="toggle-flip">
                              <label>
                                <input type="checkbox"><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                              </label>
                        </div>
                      </td>  
                    </tr>  
                    </tbody>
              </table>
            </div>
              <div class="text-center">
                <button class="btn btn-success" id="btnActionForm" type="submit">
                    <span id="btnText">Guardar</span>
                </button>
                <button class="btn btn-danger" data-dismiss="modal" type="submit">Salir</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
