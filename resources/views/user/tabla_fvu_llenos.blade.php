@extends('plantilla')
@section('contenido')
@include('assets.nav_user')

<div class="container bg-white mt-4 mb-3 sombra border border-5">
    <div class="row">
        <div class="col-12 text-center p-3">
            <h3 class="fw-bold">FORMATOS DE VERIFICACIÓN DE UNIDADES</h3>
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
        @forelse ($fvu as $ifvu)
               
                <a href="{{route('fvu.lleno', $ifvu->id)}}" class="formato">
                    <div class="row p-3 resizeable-table mt-1"> 

                        <div class=" col-sm-6 col-md-6 col-lg-2 p-2 border-start">
                            <b>Folio: </b> <br>
                            <span class="fw-bold text-danger">{{$ifvu->folio}}</span>
                        </div>

                        <div class=" col-sm-6 col-md-6 col-lg-3 p-2 border-start">
                            <b>Fecha: </b> <br>
                            <span>{{$ifvu->fecha}}</span>
                        </div>

                        <div class=" col-sm-6 col-md-6 col-lg-2 p-2 border-start">
                            <b>Estructura: </b> <br>
                            <span>{{$ifvu->estructura_transporte}}</span>
                        </div>

                        <div class=" col-sm-6 col-md-6 col-lg-2 p-2 border-start">
                          <b>Contenedor: </b> <br>
                          <span>{{$ifvu->estructura_contenedor}}</span>
                        </div>

                        <div class=" col-sm-6 col-md-6 col-lg-2 p-2 border-start">
                            <b>Dictamen: </b> <br>

                                @if ($ifvu->dictamen_final == 'LIBERADO' )
                                    <span class="text-success fw-bold" >{{$ifvu->dictamen_final}}</span>
                                @else
                                     <span class="text-danger fw-bold" >{{$ifvu->dictamen_final}}</span>
                                @endif



                        </div>
                    </div>
                </a>

         @empty
            <li>No hay registros</li>
        @endforelse

        </div>
    </div>
</div>
<!-- PANEL PARA MOSTRAR LA TABLA CON LOS RESULTADOS DE LA BUSQUEDA -->







@endsection