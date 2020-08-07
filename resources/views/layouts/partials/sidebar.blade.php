<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="/master/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/master/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin Name</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Recherche" aria-label="Recherche">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link {{$home ?? ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{$order?? ''}}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Commandes
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{$client ?? ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Clients
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link {{$config ?? ''}}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Configuration
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link {{$gaz ?? ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bouteilles de gaz</p>
                            </a>
                        </li>
                        <div class="dropdown-divider"></div>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pays</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{$city ?? ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Villes</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link {{$arrondissement ?? ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Arrondissements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{$quater ?? ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quartiers</p>
                            </a>
                        </li>
                        <div class="dropdown-divider"></div>

                        <li class="nav-item">
                            <a href="#" class="nav-link {{$role ?? ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{$personal ?? ''}}">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Personnels
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>