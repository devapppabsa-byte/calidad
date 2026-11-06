@extends('plantilla')
@section('contenido')
@include('assets.nav')
@section('title', 'Editando encabezados')

<div class="container-fluid mt-3">

    <div class="row justify-content-center mt-4">
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-8">
            <h3 class="fw-bold text-center">ACTUALIZAR ENCABEZADOS DE FORMATOS</h3>
            <p class="text-center text-muted">Los cambios se reflejan en todos los formatos (crear, ver y revisar).</p>
        </div>
    </div>

    @if(session('success'))
    <div class="row justify-content-center mt-2">
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="row justify-content-center mt-2">
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-8">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif

    <div class="row justify-content-around mt-3 mb-5">

        @foreach(['fmp' => 'FORMATO DE RECEPCION DE MATERIA PRIMA (FMP)', 'fpnc' => 'NOTIFICACION DE PRODUCTO NO CONFORME (FPNC)', 'fvu' => 'VERIFICACION DE UNIDADES (FVU)'] as $formato => $titulo)
        @if(!empty($encabezados[$formato]))
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-3 border m-3 bg-white sombra p-4">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h5 class="fw-bold">{{$titulo}}</h5>
                </div>
            </div>

            <form action="{{route('encabezados.update', $formato)}}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label class="form-label fw-bold">Nombre del formato</label>
                    <input type="text" name="nombre" class="form-control" maxlength="150" required
                        value="{{old('nombre', $encabezados[$formato]->nombre)}}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Codigo</label>
                    <input type="text" name="codigo" class="form-control" maxlength="60" required
                        value="{{old('codigo', $encabezados[$formato]->codigo)}}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Version</label>
                    <input type="text" name="version" class="form-control" maxlength="20" required
                        value="{{old('version', $encabezados[$formato]->version)}}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Vigencia</label>
                    <input type="text" name="vigencia" class="form-control" maxlength="60" required
                        value="{{old('vigencia', $encabezados[$formato]->vigencia)}}">
                </div>

                @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger p-2" role="alert">{{$error}}</div>
                    @endforeach
                @endif

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save me-2"></i>Guardar {{strtoupper($formato)}}
                    </button>
                </div>
            </form>
        </div>
        @endif
        @endforeach

    </div>

</div>

@endsection
