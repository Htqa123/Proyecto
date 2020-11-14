<?php
 headerAdmin($data); 
 getModal('ModalProveedores', $data);
 ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user-plus" aria-hidden="true"></i> <?= $data['page_title'] ?>
          <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fa fa-plus-square" aria-hidden="true"></i>Nuevo</button>
          </h1>
          <p>Aqui puedes crear un nuevo proveedor</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/proveedores"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>
      
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered" id="tableproveedores">
                    <thead>
                      <tr>
                        <th>Nit</th>
                        <th>Nombre Proveedor</th>
                        <th>Teléfono</th>
                        <th>Status</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody> 
                            
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>
    
  <?php footerAdmin($data); ?>
  <script src="<?= media(); ?>/js/functions_proveedores.js"></script>