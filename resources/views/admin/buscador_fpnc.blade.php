@extends('plantilla')
@section('contenido')
@include('assets.nav')
@section('title', 'FO/GP/CC/001/001')


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

        @forelse ($formatos as $formato)
        <a href="{{route('fpnc.lleno.admin', $formato->id)}}" class="formato">
            <div class="row p-3 resizeable-table mt-1 justify-content-around "> 
                <div class="col-sm-12 col-md-6 col-lg-2">
                    <b>Folio: </b>
                    <h6 class="text-danger">{{$formato->folio}}</h6>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-2 p-2">
                    <b>Fecha:</b>
                    <h6> {{$formato->fecha}} </h6>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-2 p-2">
                    <b>Proveedor</b>
                    <h6> {{$formato->proveedor}} </h6>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-2 p-2">
                    <b>Producto</b>
                    <h6>{{$formato->producto}}</h6>
                </div>
                <div class="col-lg-3 p-2">
                    <b>Lote</b>
                    <h6>{{$formato->lote}}</h6>
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