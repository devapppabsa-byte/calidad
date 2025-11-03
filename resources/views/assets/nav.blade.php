<!-- BARRA DE NAVEGACIÓN -->
<!-- Navbar superior fija -->
@if (isset(Auth::guard('adminis')->user()->nombre_completo))

<nav class="navbar navbar-light bg-light border-bottom border-5 sticky-top d-print-none">
  <div class="container-fluid justify-content-between">

    <!-- LOGO -->
    <a class="navbar-brand d-flex align-items-center" href="{{route('admin.view')}}">
      <i class="fa fa-flask me-2"></i>
      <span style="font-family: Cascadia Code;">QualiTrack</span>
    </a>

    <!-- Botón Hamburguesa -->
    <button class="btn btn-light-outline" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuLateral" aria-controls="menuLateral">
      <i class="fa fa-bars fa-lg"></i>
    </button>

  </div>
</nav>

<!-- Menú lateral (offcanvas) -->
<div class="offcanvas offcanvas-start bg-light" tabindex="-1" id="menuLateral" aria-labelledby="menuLateralLabel">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title" id="menuLateralLabel">
      <i class="fa fa-flask me-2"></i> QualiTrack
    </h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
  </div>

  <div class="offcanvas-body">
    <!-- INICIO -->
    <a href="{{route('admin.view')}}" class="btn btn-light w-100 mb-2 text-start {{request()->routeIs('admin.view') ? 'active' : ''}}">
      <i class="fa fa-home me-2"></i> Inicio
    </a>

    <!-- MATERIA PRIMA -->
    <div class="dropdown w-100 mb-2">
      <button class="btn btn-light w-100 text-start dropdown-toggle" data-bs-toggle="dropdown">
        <i class="fa fa-file-export me-2"></i> Materia Prima
      </button>
      <ul class="dropdown-menu w-100">
        <li><a class="dropdown-item" href="{{route('busqueda.fmp')}}"><i class="fa fa-search me-2"></i>Buscar Documentos</a></li>
      </ul>
    </div>

    <!-- PRODUCTO NO CONFORME -->
    <div class="dropdown w-100 mb-2">
      <button class="btn btn-light w-100 text-start dropdown-toggle" data-bs-toggle="dropdown">
        <i class="fa fa-xmark-circle me-2"></i> Producto No Conforme
      </button>
      <ul class="dropdown-menu w-100">
        <li><a class="dropdown-item" href="{{route('busqueda.fpnc')}}"><i class="fa fa-search me-2"></i>Buscar Documentos</a></li>
      </ul>
    </div>

    <!-- LIBERACIÓN DE UNIDADES -->
    <div class="dropdown w-100 mb-2">
      <button class="btn btn-light w-100 text-start dropdown-toggle" data-bs-toggle="dropdown">
        <i class="fa fa-truck me-2"></i> Liberación de Unidades
      </button>
      <ul class="dropdown-menu w-100">
        <li><a class="dropdown-item" href="{{route('busqueda.fvu')}}"><i class="fa fa-search me-2"></i>Buscar Documentos</a></li>
      </ul>
    </div>

    <!-- USUARIOS -->
    <div class="dropdown w-100 mb-2">
      <button class="btn btn-light w-100 text-start dropdown-toggle" data-bs-toggle="dropdown">
        <i class="fa fa-user me-2"></i> Usuarios
      </button>
      <ul class="dropdown-menu w-100">
        <li><a class="dropdown-item" href="{{route('admin.add_usuario')}}"><i class="fa fa-user-plus me-2"></i>Agregar Usuarios</a></li>
        <li><a class="dropdown-item" href="{{route('lista.usuarios')}}"><i class="fa fa-users me-2"></i>Usuarios Agregados</a></li>
      </ul>
    </div>

    <!-- DATOS -->
    <div class="dropdown w-100 mb-4">
      <button class="btn btn-light w-100 text-start dropdown-toggle" data-bs-toggle="dropdown">
        <i class="fa fa-table me-2"></i> Datos
      </button>
      <ul class="dropdown-menu w-100">
        <li><a class="dropdown-item" href="{{route('datos.admin')}}"><i class="fa fa-box me-2"></i>Proveedores, Productos, Etc.</a></li>
      </ul>
    </div>

    <!-- USUARIO Y CIERRE DE SESIÓN -->
    <div class="border-top pt-3">
      <div class="text-center mb-2">
        <h6 class="mb-0">
            {{Auth::guard('adminis')->user()->nombre_completo}}
        </h6>
    </div>
    <form action="{{route('cerrar.sesion')}}" method="POST" class="text-center">
        @csrf
        <button class="btn btn-outline-danger btn-sm w-75">
            <i class="fa fa-power-off me-1"></i> Cerrar Sesión
        </button>
    </form>
</div>
</div>
</div>

@else


<div class="container-fluid p-0 bg-light border-bottom border-5  d-print-none sticky-top">
    <div class="row p-2 justify-content-center d-flex align-items-center">

        <div class="col-sm-6 col-md-4 col-lg-2 d-flex align-items-center text-center  ">
            
            <a href="{{route('user.perfil')}}" class="text-dark">
                    <h3 class="mx-auto cascadia">
                        <i class="fa fa-flask"></i>
                        QualiTrack
                    </h3>
            </a>
        </div>

       <div class="col-sm-12 col-md-12 col-lg-8 d-flex align-items-center">

                            
       </div>  <!--  Para que haga espacio -->

       <div class="col-sm-6 col-md-4 col-lg-2">
            <div class="row justify-content-center">
                <div class="col-12 text-center mb-0">
                    <h6>Bascula  <br> Planta 3 </h6>
                </div>
                <div class="col-12 text-center mt-0">
                    <form action="{{route('cerrar.sesion')}}" method="POST">
                        <input type="hidden" name="_token" value="twaXzIAZWfmwOFQQA0OwG5KswUqyuAR9bLEXiiyP" autocomplete="off">                        <button class="btn btn-light btn-sm" type="submit">
                            <i class="fa fa-power-off"></i>
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
       </div>
           </div>
</div>




@endif




<!-- BARRA DE NAVEGACIÓN -->


<div class="d-block d-md-none"><!-- Salto de línea en pantallas pequeñas -->
    <br class="d-print-none">
    <br class="d-print-none">
    <br class="d-print-none">
    <br class="d-print-none">
    {{-- <br class="d-print-none"> --}}
    <br class="d-print-none">
    <br class="d-print-none">

</div>