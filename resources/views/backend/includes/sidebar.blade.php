<style>
    .content-page{
        margin-left: 0px !important;
        margin-top: 0px !important;
    }
    </style>
<div class="horizontal-side-menu">

    <div class="slimscroll-menu" style="">

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{asset('images/'.Auth::user()->thumbnail)}}" alt="user-img" title="Mat Helme"
                class="rounded-circle img-thumbnail avatar-lg">
            <div class="dropdown">
                
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
           

            
        </div>

        <!--- Sidemenu -->
        <div class="topnav" style="height: 185px; overflow: hidden; width: auto;"><div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Menu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}"> 
            <i class="mdi mdi-view-dashboard"></i>Dashboard <span class="sr-only">(current)</span>
        </a>
      </li>

      @can('view-customer', User::class)
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-address-book "></i> Clientes <i class="fa fa-angle-down"></i>
        </a>
        <div class="dropdown-menu "  aria-labelledby="topnav-ui">
          <a class="dropdown-item"  href="{{route('customer.index')}}">Ver</a>
        </div>
      </li>
      @endcan

      @can('view-product', User::class)
      <li class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-pills"></i> Productos <i class="fa fa-angle-down"></i>
        </a>
        <div class="dropdown-menu mega-dropdown-menu dropdown-mega-menu-xl" aria-labelledby="navbarDropdownMenuLink">
            <div class="row">
                <div class="col-lg-6">
                    <a class="dropdown-item notify-item" href="{{route('product.index')}}">Ver todo</a>
                    <a class="dropdown-item notify-item" href="{{route('product.create')}}">Crear nuevo</a>
                    <a class="dropdown-item notify-item" href="{{route('product.index')}}">Carga masiva</a>
                </div>
                <!--<div class="col-lg-6">
                    <a class="dropdown-item notify-item" href="{{route('product.index')}}">Ver</a>
                    <a class="dropdown-item notify-item" href="{{route('product.create')}}">Crear</a>
                    <a class="dropdown-item notify-item" href="{{route('product.index')}}">Ver</a>
                </div>-->
            </div>

        </div>
      </li>
      @endcan
      @can('view-order', User::class)
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-balance-scale"></i> Ventas <i class="fa fa-angle-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{route('order.index')}}">Ver Todas</a>
          <a class="dropdown-item" href="{{route('order.create')}}">Punto de venta</a>
        </div>
      </li>
      @endcan
      
    @can('view-user', User::class)
                {{-- expr --}}
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cogs"></i> Configuracion <i class="fa fa-angle-down"></i>
            </a>
            <!--<div class="dropdown-menu" aria-labelledby="topnav-ui">
                <a class="dropdown-item" href="{{route('user.index')}}"><i class="fa fa-users"></i> Usuariosx</a>
                {{-- <a href="ui-draggable-cards.html">Draggable Cards</a> --}}
            </div>-->
            <div class="dropdown-menu mega-dropdown-menu dropdown-mega-menu-xl" aria-labelledby="navbarDropdownMenuLink">
                <div class="row">
                    <div class="col-lg-6">
                        <a class="dropdown-item notify-item" href="{{route('user.index')}}">  Usuarios</a>
                        <a class="dropdown-item notify-item" href="{{route('role.index')}}">Roles</a>
                        <a class="dropdown-item notify-item" href="{{route('permission.index')}}">Permisos</a>
                    </div>
                    <div class="col-lg-6">
                        <a class="dropdown-item notify-item" href="{{route('category.index')}}">  Categorias</a>
                        <a class="dropdown-item notify-item"  href="{{route('brand.index')}}">Marcas</a>
                        
                    </div>
                </div>
            </div>
        </li>
    @endcan
  
    </ul>
  </div>
</nav>
</div>
</div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>