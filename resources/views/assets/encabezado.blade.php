{{-- Encabezado editable de los formatos: fmp | fpnc | fvu. Parametro opcional: $pagina (default '1 de 1') --}}
@php
    $enc = \App\Models\Encabezado::de($formato ?? 'fmp');
    $colIzq = ($formato ?? '') === 'fpnc'
        ? 'col-sm-12 col-md-3 col-lg-4 d-flex align-items-center p-2 mt-2'
        : 'col-sm-12 col-md-4  col-lg-4 centrar-verticalmente p-2 mt-2';
    $colDer = ($formato ?? '') === 'fpnc'
        ? ' col-sm-12 col-md-5 col-lg-4 border mt-2'
        : ' col-sm-12 col-md-4 col-lg-4 border mt-2';
    $rowNom = ($formato ?? '') === 'fvu' ? 'row d-flex align-items-center' : 'row';
    $spanNom = ($formato ?? '') === 'fmp' ? 'text-center' : 'text-center mt-3';
@endphp
<!-- encabezado -->
<div class="container shadow shadow-sm bg-white">
  <div class="row border border-5">

    <div class="{{$colIzq}}">
      <img src="{{asset('img/logo.png')}}" class="mx-auto img-fluid" alt="">
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4 border mt-2">
      <div class="row text-center border">
        <h3>FORMATO</h3>
      </div>

      <div class="{{$rowNom}}">
            <span class="{{$spanNom}}">{{$enc->nombre}}</span>
      </div>
    </div>

    <div class="{{$colDer}}">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-4 border fw-bold text-center">Codigo</div>
        <div class="col-sm-6 col-md-8 col-lg-8 border p-0 text-center">{{$enc->codigo}}</div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-4 border fw-bold text-center">Versión</div>
        <div class="col-sm-6 col-md-8 col-lg-8 border p-0 text-center">{{$enc->version}}</div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-4 border fw-bold text-center">Vigencia</div>
        <div class="col-sm-6 col-md-8 col-lg-8 border p-0 text-center">{{$enc->vigencia}}</div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-4 border fw-bold text-center">Página</div>
        <div class="col-sm-6 col-md-8 col-lg-8 border p-0 text-center">{{$pagina ?? '1 de 1'}}</div>
      </div>

    </div>

  </div>
</div>
<!-- encabezado -->
