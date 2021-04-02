<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media(); ?>/images/avatar.png" alt="User Image">
        <div>
        <div>
          <p class="app-sidebar__user-name"><?= $_SESSION['userData']['persNomb']; ?></p>
          <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['roleNomb']; ?></p>
        </div>
        </div>
      </div>
      <ul class="app-menu">
      <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <?php } ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-cog" aria-hidden="true"></i>
                <span class="app-menu__label">Configuración</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url(); ?>usuarios"><i class="icon fa fa-circle-o"></i>Usuarios</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>roles"><i class="icon fa fa-circle-o"></i>roles</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>permisos"><i class="icon fa fa-circle-o"></i>Permisos</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>categorias"><i class="icon fa fa-circle-o"></i>Categorias</a></li>
          </ul>
        </li>
        
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>clientes">
                <i class="app-menu__icon fa fa-user-circle" aria-hidden="true"></i>
                <span class="app-menu__label">Clientes</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>productos">
                <i class="app-menu__icon fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="app-menu__label">Productos</span>
            </a>
        </li>
       
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-cog" aria-hidden="true"></i>
                <span class="app-menu__label">Comercial</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url(); ?>pedidos"><i class="icon fa fa-circle-o"></i>Pedidos</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>ventas"><i class="icon fa fa-circle-o"></i>Ventas</a></li>
            <!-- <li><a class="treeview-item" href="<?= base_url(); ?>/permisos"><i class="icon fa fa-circle-o"></i>Permisos</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>/categorias"><i class="icon fa fa-circle-o"></i>Categorias</a></li> -->
          </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-cog" aria-hidden="true"></i>
                <span class="app-menu__label">Provedores</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url(); ?>proveedores"><i class="icon fa fa-circle-o"></i>Proveedores</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>facturas"><i class="icon fa fa-circle-o"></i>Facturas</a></li>
            <!-- <li><a class="treeview-item" href="<?= base_url(); ?>/permisos"><i class="icon fa fa-circle-o"></i>Permisos</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>/categorias"><i class="icon fa fa-circle-o"></i>Categorias</a></li> -->
          </ul>
        </li>
        <!-- <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/proveedores">
                <i class="app-menu__icon fa fa-check-circle" aria-hidden="true"></i>
                <span class="app-menu__label">Proveedores</span>
            </a>
        </li> -->
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>logout">
                <i class="app-menu__icon fa fa-sign-in" aria-hidden="true"></i>
                <span class="app-menu__label">Logout</span>
            </a>
        </li>
      </ul>
    </aside>