<?php
 headerAdmin($data); 
 getModal('ModalUsuarios', $data);
 ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user-plus" aria-hidden="true"></i> <?= $data['page_title'] ?>
          <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fa fa-plus-square" aria-hidden="true"></i>Nuevo</button>
          </h1>
          <p>Aqui puedes crear un nuevo rol</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/roles"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>
      
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered" id="tableUsuarios">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Eamil</th>
                        <th>Teléfono</th>
                        <th>Rol</th>
                        <th>Fecha</th>
                        <th>Status</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody> 
                        <tr>
                            <td>1</td>
                            <td>Harold</td>
                            <td>urueña</td>
                            <td>haroldqyahoo.com</td>
                            <td>646454</td>
                            <td>adminisrador</td>
                            <td>11/11/20202</td>
                            <td>activo</td>
                            <td></td>
                        </tr>     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>
  <?php footerAdmin($data); ?>