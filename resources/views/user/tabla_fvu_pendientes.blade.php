@extends('plantilla')
@section('contenido')
@include('assets.nav')

<div class="container bg-white mt-4 mb-3 sombra border border-5">
    <div class="row">
        <div class="col-12 text-center p-3">
            <h3 class="fw-bold">FORMATOS DE VERIFICACIÓN DE UNIDADES</h3>
            <a href="{{route('user.perfil')}}" class="btn btn-success btn-sm">
                Regresar
            </a>
        </div>
    </div>
</div>




<!-- PANEL PARA MOSTRAR LA TABLA CON LOS RESULTADOS DE LA BUSQUEDA -->
<div class="container mt-4">
    <div class="row">
        <div class="col-12 bg-light p-4">

        @forelse ($fvu as $ifvu)
               
                <a href="{{route('fvu.verificar', $ifvu->id)}}">
                    <div class="row p-3 resizeable-table mt-1"> 
                        <div class=" col-sm-6 col-md-6 col-lg-2 p-2 border-start">
                            <b>Folio: </b> <br>
                            <span class="fw-bold text-danger">{{$ifvu->folio}}</span>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-2 p-2 border-start">
                            <b>Propietario: </b> <br>
                            <span>{{$ifvu->propietario}}</span>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-2 p-2 border-start">
                            <b>Operador: </b> <br>
                            <span>{{$ifvu->operador}}</span>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-3 p-2 border-start">
                          <b>Realizo: </b> <br>
                          <span>{{$ifvu->usuario_logeado}}</span>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-2 p-2 border-start">
                            <b>Dictamen: </b> <br>

                            @if ($ifvu->dictamen_final == 'RECHAZADO')
                                <span class="fw-bold text-danger">
                                    <i class="fa fa-square-xmark"></i>
                                    {{$ifvu->dictamen_final}}
                                </span>
                            @endif

                            @if ($ifvu->dictamen_final == 'LIBERADO')
                                <span class="fw-bold text-success">
                                    <i class="fa fa-square-check"></i>
                                    {{$ifvu->dictamen_final}}
                                </span>
                            @endif



                          </div>
                    </div>
                </a>

         @empty
            <li>No hay pendientes</li>
        @endforelse

        </div>
    </div>
</div>
<!-- PANEL PARA MOSTRAR LA TABLA CON LOS RESULTADOS DE LA BUSQUEDA -->





{{-- alertas de que el usurio se agrego con exito o que hubo un error se desaparecen en 3 segundos--}}
@if (session('fpnc_agregado'))
    <script>
         window.addEventListener('load', function(){
            Swal.fire({
                title: "Hecho",
                text:  "{{session('fpnc_agregado')}}",
                icon: "success"
            });

            setTimeout(function(){
                window.location.replace(window.location.href);
            }, 3500);
         });
        
    </script>
 
@endif



{{-- alertas de que el usurio se agrego con exito o que hubo un error se desaparecen en 3 segundos--}}
@if (session('verificado'))
    <script>
         window.addEventListener('load', function(){
            Swal.fire({
                title: "Hecho",
                text:  "{{session('verificado')}}",
                icon: "success"
            });

            setTimeout(function(){
                window.location.replace(window.location.href);
            }, 2500);
         });
        
    </script>
 
@endif



@endsection