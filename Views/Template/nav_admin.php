    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?=media();?>/images/avatar.png" alt="User Image">
            <div>
                <p class="app-sidebar__user-name">
                    <?=$_SESSION['userData']['nombres'];?>
                    <br>
                    <?=$_SESSION['userData']['apellidos'];?>
                </p>
                <p class="app-sidebar__user-designation"><?=$_SESSION['userData']['nombrerol'];?></p>
            </div>
        </div>
        <ul class="app-menu">
            <li>
                <a class="app-menu__item" href="<?= base_url();?>" target="_blank">
                    <i class="app-menu__icon fa fas fa-globe" aria-hidden="true"></i>
                    <span class="app-menu__label">Ver sitio web</span>
                </a>
            </li>
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
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa-solid fa-calculator"></i>
                    <span class="app-menu__label">Matemáticas</span><i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= base_url();?>/unidades"><i class="icon fa fa-circle-o"></i> Unidades</a></li>
                    <li><a class="treeview-item" href="<?= base_url();?>/capitulos"><i class="icon fa fa-circle-o"></i> Capitulos</a></li>
                    <li><a class="treeview-item" href="<?= base_url();?>/tipocontenido"><i class="icon fa fa-circle-o"></i> Tipo de Contenido</a></li>
                    <li><a class="treeview-item" href="<?= base_url();?>/contenidos"><i class="icon fa fa-circle-o"></i> Contenidos</a></li>
                </ul>
            </li>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/paginas">
                    <i class="app-menu__icon fas fa-file-alt" aria-hidden="true"></i>
                    <span class="app-menu__label">Páginas</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="<?= base_url();?>/salir">
                    <i class="app-menu__icon fa fa-power-off"></i>
                    <span class="app-menu__label">Logout</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="<?= base_url();?>/login">
                    <i class="app-menu__icon fa-solid fa-circle-check"></i>
                    <span class="app-menu__label">Vista Login</span>
                </a>
            </li>
        </ul>
    </aside>