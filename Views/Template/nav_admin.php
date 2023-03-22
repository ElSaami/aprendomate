    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?=media();?>/images/avatar.png" alt="User Image">
            <div>
                <p class="app-sidebar__user-name">Cristian San Martin</p>
                <p class="app-sidebar__user-designation">Administrador</p>
            </div>
        </div>
        <ul class="app-menu">
            <li>
                <a class="app-menu__item" href="<?= base_url();?>/dashboard"><i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i>
                    <span class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= base_url();?>/usuarios"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
                    <li><a class="treeview-item" href="<?= base_url();?>/roles"><i class="icon fa fa-circle-o"></i> Roles</a></li>
                    <li><a class="treeview-item" href="<?= base_url();?>/permisos"><i class="icon fa fa-circle-o"></i> Permisos</a></li>
                </ul>
            </li>
            <li>
                <a class="app-menu__item" href="<?= base_url();?>/estudiante">
                    <i class="app-menu__icon fa fa-user"></i>
                    <span class="app-menu__label">Estudiantes</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="<?= base_url();?>/docente">
                    <i class="app-menu__icon fa fa-user"></i>
                    <span class="app-menu__label">Docentes</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="<?= base_url();?>/salir">
                    <i class="app-menu__icon fa fa-power-off"></i>
                    <span class="app-menu__label">Logout</span>
                </a>
            </li>
        </ul>
    </aside>