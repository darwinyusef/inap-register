<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <div class="img-circle" style="width: 30px; height: 30px;">
                    <i class="fa fa-users" style="font-size:20px; color: white"></i>
                </div>

            </div>
            <div class="pull-left info pb-4">
                <p class="text-uppercase">{{ $cookie->firstname . ' ' . $cookie->lastname }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online </a>
            </div>
        </div>

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="one">

            @if (in_array('user:list', $permission))
                <li class="header">Usuarios</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @if (in_array('user:list', $permission))
                            <li><a href="/tools/backend/usuarios"><i class="fa fa-circle-o"></i> Admin de Usuarios</a></li>
                        @endif
                        @if (in_array('user:create', $permission))
                            <li><a href="/tools/"><i class="fa fa-circle-o"></i> Crear un Usuario</a>
                            </li>
                        @endif
                        @if (in_array('user:recover-pass', $permission))
                            <li><a href="/tools/backend/password/{{ $cookie->id }}/change"><i class="fa fa-circle-o"></i>
                                    Modificar
                                    Contraseña</a>
                            </li>
                        @endif
                        @if (in_array('admin:csv-user', $permission))
                            <li><a href="/tools/backend/inscribe"><i class="fa fa-circle-o"></i> Cargar usuarios</a></li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (in_array('admin:ticket-list', $permission))
                <li class="header">Usuarios</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-ticket"></i> <span>Ticket</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @if (in_array('admin:ticket-list', $permission))
                            <li><a href="/tools/backend/tickets"><i class="fa fa-circle-o"></i> Admin de Tickets</a></li>
                        @endif
                        <li><a href="/tools/backend/tickets/create"><i class="fa fa-circle-o"></i> Crear un Ticket</a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-md"></i> <span>Mi Usuario</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    @if (in_array('user:basic-update', $permission))
                        <li><a href="/tools/backend/usuarios/1"><i class="fa fa-circle-o"></i> Mostrar mi Usuario</a>
                        </li>
                    @endif

                    @if (in_array('user:basic-update', $permission))
                        <li><a href="/tools/backend/usuarios/1/edit"><i class="fa fa-circle-o"></i> Editar mi Usuario</a>
                        </li>
                    @endif
                    @if (in_array('user:recover-pass', $permission))
                        <li><a href="/tools/backend/password/{{ $cookie->id }}"><i class="fa fa-circle-o"></i>Cambiar Contraseña</a></li>
                    @endif

                    <li><a href="/tools/backend/tickets/create"><i class="fa fa-bug"></i> Crear un Ticket</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
