@extends('plantilla')
@section('contenido')
@section('title', Auth::user()->nombre_completo )

@if (Auth()->user()->area == 'CALIDAD')
    @include('assets.nav_user')
@else
    @include('assets.nav')
@endif






<!-- MENU DE OPCIONES -->
<div class="container">

<div class="row d-flex justify-content-around">
        



@if (Auth()->user()->area == 'CALIDAD')


<div class="col-10 col-sm-10 col-md-10 col-lg-5 bg-white shadow p-5 m-5 ">
    <div class="row">
        <div class="col-12 text-center arvo">
            <h4>Top Recepcionados - Planta {{Auth()->user()->planta}}</h4>
        </div>
        <div class="col-12 mt-4 scroll-estadisticas  p-4">
                @php
                    $contador = 1;
                @endphp
                @forelse ($fmp_mas_recibidos as $fmp)
                      
                    <b> {{$contador++}}.- {{$fmp->producto}}</b> <br>  
                      
                    <small class="badge text-bg-light px-4 mb-4">{{$fmp->cantidad}} Recepciones</small>
                    <br> 
                @empty
                


                @endforelse
        </div>
    </div>
</div>




<div class="col-10 col-sm-10 col-md-10 col-lg-5 bg-white shadow p-5 m-5">
    <div class="row">
        <div class="col-12 text-center arvo">
            <h4>A caducar en los siguientes 30 dias - Planta {{Auth()->user()->planta}}</h4>
        </div>
        <div class="col-12 mt-4 scroll-estadisticas">

            <div class="accordion accordion-flush" id="accordionFlushExample">
                @forelse ($caducidades_proximas as $fmp)

                    <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#coll{{$fmp->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                {{$fmp->producto}} - {{$fmp->fecha_larga}}
                                </button>
                            </h2>
                            <div id="coll{{$fmp->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                   <div class="row justify-content-center">
                                        <div class="col-6 text-center">
                                           <b> Lote: </b>{{$fmp->lote}}
                                        </div>
                                        <div class="col-6 text-center">
                                            <a href="{{route('fmp.lleno', $fmp->id)}}" class="btn btn-light btn-sm">
                                                <i class="fa fa-eye mx-1"></i>
                                                Folio: {{$fmp->folio}}</a>
                                        </div>
                                   </div>
                                </div>
                            </div>
                    </div> 
                @empty
                    <div class="row">
                        <div class="col-12 text-center mt-5">
                            <i class="fa-solid fa-wand-magic-sparkles fa-5x text-center"></i>
                        </div>
                        <div class="col-12 text-center p-4">
                            <p class="cascadia h5">No hay proximos a caducar en los siguientes 30 dias</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>


@endif





@if (Auth::user()->area == 'PRODUCCION' || Auth::user()->area == 'BASCULA' )

        <div class="col-sm-12 col-md-3 mt-1 col-lg-3 sombra btn resizeable-div border border-5 mt-5">
            <div class="row d-flex align-items-center">
                <a href="{{route('pendientes.revisar')}}">
                    <div class="col-12">
                        <p class="mx-auto h5">FORMATOS POR REVISAR</p>
                    </div>
                    <div class="col-12">
                        <small>SON LOS FORMATOS QUE AÚN NO HAZ REVISADO</small> <br>
                        <i class="fa fa-eye mt-3 fa-2x"></i>
                    </div>
                </a>
            </div>
        </div>



            {{-- card documentos generados formato materia prima --}}
        <div class="col-sm-12 col-md-3 mt-1 col-lg-3 sombra btn resizeable-div  border border-5 mt-5">
            <a href="{{route('fmp.generados')}}">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h5 class="mx-auto">DOCUMENTOS GENERADOS</h5>
                        <small>FORMATO DE RECEPCIÓN DE MATERIA PRIMA</small>
                    </div>
                <div class="col-12">
                       <i class="fa-solid fa-magnifying-glass fa-2x mt-3"></i>
                 </div>
                </div>
            </a>
        </div>
              {{-- card documentos generados formato materia prima --}}            

        


 
@endif


@if (Auth::user()->area == 'ALMACEN PT' )    

    <div class="col-sm-12 col-md-3 mt-1 col-lg-3 sombra btn resizeable-div  border border-5 mt-5">
        <div class="row">
            <a href="{{route('fvu.pendientes')}}">
                <div class="col-12">
                    <p class="mx-auto h5">REVISAR FORMATO DE VERIFICACIÓN DE UNIDADES</p>
                </div>
                <div class="col-12">
                    <i class="fa fa-circle-check mt-3 fa-2x"></i>
                </div>
            </a>
        </div>
    </div>

@endif


@if (Auth::user()->area == 'ALMACEN MP' || Auth::user()->area == 'RECEPCIONES')
                {{-- card documentos generados formato materia prima --}}
                <div class="col-sm-12 col-md-3 mt-1 col-lg-3 sombra btn resizeable-div  border border-5 mt-5">
                    <a href="{{route('fmp.generados')}}">
                        <div class="row">
                            <div class="col-12 mt-3">
                                <h5 class="mx-auto">DOCUMENTOS GENERADOS</h5>
                                <small>FORMATO DE RECEPCIÓN DE MATERIA PRIMA</small>
                            </div>
                        <div class="col-12">
                               <i class="fa-solid fa-magnifying-glass fa-2x mt-3"></i>
                         </div>
                        </div>
                    </a>
                </div>
                      {{-- card documentos generados formato materia prima --}}  
@endif


    </div>
</div>

<!-- MENU DE OPCIONES -->









{{-- alertas de que el usurio se agrego con exito o que hubo un error se desaparecen en 3 segundos--}}
@if (session('creado'))
    <script>
         window.addEventListener('load', function(){
            Swal.fire({
                title: "Hecho",
                text:  "{{session('creado')}}",
                icon: "success"
            });

            setTimeout(function(){
                window.location.replace(window.location.href);
            }, 2500);
         });
        
    </script>
 
@endif





{{-- alertas de que el usurio se agrego con exito o que hubo un error se desaparecen en 3 segundos--}}
@if (session('agregado'))
    <script>
         window.addEventListener('load', function(){
            Swal.fire({
                title: "Hecho",
                text:  "{{session('agregado')}}",
                icon: "success"
            });

            setTimeout(function(){
                window.location.replace(window.location.href);
            }, 2500);
         });
        
    </script>
 
@endif





@endsection