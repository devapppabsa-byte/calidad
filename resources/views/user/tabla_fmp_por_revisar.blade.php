@extends('plantilla')
@section('contenido')
@section('title', 'FORMATOS PENDIENTES')
@include('assets.nav')


<div class="container mt-4 mb-3 ">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-4 col-lg-2 text-center">
            <a href="{{route('user.perfil')}}" class="btn btn-sm py-2 text-white btn-secondary btn-sm fw-bold h4 p-3 w-100" >Regresar</a>
        </div>
    </div>
</div>

<div class="container bg-white mt-4 mb-3 sombra border border-5">
    <div class="row">
        <div class="col-12 text-center p-3">
            <h3 class="fw-bold">FORMATOS POR REVISAR</h3>
        </div>
    </div>
</div>




<!-- PANEL PARA MOSTRAR LA TABLA CON LOS RESULTADOS DE LA BUSQUEDA -->
<div class="container mt-4">
    <div class="row">
        <div class="col-12 bg-light p-4">

        
        @forelse ($pendientes as $pendiente)

            @if (!$pendiente->$reviso)
                <a href="{{route('fmp.revisar', $pendiente->id)}}">
                    <div class="row p-3 resizeable-table mt-1"> 
                        <div class=" col-sm-6 col-md-5 col-lg-1 p-2 border-start">
                            <b>Folio: </b> <br>
                            <span class="text-danger fw-bold">{{$pendiente->folio}}</span>
                        </div>
                        <div class=" col-sm-6 col-md-5 col-lg-2 p-2 border-start">
                            <b>Fecha: </b> <br>
                            <span>{{$pendiente->fecha}}</span>
                        </div>
                        <div class=" col-sm-6 col-md-5 col-lg-3 p-2 border-start">
                            <b>Producto:</b> <br>
                        <span> {{$pendiente->producto}}</span>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-2 p-2 border-start">
                            <b>Proveedor: </b> <br>
                            <span>{{$pendiente->proveedor}}</span>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-3 p-2 border-start">
                            <b>Realizo: </b> <br>
                            <span> {{$pendiente->usuario_logeado}}</span>
                        </div>
                    </div>
                </a>    
            @else

     

          
            @endif

        @empty
        <li>No hay pendientes</li>
        @endforelse





        </div>
    </div>
</div>
<!-- PANEL PARA MOSTRAR LA TABLA CON LOS RESULTADOS DE LA BUSQUEDA -->






{{-- alertas de que el usurio se agrego con exito o que hubo un error se desaparecen en 3 segundos--}}
@if (session('revisado'))
    <script>
         window.addEventListener('load', function(){
            Swal.fire({
                title: "Hecho",
                text:  "{{session('revisado')}}",
                icon: "success"
            });

            setTimeout(function(){
                window.location.replace(window.location.href);
            }, 3500);
         });
        
    </script>
 
@endif


@endsection