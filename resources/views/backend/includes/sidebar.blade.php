<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{asset('images/'.Auth::user()->thumbnail)}}" alt="user-img" title="Mat Helme"
                class="rounded-circle img-thumbnail avatar-lg">
            <div class="dropdown">
                <a href="#" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-toggle="dropdown">{{uppercase(Auth::user()->name)}}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>Mi Cuenta</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Logout</span>
                    </a>

                    <form action="{{route('logout')}}" method="post" id="logout-form" style="display:none;">

                        @csrf
                    </form>

                </div>
            </div>
            <p class="text-muted">
                @foreach (Auth::user()->role as $roles)
                {{$roles->name}},
                @endforeach
            </p>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-muted">
                        <i class="mdi mdi-settings"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a href="#" class="text-custom">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">MENU</li>

                <li>
                    <a href="{{route('home')}}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                @can('view-product', User::class)


                <li>
                    <a href="javascript: void(0);">
                        <i class="ti-flag"></i>
                        <span> Productos</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('product.index')}}">Ver</a></li>
                        <li><a href="{{route('product.create')}}">Crear</a></li>

                    </ul>
                </li>
                @endcan

                @can('view-order', User::class)


                <li>
                    <a href="javascript: void(0);">
                        <i class="ti-flag"></i>
                        <span> Ventas</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('order.index')}}">Ver</a></li>
                        <li><a href="{{route('order.create')}}">Crear</a></li>

                    </ul>
                </li>
                @endcan



                @can('view-customer', User::class)


                <li>
                    <a href="javascript: void(0);">
                        <i class="ti-flag"></i>
                        <span>Clientes</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('customer.index')}}">Ver</a></li>

                    </ul>
                </li>
                @endcan



                @can('view-user', User::class)
                {{-- expr --}}

                <li>
                    <a href="javascript: void(0);">
                        <i class="ti-user"></i>
                        <span> Usuarios</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('user.index')}}">Ver</a></li>
                        <li><a href="{{route('user.create')}}">Crear</a></li>
                        {{-- <li><a href="ui-draggable-cards.html">Draggable Cards</a></ --}}
                    </ul>
                </li>
                @endcan

                @can('view-role', User::class)
                {{-- expr --}}

                <li>
                    <a href="javascript: void(0);">
                        <i class="ti-crown"></i>
                        <span> Roles </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('role.index')}}">Ver</a></li>
                        <li><a href="{{route('role.create')}}">Crear</a></li>
                        {{-- <li><a href="ui-draggable-cards.html">Draggable Cards</a></ --}}
                    </ul>
                </li>
                @endcan

                @can('view-permission', User::class)
                {{-- expr --}}

                <li>
                    <a href="javascript: void(0);">
                        <i class="ti-flag"></i>
                        <span> Permisos</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('permission.index')}}">Ver</a></li>
                        <li><a href="{{route('permission.create')}}">Crear</a></li>
                        {{-- <li><a href="ui-draggable-cards.html">Draggable Cards</a></ --}}
                    </ul>
                </li>
                @endcan


                @can('view-category', User::class)
                {{-- expr --}}

                <li>
                    <a href="javascript: void(0);">
                        <i class="ti-flag"></i>
                        <span> Categorias</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('category.index')}}">Ver</a></li>
                        <li><a href="{{route('category.create')}}">Crear</a></li>
                        {{-- <li><a href="ui-draggable-cards.html">Draggable Cards</a></ --}}
                    </ul>
                </li>
                @endcan


                @can('view-brands', User::class)
                {{-- expr --}}

                <li>
                    <a href="javascript: void(0);">
                        <i class="ti-flag"></i>
                        <span> Marcas</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('brand.index')}}">Ver</a></li>
                        <li><a href="{{route('brand.create')}}">Crear</a></li>
                        {{-- <li><a href="ui-draggable-cards.html">Draggable Cards</a></ --}}
                    </ul>
                </li>
                @endcan






            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>