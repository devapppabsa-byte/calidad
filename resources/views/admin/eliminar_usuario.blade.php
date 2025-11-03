@extends('plantilla')
@section('contenido')
@include('assets.nav')    



<div class="container mt-5">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-8 mt-5 bg-white p-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h3> ¿Eliminar Usuario? </h3>
                    <h5>{{$usuario->nombre_completo}}</h5>
                </div>

                <form method="POST" action="{{route('usuario.destruir', $usuario->id)}}">
                    @csrf @method('DELETE')
                    <div class="col-12 mt-5">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-danger w-100 h4">SI</button>
                            </div>
                </form>
                            <div class="col-6">
                                <a href="{{route('lista.usuarios')}}" class="btn btn-primary w-100 h4">NO</a>
                            </div>
                        </div>
                    </div>
                

            </div>
        </div>
    </div>
</div>




@endsection