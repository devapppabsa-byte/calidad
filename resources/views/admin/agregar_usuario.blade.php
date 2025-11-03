@extends('plantilla')
@section('contenido')
@include('assets.nav')
@section('title', 'Agregar Usuarios')



{{-- boton de regresar --}}
{{-- <div class="container mt-4">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-2 text-center">
            <a href="{{route('lista.usuarios')}}" class="btn btn-success text-white btn-sm p-2 w-100 fw-bold">Regresar</a>
        </div>
    </div>
</div> --}}

{{-- boton de regresar --}}



<form action="{{route('agregar.usuario')}}" method="POST" >
    @csrf
<!-- FORMLARO DE AGREGAR USUARIOS -->

<div class="container mt-5">
    <div class="row mt-5 justify-content-center">
        
        <div class="col-sm-10 col-md-6 col-lg-4 mt-5 bg-white p-4 sombra border border-5">




            <div class="row">
                <div class="col-12 text-center">
                    <h5>AGREGAR USUARIOS</h5>
                </div>
            </div>

            <div class="row mt-5 p-2">

                <div class="form-group">
                    <label for="" class="fw-bold">NOMBRE COMPLETO</label>
                    <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" autofocus >
                    {!!$errors->first('nombre', '<small class="text-danger">:message</small>')!!}
                </div>

                <div class="form-group mt-3">
                    <label for="" class="fw-bold">CORREO ELECTRONICO</label>
                    <input type="email" name="email" class="form-control" value="{{old('email')}}" required>
                    {!!$errors->first('email', ' <small class="text-danger">:message</small>')!!}
                </div>
                
                <div class="form-group mt-3 row">  {{-- Se hizo todo este desmadre para poder acomodar al ojito a un lado del input --}}
                    <div class="col-12">
                        <label for="" class="fw-bold">CONTRASEÑA</label>
                    </div>
                    <div class="col-11">
                        <input type="password" id="password" name="password" class="form-control" value="{{old('password')}}" required>
                    </div>
                    <div class="col-1 mt-2 p-0 text-center">
                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    {!!$errors->first('password', '<small class="text-danger">:message</small> ' )!!}
                </div>



                <div class="form-group mt-3">
                    <label for="" class="fw-bold">AREA</label>
                    <select class="form-select mt-1 form-control-sm p-0 text-center" name="area" >
                        <option value="CALIDAD">CALIDAD</option>
                        <option value="PRODUCCION">PRODUCCIÓN</option>
                        <option value="BASCULA">BASCULA</option>
                        <option value="ALMACEN MP">ALMACEN MP</option>
                        <option value="ALMACEN PT">ALMACEN PT</option>
                        <option value="RECEPCIONES">RECEPCIONES</option>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="" class="fw-bold">PLANTA</label>
                    <select class="form-select mt-1 form-control-sm p-0 text-center" name="planta">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>



                <div class="form-group mt-5 text-center">
                    <button class="btn btn-success w-75" type="submit">
                       <i class="fa fa-save mx-1"></i> ACEPTAR
                    </button>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- FORMLARO DE AGREGAR USUARIOS -->

</form>



{{-- alertas de que el usurio se agrego con exito o que hubo un error se desaparecen en 3 segundos--}}
@if (session('success'))
    <script>
         window.addEventListener('load', function(){
            Swal.fire({
                title: "Hecho",
                text:  "{{session('success')}}",
                icon: "success"
            });

            setTimeout(function(){
                window.location.replace(window.location.href);
            }, 1500);
         });
        
    </script>
 
@endif




@endsection