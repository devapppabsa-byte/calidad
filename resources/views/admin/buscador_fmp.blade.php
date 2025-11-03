@extends('plantilla')
@section('contenido')
@include('assets.nav')
@section('title', 'FO/GP/CC/070/01')
{{-- @include('assets.nav_admin') --}}

<div class="container bg-white mt-4 mb-3 sombra border border-5">
    <div class="row">
        <div class="col-12 text-center p-3">
            <h3 class="fw-bold">FORMATOS DE MATERIA PRIMA</h3>
        </div>
    </div>
</div>








<!-- PANEL PARA MOSTRAR LA TABLA CON LOS RESULTADOS DE LA BUSQUEDA -->
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-10 text-center">
            <input type="text" class="form-control p-4 fs-4 fw-bold" placeholder="Buscar por palabra clave" id="buscador_formatos" style="border: none;" autofocus>
        </div>
        <div class="col-12 bg-light p-4 mt-3">
            <div id="mensaje_vacio" class="alert alert-gray text-center h3" style="display: none;">
                <i class="fa fa-info-circle"></i>
                No se encontraron resultados.
            </div>

@forelse ($formatos as $formato)
        <a href="{{route('fmp.lleno', $formato->id)}}" class="formato">
            <div class="row p-3 resizeable-table mt-1"> 
                <div class="col-sm-12 col-md-6 col-lg-2 p-2">
                    <h6> {{$formato->fecha}} </h6>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-2 p-2">
                    <h6> {{$formato->proveedor}} </h6>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col- p-2">
                    <h6>{{$formato->producto}}</h6>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-1 p-2">
                    <h6>{{$formato->dictamen_final}}</h6>
                </div>


                <div class="col-sm-12 col-md-6 col-lg-3  mt-1">
                    <div class="row">

                    @if ($formato->reviso_bascula)
                        <div class="col-6">
                            <small>Bascula: </small>
                            <i class="fa fa-check mx-2"></i>
                        </div>
                    @else
                        <div class="col-6">
                            <small>Bascula: </small>
                            <i class="fa fa-clock mx-2"></i>
                        </div>
                    @endif


                    @if ($formato->reviso_produccion)
                        <div class="col-6">
                            <small>Producción: </small>
                            <i class="fa fa-check mx-2"></i>
                        </div>
                        
                    @else
                        <div class="col-6">
                            <small>Producción: </small>
                            <i class="fa fa-clock mx-2"></i>
                        </div>
                    @endif
                    </div>
                </div>



            </div>
        </a>
@empty

        <li>Sin resultados</li>
@endforelse

</div>

    </div>
</div>
<!-- PANEL PARA MOSTRAR LA TABLA CON LOS RESULTADOS DE LA BUSQUEDA -->

@endsection