@extends('plantilla')
@section('contenido')
@include('assets.nav_user')
<div class="container bg-white mt-4 mb-3 sombra border border-5">
    <div class="row">
        <div class="col-12 text-center p-3">
            <h3 class="fw-bold">FORMATOS DE PRODUCTO NO CONFORME</h3>
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
        @forelse ($fpnc as $ifpnc)
               
                <a href="{{route('fpnc.lleno', $ifpnc->id)}}" class="formato">
                    <div class="row p-3 resizeable-table mt-1"> 
                        <div class=" col-sm-6 col-md-6 col-lg-2 p-2 border-start">
                            <b>Folio: </b> <br>
                            <span class="fw-bold text-danger">{{$ifpnc->folio}}</span>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-2 p-2 border-start">
                            <b>Producto: </b> <br>
                            <span>{{$ifpnc->producto}}</span>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-2 p-2 border-start">
                            <b>Proveedor: </b> <br>
                            <span>{{$ifpnc->proveedor}}</span>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-3 p-2 border-start">
                          <b>Realizo: </b> <br>
                          <span>{{$ifpnc->usuario_logeado}}</span>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-2 p-2 border-start">
                            <b>Proveedor: </b> <br>
                            <span class="fw-bold">
                                
                                {{$ifpnc->proveedor}}
                            </span>
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