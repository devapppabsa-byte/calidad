<!-- BARRA DE NAVEGACIÓN -->
<div class="container-fluid p-0 bg-light border-bottom border-5  d-print-none sticky-top">
    <div class="row p-2 justify-content-center d-flex align-items-center">
        
        @if (Auth::guard('adminis')->user())
        <div class="col-sm-6 col-md-4 col-lg-2 d-flex align-items-center text-center  ">
            {{-- <img src="{{asset('img/logo.png')}}" class="img-fluid w-25 mx-auto" alt=""> <br> --}}
            <a href="{{route('user.perfil')}}" class="text-dark text-center">
                    <h3 class="mx-auto cascadia text-center">
                        <i class="fa fa-flask"></i>
                        QualiTrack
                    </h3>
            </a>
        </div>

       <div class="col-sm-12 col-md-12 col-lg-8 d-flex align-items-center">

        <div class="col-7"></div>
        <div class="col-sm-6 col-md-2 col-lg-2">
            <div class="row justify-content-center">
                <div class="col-12 text-center mb-0">
                    <h6>
                        {{Auth::guard('adminis')->user()->nombre_completo}}  
                    </h6>
                </div>
                <div class="col-12 text-center mt-0">
                    <form action="{{route('cerrar.sesion')}}" method="POST">
                        @csrf
                        <button class="btn btn-light btn-sm border" type="submit">
                            <i class="fa fa-power-off"></i>
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
       </div>



            
        @else
            @if (Auth()->user()->area == 'CALIDAD')
            <!-- Navbar superior -->
            <nav class="navbar navbar-light  sticky-top d-print-none">
                <div class="container-fluid justify-content-between">

                    <!-- Logo / título -->
                    <a class="navbar-brand d-flex align-items-center" href="{{route('user.perfil')}}">
                    <i class="fa fa-flask me-2"></i>
                    <span style="font-family: Cascadia Code;">QualiTrack</span>
                    </a>

                    <!-- Botón hamburguesa -->
                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuUsuario" aria-controls="menuUsuario">
                    <i class="fa fa-bars fa-lg"></i>
                    </button>
                </div>
            </nav>

            <!-- Menú lateral (offcanvas) -->
            <div class="offcanvas offcanvas-start bg-light" tabindex="-1" id="menuUsuario" aria-labelledby="menuUsuarioLabel">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="menuUsuarioLabel">
                <i class="fa fa-user me-2"></i> Menú de Usuario
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
            </div>

            <div class="offcanvas-body">

                <!-- INICIO -->
                <a href="{{route('user.perfil')}}" class="btn btn-light w-100 mb-2 text-start {{request()->routeIs('user.perfil') ? 'active' : ''}}">
                <i class="fa fa-home me-2"></i> Inicio
                </a>

                <!-- MATERIA PRIMA -->
                <div class="dropdown w-100 mb-2">
                <button class="btn btn-light w-100 text-start dropdown-toggle {{request()->routeIs('fmp.*') ? 'active' : ''}}" data-bs-toggle="dropdown">
                    <i class="fa fa-file-export me-2"></i> Materia Prima
                </button>
                <ul class="dropdown-menu w-100">
                    <li>
                    <a class="dropdown-item" href="{{route('fmp.rellenar')}}">
                        <i class="fa fa-plus-circle me-2"></i> Crear Nuevo Formato
                    </a>
                    </li>
                    <li>
                    <a class="dropdown-item" href="{{route('fmp.generados')}}">
                        <i class="fa fa-search me-2"></i> Buscar Documentos
                    </a>
                    </li>
                </ul>
                </div>

                <!-- PRODUCTO NO CONFORME -->
                <div class="dropdown w-100 mb-2">
                <button class="btn btn-light w-100 text-start dropdown-toggle 
                    {{request()->routeIs('tabla.fpnc') || request()->routeIs('fpnc.generados') ? 'active' : ''}}" data-bs-toggle="dropdown">
                    <i class="fa fa-xmark-circle me-2"></i> Producto No Conforme
                </button>
                <ul class="dropdown-menu w-100">
                    <li>
                    <a class="dropdown-item" href="{{route('tabla.fpnc')}}">
                        <i class="fa fa-plus-circle me-2"></i> Llenar Nuevo Formato
                    </a>
                    </li>
                    <li>
                    <a class="dropdown-item" href="{{route('fpnc.generados')}}">
                        <i class="fa fa-search me-2"></i> Buscar Documentos
                    </a>
                    </li>
                </ul>
                </div>

                <!-- LIBERACIÓN DE UNIDADES -->
                <div class="dropdown w-100 mb-2">
                <button class="btn btn-light w-100 text-start dropdown-toggle {{request()->routeIs('fvu.*') ? 'active' : ''}}" data-bs-toggle="dropdown">
                    <i class="fa fa-truck me-2"></i> Liberación de Unidades
                </button>
                <ul class="dropdown-menu w-100">
                    <li>
                    <a class="dropdown-item" href="{{route('fvu.rellenar')}}">
                        <i class="fa fa-plus-circle me-2"></i> Crear Nuevo Formato
                    </a>
                    </li>
                    <li>
                    <a class="dropdown-item" href="{{route('fvu.tabla')}}">
                        <i class="fa fa-search me-2"></i> Buscar Documentos
                    </a>
                    </li>
                </ul>
                </div>

                <!-- (opcional) Cierre de sesión o usuario -->
                <div class="border-top mt-4 pt-3">
                <div class="text-center mb-2">
                    <h6 class="mb-0">
                    @if (isset(Auth::user()->nombre_completo))
                        {{Auth::user()->nombre_completo}}
                    @endif
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

            @endif
        
       </div>  <!--  Para que haga espacio -->

       @endif
    </div>
</div>
<!-- BARRA DE NAVEGACIÓN -->







<div class="d-block d-md-none"><!-- Salto de línea en pantallas pequeñas -->


</div>

