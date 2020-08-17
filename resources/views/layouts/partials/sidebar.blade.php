<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="/master/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">MOVeCore</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ !empty(Auth::user()->avatar) ? Auth::user()->avatar : '/master/dist/img/avatar4.png' }}"
                     alt="{{ Auth::user()->name }} profile picture" class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="{{ route('profile') }}" class="d-block">{{ Auth::user()->name ??' Admin'}}</a>
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
                     with font-awesome or any other icon font library :::: menu-open -->
                @if(Gate::allows('view-dashboard'))
                    <li class="nav-item ">
                    <a href="{{route('dashboard')}}" class="nav-link {{$home ?? ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i   >
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @endif

                @if(Gate::any(['view-orderAndClient', 'view-configAndPersonal']))
                    <li class="nav-item {{$menu_order ?? ''}}">
                        <a href="{{route('order.index')}}" class="nav-link {{$order?? ''}}">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Commandes
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('order.index') }}" class="nav-link {{$orderindex ?? ''}}">
    {{--                                <i class="far fa-circle nav-icon"></i>--}}
                                    <p>Commandes</p>
                                </a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li class="nav-item">
                                <a href="{{route('order.search')}}" class="nav-link {{$ordersearch ?? ''}}">
    {{--                                <i class="far fa-circle nav-icon"></i>--}}
                                    <p>Nouvelle Commande</p>
                                </a>
                            </li>

                        </ul>


                    </li>
                    <li class="nav-item {{$menu_client ?? ''}}" >
                    <a href="#" class="nav-link {{$client ?? ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Clients
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link {{$category ?? ''}}">
                                <p>Categories</p>
                            </a>
                        </li>
                        <div class="dropdown-divider"></div>

                        <li class="nav-item">
                            <a href="{{ route('client.index') }}" class="nav-link {{$client_list ?? ''}}">
                                <p>Tous les Clients</p>
                            </a>
                        </li>

                    </ul>

                </li>
                @endif

                @if(Gate::allows('view-configAndPersonal'))
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
                                <a href="{{ route('gaz.index') }}" class="nav-link {{$gaz ?? ''}}">
                                    <p>Bouteilles de gaz</p>
                                </a>
                            </li>
                            <div class="dropdown-divider"></div>

                            <li class="nav-item">
                                <a href="{{ route('country.index') }}" class="nav-link">
                                    <p>Pays</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('city.index') }}" class="nav-link {{$city ?? ''}}">
                                    <p>Villes</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('arrondissement.index') }}" class="nav-link {{$arrondissement ?? ''}}">
                                    <p>Arrondissements</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('quarter.index') }}" class="nav-link {{$quater ?? ''}}">
                                    <p>Quartiers</p>
                                </a>
                            </li>
                            <div class="dropdown-divider"></div>

                            <li class="nav-item">
                                <a href="{{ route('role.index') }}" class="nav-link {{$role ?? ''}}">
                                    <p>Roles</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('personal.index') }}" class="nav-link {{$personal ?? ''}}">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                Personnels
                            </p>
                        </a>
                    </li>
                @endif

                @if(Gate::allows('view-grc'))
                    <li class="nav-item">
                        <a href="{{ route('customer_relation') }}" class="nav-link {{$customer_relation ?? ''}}">
                            <i class="nav-icon fas fa-child"></i>
                            <p>
                                Relation client
                            </p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
