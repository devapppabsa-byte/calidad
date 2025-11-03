@extends('plantilla')
@section('contenido')
@section('title', 'FORMATOS GENERADOS')
@include('assets.nav')

<div class="container bg-white mt-4 mb-3 sombra border border-5">
    <div class="row">
        <div class="col-12 text-center p-3">
            <h3 class="fw-bold">FORMATOS DE RECEPCIÓN DE MATERIA PRIMA</h3>
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
            <a href="{{route('fmp.lleno', $formato->id)}}" class="mx-2 formato">
                <div class="row p-3 resizeable-table mt-1 border justify-content-center d-flex align-items-center"> 
                    <div class=" col-sm-12 col-md-6 col-lg-2 p-2 border-start">
                        <b>Folio: </b> <br>
                        <span class="fw-bold text-danger">{{$formato->folio}} </span>
                    </div>
                    <div class=" col-sm-12 col-md-6 col-lg-3 p-2 border-start">
                        <b>Fecha: </b> <br>
                        <span>{{$formato->fecha}} <br>
                            <b>Hora:</b> <br>
                            {{substr($formato->created_at, -8, -3)}}
                        </span>
                    </div>
                    <div class=" col-sm-12 col-md-12 col-lg-4 p-2 border-start">
                        <b>Producto: </b> <br>
                        <span> {{$formato->producto}}</span> <br>
                        <b>Proveedor: </b> <br>
                        <span>{{$formato->proveedor}}</span>
                    </div>

                    <div class=" col-sm-12 col-md-12 col-lg-3 p-2 border-start text-center">
                        <div class="row justify-content-around">
                            <div class="col-3 text-center">
                                <span>Bascula: 
                                @if ($formato->reviso_bascula)
                                    <i class="fa fa-check  mx-2"></i> </span>
                                @elseif ($formato->reviso_bascula=='')
                                    <i class="fa fa-clock mx-2"></i> </span>
                                @endif
                            </div>
                            <div class="col-3 text-center">
                                <span>Producción: 
                                @if ($formato->reviso_produccion)
                                    <i class="fa fa-check mx-2"></i> </span>
                                @elseif ($formato->reviso_produccion=='')
                                    <i class="fa fa-clock  mx-2"></i> </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @empty
                <li>No hay datos</li>    
            @endforelse
        </div>

    </div>
</div>
<!-- PANEL PARA MOSTRAR LA TABLA CON LOS RESULTADOS DE LA BUSQUEDA -->


{{-- alertas de que el usurio se agrego con exito o que hubo un error se desaparecen en 3 segundos--}}
@if (session('creado'))
    <script>
        window.addEventListener('load', function(){
            Swal.fire({
                title: "Hecho",
                text:  "{!! session('creado') !!}",
                icon: "success"
            });

            setTimeout(function(){
                window.location.replace(window.location.href);
            }, 3500);
        });
        
    </script>
@endif



@endsection