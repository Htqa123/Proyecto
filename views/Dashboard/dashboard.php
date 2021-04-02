<?php headerAdmin($data); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> <?= $data['page_title'] ?></h1>
          <p>Aqui puedes ver los movimientos del día</p>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Administración</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">Estos son los eventos del día.</div>
            <br>
            <div class="row">
        <div class="col-md-6 col-lg-2">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h5>Usuario</h5>
              
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-2">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-calculator fa-3x"></i>
            <div class="info">
              <h5>Gastos</h5>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-money fa-3x" aria-hidden="true"></i>
            <div class="info">
              <h5>Ventas</h5>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-university fa-3x"></i>
            <div class="info">
              <h5>Cuentas</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
           
            <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-address-card fa-3x"></i>
            <div class="info">
              <h5>Clientes</h5>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-shopping-bag fa-3x"></i>
            <div class="info">
              <h5>Pedidos</h5>
             
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-truck fa-3x" aria-hidden="true"></i>
            <div class="info">
              <h5>Proveedores</h5>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-bar-chart fa-3x"></i>
            <div class="info">
              <h5>Productos</h5>
            </div>
          </div>
        </div>
      </div>
          </div>
        </div>
      </div>
    </main>
  <?php footerAdmin($data); ?>