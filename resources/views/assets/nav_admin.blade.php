<!-- Botón para mostrar la barra lateral -->
<button class="btn btn-dark btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
    ☰ Menú
</button>

<!-- Barra lateral -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menú</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <h5>Inicio</h5>
            <li class="nav-item">
                <a class="nav-link h4  fw-bold" href="{{route('admin.view')}}">
                    <i class="fa-solid fa-home"></i>
                    Inicio
                </a>
            </li>
        </ul>
        
        <ul class="nav flex-column">
            <h5>Recuperar Documentos</h5>

            <li class="nav-item">
                <a class="nav-link h4  fw-bold" href="{{route('busqueda.fpnc')}}">
                    <i class="fa-solid fa-circle-xmark"></i>
                    Formatos de Producto No Conforme
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link h4  fw-bold" href="{{route('busqueda.fmp')}}">
                    <i class="fa-solid fa-seedling"></i>
                    Formatos de MP
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link h4  fw-bold" href="{{route('busqueda.fvu')}}">
                    <i class="fa-solid fa-truck"></i>
                    Formatos de Liberación de Unidades
                </a>
            </li>

        </ul>

        <ul class="nav flex-column mt-5">
            <h5>Gestios de Datos</h5>
            <li class="nav-item">
                <a class="nav-link h4  fw-bold" href="{{route('datos.admin')}}">
                    <i class="fa-solid fa-truck-fast"></i>
                    Agregar o Eliminar Proveedores
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link h4  fw-bold" href="{{route('lista.usuarios')}}">
                    <i class="fa-solid fa-user"></i>
                    Gestionar Usuarios
                </a>
            </li>
        </ul>

    </div>
</div>