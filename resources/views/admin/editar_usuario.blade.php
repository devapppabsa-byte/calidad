@extends('plantilla')
@section('contenido')
@include('assets.nav')





<br>
<br>
<br>
<br>


{{-- boton de regresar --}}
<div class="container mt-4">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-2 text-center">
            <a href="{{route('lista.usuarios')}}" class="btn btn-dark text-white btn-sm p-2 w-100 fw-bold">Regresar</a>
        </div>
    </div>
</div>

{{-- boton de regresar --}}




<!-- FORMLARO DE EDITAR USUARIOS -->
<form action="{{route('usuarios.update', $usuario->id)}}" method="POST">
    @csrf @method('PATCH')



<div class="container mt-5">
    <div class="row mt-5 justify-content-center">      
        <div class="col-sm-10 col-md-6 col-lg-4 mt-5 bg-white p-4 sombra border border-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h5>EDITAR  USUARIOS</h5>
                </div>
            </div>

            <div class="row mt-5 p-2">

                <div class="form-group">
                    <label for="" class="fw-bold">NOMBRE COMPLETO</label>
                    <input type="text" value="{{$usuario->nombre_completo}}" class="form-control" name="nombre" >
                    <input type="hidden" value="{{$usuario->id}}" class="form-control" name="id" >
                </div>

                <div class="form-group mt-3">
                    <label for="" class="fw-bold">CORREO ELECTRONICO</label>
                    <input type="email" value="{{$usuario->email}}" class="form-control" name="email">
                </div>
                
                <div class="form-group mt-3 row">
                    <div class="col-12">
                        <label for="" class="fw-bold">CONTRASEÑA</label>
                    </div>
                    <div class="col-11">
                        <input type="password" id="password" name="password" class="form-control" value="{{$usuario->password}}" required>
                    </div>
                    <div class="col-1 mt-2 p-0 text-center">
                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                </div>



                <div class="form-group mt-3">
                    <label for="" class="fw-bold">AREA</label>
                    <select class="form-select mt-1 form-control-sm p-0 text-center" name="area" >
                        
                        @if ($usuario->area == 'CALIDAD')
                            <option selected value="{{$usuario->area}}">{{$usuario->area}}</option>
                            <option value="PRODUCCION">PRODUCCIÓN</option>
                            <option value="BASCULA">BASCULA</option>
                            <option value="ALMACEN PT">ALMACEN PT</option>
                            <option value="ALMACEN MP">ALMACEN MP</option> 
                            <option value="RECEPCIONES">RECEPCIONES</option>  
                        @endif

                        @if ($usuario->area == 'PRODUCCION')
                            <option selected value="{{$usuario->area}}">{{$usuario->area}}</option>
                            <option value="CALIDAD">CALIDAD</option>
                            <option value="BASCULA">BASCULA</option>
                            <option value="ALMACEN PT">ALMACEN PT</option>
                            <option value="ALMACEN MP">ALMACEN MP</option> 
                            <option value="RECEPCIONES">RECEPCIONES</option>  
                        @endif

                        @if ($usuario->area == 'BASCULA')
                            <option selected value="{{$usuario->area}}">{{$usuario->area}}</option>
                            <option value="CALIDAD">CALIDAD</option>
                            <option value="PRODUCCION">PRODUCCIÓN</option>
                            <option value="ALMACEN PT">ALMACEN PT</option>
                            <option value="ALMACEN MP">ALMACEN MP</option>
                            <option value="RECEPCIONES">RECEPCIONES</option>   
                        @endif

                        
                        @if ($usuario->area == 'ALMACEN MP')
                            <option selected value="{{$usuario->area}}">{{$usuario->area}}</option>
                            <option value="ALMACEN PT">ALMACEN PT</option>                        
                            <option value="CALIDAD">CALIDAD</option>
                            <option value="PRODUCCION">PRODUCCIÓN</option>
                            <option value="BASCULA">BASCULA</option>
                            <option value="RECEPCIONES">RECEPCIONES</option>  
                        @endif

                        @if ($usuario->area == 'ALMACEN PT')
                            <option selected value="{{$usuario->area}}">{{$usuario->area}}</option>
                            <option value="ALMACEN MP">ALMACEN MP</option>                        
                            <option value="CALIDAD">CALIDAD</option>
                            <option value="PRODUCCION">PRODUCCIÓN</option>
                            <option value="BASCULA">BASCULA</option>
                            <option value="RECEPCIONES">RECEPCIONES</option>   
                        @endif


                        @if ($usuario->area == 'RECEPCIONES')
                            <option selected value="{{$usuario->area}}">{{$usuario->area}}</option>
                            <option value="ALMACEN MP">ALMACEN MP</option>    
                            <option value="ALMACEN PT">ALMACEN PT</option>                        
                            <option value="CALIDAD">CALIDAD</option>
                            <option value="PRODUCCION">PRODUCCIÓN</option>
                            <option value="BASCULA">BASCULA</option>
                        @endif





                    </select>
                </div>




{{-- Lo que tiene hacer uno por no saber manejar los ciclos ¬¬ --}}
                <div class="form-group mt-3">
                    <label for="" class="fw-bold">PLANTA</label>
                    <select class="form-select mt-1 form-control-sm p-0 text-center" name="planta">
                        @if ($usuario->planta == '1')
                            <option selected value="{{$usuario->planta}}">{{$usuario->planta}}</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        @endif

                        @if ($usuario->planta == '2')
                            <option selected value="{{$usuario->planta}}">{{$usuario->planta}}</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        @endif

                        @if ($usuario->planta == '3')
                            <option selected value="{{$usuario->planta}}">{{$usuario->planta}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        @endif
                    </select>
                </div>
{{-- Lo que tiene hacer uno por no saber manejar los ciclos ¬¬ --}}




                <div class="form-group mt-5 text-center">
                    <button class="btn btn-success w-75">
                       <i class="fa fa-save mx-1"></i> ACEPTAR
                    </button>
                </div>

            </div>
        </div>


        
        
        
    </div>
</div>

</form>
<!-- FORMLARO DE EDITAR USUARIOS -->



@endsection