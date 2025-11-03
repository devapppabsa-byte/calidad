@extends('plantilla')
@section('contenido')
@include('assets.nav')
{{-- @include('assets.nav_admin') --}}


{{-- boton de regresar --}}
<div class="container bg-white mt-4 mb-3 sombra border border-5">
    <div class="row">
        <div class="col-12 text-center p-3">
            <h3 class="fw-bold">USUARIOS REGISTRADOS</h3>
            {{-- <a href="{{route('admin.view')}}" class="btn btn-success btn-sm">
                Regresar
            </a> --}}
        </div>
    </div>
</div>
{{-- boton de regresar --}}






<form method="POST" action="{{route('lista.buscados')}}" >
@csrf
        <!-- INPUT PARA INGRESAR DATOS PARA BUSCAR -->
            <div class="container mt-2 bg-white p-4 border border-5 sombra">
                <div class="row">

                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-sm-12 col-md-7 col-lg-2 mt-3">
                                <input type="text" id="query" name="query" class="form-control" autofocus >
                            </div>
                            <div class="col-sm-12 col-md-5 col-lg-2 d-flex align-items-center mt-3">
                                <button class="btn btn-success btn-sm w-100 "> <i class="fa fa-search"></i> Buscar</button>
                            </div>
                            <div class=" col-sm-12 col-md-12 col-lg-7"></div>
                            <div class=" col-sm-12 col-md-8 col-lg-1 mt-3 text-center">
                                <a href="{{route('admin.add_usuario')}}" class="btn btn-success " id="add_users"  data-toggle="tooltip" data-placement="top" title="Agregar usuarios">
                                    <i class="fa fa-user-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <!-- INPUT PARA INGRESAR DATOS PARA BUSCAR -->
</form>







<!-- PANEL PARA MOSTRAR LA TABLA CON LOS RESULTADOS DE LA BUSQUEDA -->
<div class="container mt-4">
    <div class="row">
        <div class="col-12 bg-light p-4">


@if ($resultados!=null)

            @forelse ($resultados as $resultado)
                
            
                        <div class="row p-3  mt-2"> 
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <h6 class="mt-2">{{$resultado->nombre_completo}}</h6>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-2">
                                <h6 class="mt-2"> {{$resultado->area}} </h6>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <h6 class="mt-2">{{$resultado->email}}</h6>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-3 text-end">
                                <div class="row d-flex justify-content-end">
                                    <div class="col-6">
                                        <a href="{{route('editar.usuarios', $resultado->id)}}" class="btn btn-info btn-sm text-white w-100">
                                            <i class="fa fa-edit mx-1 "></i> EDITAR
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{route('eliminar.usuario', $resultado->id)}}" class="btn btn-danger btn-sm text-white w-100" >
                                            <i class="fa fa-trash mx-1"></i> ELIMINAR
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        @empty
                         <li>No hay registros</li>
                        @endforelse
    
        @else

                                <h5>No se encontraron resultados</h5>
            
        @endif   



        </div>
    </div>
</div>
<!-- PANEL PARA MOSTRAR LA TABLA CON LOS RESULTADOS DE LA BUSQUEDA -->



{{-- alertas de que el usurio se agrego con exito o que hubo un error se desaparecen en 3 segundos--}}
@if (session('eliminado'))
    <script>
         window.addEventListener('load', function(){
            Swal.fire({
                title: "Hecho",
                text:  "{{session('eliminado')}}",
                icon: "success"
            });

            setTimeout(function(){
                window.location.replace(window.location.href);
            }, 2000);
         });
        
    </script>
@endif


{{-- alertas de que el usurio se agrego con exito o que hubo un error se desaparecen en 3 segundos--}}
@if (session('actualizado'))
    <script>
         window.addEventListener('load', function(){
            Swal.fire({
                title: "Hecho",
                text:  "{{session('actualizado')}}",
                icon: "success"
            });

            setTimeout(function(){
                window.location.replace(window.location.href);
            }, 2000);
         });
        

       $('#add_users').tooltip(

       ) 


    </script>
@endif





@endsection