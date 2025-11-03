@extends('plantilla')
@section('contenido') 
@section('title', $fmp->folio)  
@if(Auth::guard('adminis')->user())
  @include('assets.nav')
@else
  @include('assets.nav_user')
@endif

{{-- boton de imprimir --}}
<div class="container my-2">
  <div class="row px-0">
      <div class="col-12 text-center">
          <div class="btn-group">
              <button  class="btn btn-dark btn-sm" id="save_pdf">
                  <i class="fa fa-file-pdf"></i>
                  DESCARGAR PDF
              </button>
          </div>
      </div>
  </div>
</div>
{{-- boton de imprimir --}}


<div class="container bg-white  p-5 sombra" id="contenedor_print"> <!--Contenedor de todo -->

<!-- encabezado -->

<div class="container shadow shadow-sm">
  <div class="row border border-5">
    
    <div class="col-sm-12 col-md-4  col-lg-4 centrar-verticalmente p-2 mt-2">
      <img src="{{asset('img/logo.png')}}" class="mx-auto img-fluid" alt="">
    </div>
    
    <div class="col-sm-12 col-md-4 col-lg-4 border mt-2"> 
      <div class="row text-center border">
        <h3>FORMATO</h3>
      </div>
      
      <div class="row">
            <span class="text-center">RECEPCIÓN DE MATERIA PRIMA Y MATERIAL DE EMPAQUE</span>
      </div>
    </div>

    <div class=" col-sm-12 col-md-4 col-lg-4 border mt-2">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-4 border fw-bold text-center">Codigo</div>
        <div class="col-sm-6 col-md-8 col-lg-8 border p-0 text-center" >FO/GP/CC/070/01</div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-4 border fw-bold text-center">Versión</div>
        <div class="col-sm-6 col-md-8 col-lg-8 border p-0 text-center" >03</div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-4 border fw-bold text-center">Vigencia</div>
        <div class="col-sm-6 col-md-8 col-lg-8 border p-0 text-center" >
          AGOSTO 2023</div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-4 border fw-bold text-center">Pagina</div>
        <div class="col-sm-6 col-md-8 col-lg-8 border p-0 text-center" >1 de 1</div>
      </div>

    </div>
  
  </div>
</div>
<!-- encabezado -->
    

<!-- datos del formato -->
<div class="container">
  <div class="row mt-3 p-4 justify-content-center shadow shadow-sm">

  <div class="col-sm-12 col-md-5 col-lg-5 border">

      <div class="row">
        <div class="col-auto mt-1">
          <span class="centrar-verticalmente h6">Planta:</span>
        </div>       
        <div class=" col-sm-3 col-md-3 col-lg-2 bg-white mt-1">
          <h6 class="mt-2">{{$fmp->planta}}</h6>
        </div>
      </div>
      
      <div class="row mt-2 border-top">
        <div class="col-auto mt-1">
          <span class="centrar-verticalmente h6">Fecha:</span>
        </div>       
        <div class="col-auto bg-white mt-1">
          <span class="font-weight-bold">{{$fmp->fecha}}</span>
        </div>
    </div>

  </div>


    <div class="col-sm-12 col-md-2 col-lg-2 my-3 "></div>     <!-- Este es para que se quede el espacio en blando entre las dos tablas de datos -->


  <div class="col-sm-12 col-md-5 col-lg-5 border p-2">
    
    <div class="row border-bottom">
      <div class="col-auto mt-1">
        <span class="centrar-verticalmente h6">Folio:</span>
      </div>       
      <div class="col-auto bg-white mt-1">
        <span class="text-danger font-weight-bold h6">{{$fmp->folio}}</span>
      </div>
    </div>
    
    <div class="row mt-2">
      <div class="col-auto">
        <span class="centrar-verticalmente h6">Hora de recepción:</span>
      </div>       
      <div class="col-auto bg-white ">
        <span class="fw-bold"> {{$fmp->hora_recepcion}} </span>
      </div>
    </dv>      
    </div>
  </div>
 
  </div>
</div>
<!-- datos del formato -->


<!-- Titulos -->
<div class="container mt-5">

  <div class="row justify-content-around shadow shadow-sm py-3 border">

<!-- COLUMNA DE LOS "DATOS DE LA MATERIA PRIMA" -->
    <div class="col-sm-12 col-md-6  col-lg-6">
      <div class="row justify-content-around">

        <div class="col-lg-8 mx-1 text-center fondo ">
          <span class="mt-1 h6 h6-sm">DATOS DE MATERIA PRIMA</span>
        </div>

        <div class="col-10 mt-3 border fondo-titulos border border-gray">
          <h6 class="mt-1">PRODUCTO:</h6>
        </div>

        <div class="col-10 text-left p-0">
            <h6 class="m-2">{{$fmp->producto}}</h6>
        </div>

        <div class="col-10 mt-3 border fondo-titulos">
            <h6 class="mt-1">PROVEEDOR</h6>
        </div>

        <div class="col-10 p-0">
            <h6 class="m-2">{{$fmp->proveedor}}</h6>
        </div>

        <div class="col-12 col-sm-12 col-md-10 col-lg-12">
            <div class="row justify-content-around">
              <div class="col-10 col-sm-6 col-md-12 col-lg-10 fondo-titulos mt-3">
                  <div class="row">
                    <div class="col-12 border">
                      <h6 class="mt-1  ">CADUCIDAD: </h6>
                    </div>
                    <div class="col-12 ">
                      <span class="p-0" >{{$fmp->caducidad}}</span>
                    </div>
                  </div>
              </div>
    
              <div class="col-10 col-sm-12 col-md-12 col-lg-10 fondo-titulos mt-3">
                <div class="row">
                  <div class="col-12  border">
                    <h6 class="mt-1  ">FLEJE: </h6>
                  </div>
                  <div class="col-12">
                    <span class="p-0" >{{$fmp->fleje}}</span>
                  </div>
                </div>
              </div>

            </div>
        </div>

        <div class="col-10 fondo-titulos my-3 text-center border">
          <div class="row justify-content-center">

            <div class="col-6 p-0">
              <h6 class="mt-1">CANT. RECEPCIONADA: </h6>
              @if ($fmp->cantidad_recepcionada && $fmp->unidad_medida)
                <span class="" >{{$fmp->cantidad_recepcionada}} - {{$fmp->unidad_medida}}</span>
              @else
                <span class="text-secondary" >
                  <i class="fa fa-info-circle"></i>
                  N/A
                </span>
              @endif
            </div>

            
            <div class="col-6 p-0">
              <h6 class="mt-1 mx-2">LOTE: </h6>

              @if ($fmp->lote == 'pendiente' and isset(Auth::user()->nombre_completo))
                <h6 class="m-2 text-danger fw-bold p-0">{{$fmp->lote}}</h6>
                
                @if ($fmp->usuario_logeado === Auth::user()->nombre_completo)
                    <button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#lote">
                    <i class="fa fa-pen"></i>  RELLENAR LOTE
                    </button>
                @else
                  <button class="btn btn-danger  w-100" disabled>
                  <i class="fa fa-pen"></i>  RELLENAR LOTE
                  </button>
                @endif
    
              @else
                <h6 class="m-2 p-0">{{$fmp->lote}}</h6>
              @endif
            </div>

          </div>
      </div>



      </div>
    </div>
<!-- COLUMNA DE LOS "DATOS DE LA MATERIA PRIMA" -->



<!-- COLUMNA DE LOS "DATOS DEL TRANSPORTE" -->
    <div class="col-sm-12 col-md-6 col-lg-6">
      <div class="row justify-content-around">
        <!-- Titulo datos del transporte -->
        <div class="col-lg-8 mx-1 text-center fondo">
          <span class="mt-1 h6 ">DATOS DEL TRANSPORTE</span>
        </div>
        
        <div class="col-10 mt-3 border fondo-titulos border border-gray">
          <h6 class="mt-1">LINEA TRANSPORTISTA</h6>
        </div>
        
        <div class="col-10 text-left p-0">
            <h6 class="m-2">{{$fmp->linea_transportista}}</h6>
        </div>

        <div class="col-10 mt-3 fondo-titulos border border-gray ">
            <h6 class="mt-1">OPERADOR</h6>
        </div>

        <div class="col-10 p-0">
            <h6 class="m-2">{{$fmp->nombre_operador}}</h6>
        </div>

        <div class="col-10  fondo-titulos mt-3 border">        
            <h6 class="mt-2">PLACAS DEL TRACTO O TORTON :</h6>
        </div>

        <div class="col-10 p-0 mt-1">
            <h6 class="m-2">{{$fmp->placas_transporte}}</h6>
        </div>

        <div class="col-10  fondo-titulos mt-3 border">        
          <h6 class="mt-2">PLACAS CAJA :</h6>
        </div>

        <div class="col-10 p-0 mt-1">
            <h6 class="m-2">{{$fmp->placas_caja}}</h6>
        </div>

      </div>
<!-- COLUMNA DE LOS "DATOS DEL TRANSPORTE" -->
    </div>

  </div>
</div>
<!-- Titulos -->

 

<!-- TITULO DE "RESULTADOS DE LABORATORIO" -->
<div class="container mt-4">
  <div class="row justify-content-between">
    <div class="col-12 fondo text-center border border-dark">
      <h5 class="mt-2 font-weight-bold">RESULTADOS DEL LABORATORIO</h5>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-5 mt-3 border">
      <div class="row">
        <div class="col-6">
          <h6 class="mt-2">Hora entrada lab.: </h6>
        </div>
        <div class="col-6">
            <h6 class="m-2">{{$fmp->hora_entrada_lab}}</h6>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-5 border mt-3">
      <div class="row">
        <div class="col-6">
          <h6 class="mt-2">Hora de liberación:</h6>
        </div>
        <div class="col-6">
            <h6 class="m-2">{{$fmp->hora_liberacion}}</h6>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- TITULO DE "RESULTADOS DE LABORATORIO" -->









<!-- GRILLA DE PROPIEDADES DEL PRODUCTO -->
<div class="container mt-4 border py-4">

  <!-- FILA DE TEMPERATURA, HUMEDAD Y PESOS ESPECIFICO -->

  <div class="row justify-content-between">
    


    <div class="col-sm-12 col-md-12 col-lg-4 my-2">
      <div class="row justify-content-center border">
        <div class="col-5 mt-2">
          <small class="fw-bold">HUMEDAD: </small>
        </div>
          @if ($fmp->humedad)
          <div class="col-6">
              <h6 class="m-2">{{$fmp->humedad}} %</h6>
          </div>  

          @else
            <div class="col-6 fondo">
              <i class="fa-solid fa-info-circle text-info-emphasis mt-2"></i>
              <small class="text-info-emphasis mt-2" >N/A</small>
            </div>  
          @endif
      </div>
    </div>
    




    <div class="col-sm-12 col-md-12 col-lg-4 my-2">
      <div class="row justify-content-center border">
        <div class="col-5 mt-2">
          <small class="fw-bold">TEMP.: </small>
        </div>
          @if ($fmp->temperatura)
            <div class="col-6">
                <h6 class="m-2">{{$fmp->temperatura}} °C</h6>
            </div>  

          @else
            <div class="col-6 fondo">
              <i class="fa-solid fa-info-circle text-info-emphasis mt-2"></i>
              <small class="text-info-emphasis mt-2" >N/A</small>
            </div>  
          @endif 
      </div>
    </div>






    <div class="col-sm-12 col-md-12 col-lg-4 my-2">
      <div class="row justify-content-center border">
        <div class="col-5 mt-2">
          <small class="fw-bold">PESO ESPECIFICO: </small>
        </div>

          @if ($fmp->peso_especifico)
            <div class="col-6">
                <h6 class="m-2">{{$fmp->peso_especifico}} g/l</h6>
            </div>  

          @else
            <div class="col-6 fondo">
              <i class="fa-solid fa-info-circle text-info-emphasis mt-2"></i>
              <small class="text-info-emphasis mt-2" >N/A</small>
            </div>  
          @endif
        
      </div>
    </div>







  </div>

  <!-- FILA DE TEMPERATURA, HUMEDAD Y PESOS ESPECIFICO -->




  <!-- FILA DE GRANO DAÑADO, GRANO QUEBRADO E IMPUREZAS -->

  <div class="row justify-content-between">
    
    
    <div class="col-sm-12 col-md-12 col-lg-4 my-2">
      <div class="row justify-content-center border">
        <div class="col-5 mt-2">
          <small class="fw-bold">GRANO DAÑADO</small>
        </div>
          @if ($fmp->grano_maltratado)
          <div class="col-6">
              <h6 class="m-2">{{$fmp->grano_maltratado}}%</h6>
          </div>  

          @else
            <div class="col-6 fondo">
              <i class="fa-solid fa-info-circle text-info-emphasis mt-2"></i>
              <small class="text-info-emphasis mt-2" >N/A</small>
            </div>  
          @endif
      </div>
    </div>
    

    <div class="col-sm-12 col-md-12 col-lg-4 my-2">
      <div class="row justify-content-center border">
        <div class="col-5 mt-2">
          <small class="fw-bold">GRANO QUEBRADO</small>
        </div>
          @if ($fmp->grano_quebrado)
          <div class="col-6">
              <h6 class="m-2">{{$fmp->grano_quebrado}}%</h6>
          </div>  

          @else
            <div class="col-6 fondo">
              <i class="fa-solid fa-info-circle text-info-emphasis mt-2"></i>
              <small class="text-info-emphasis mt-2" >N/A</small>
            </div>  
          @endif 
      </div>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-4 my-2">
      <div class="row justify-content-center border">
        <div class="col-5 mt-2">
          <small class="fw-bold">IMPUREZAS</small>
        </div>
          @if ($fmp->impurezas)
          <div class="col-6">
              <h6 class="m-2">{{$fmp->impurezas}}%</h6>
          </div>  

          @else
            <div class="col-6 fondo">
              <i class="fa-solid fa-info-circle text-info-emphasis mt-2"></i>
              <small class="text-info-emphasis mt-2" >N/A</small>
            </div>  
          @endif
      </div>
    </div>

  </div>
  <!-- FILA DE GRANO DAÑADO, GRANO QUEBRADO E IMPUREZAS -->









  <!-- FILA DE CANTIDAD DE MUESTRA, DW Y PLAGAS -->
<div class="row justify-content-between">
    
    <div class="col-sm-12 col-md-12 col-lg-4 my-2">
      <div class="row justify-content-center border">
        <div class="col-5 mt-2">
          <small class="fw-bold">CANT. MUESTRA</small>
        </div>
          @if ($fmp->cantidad_muestra)
          <div class="col-6">
              <h6 class="m-2">{{$fmp->cantidad_muestra}} - {{$fmp->unidad_medida}}</h6>
          </div>  

          @else
            <div class="col-6 fondo">
              <i class="fa-solid fa-info-circle text-info-emphasis mt-2"></i>
              <small class="text-info-emphasis mt-2" >N/A</small>
            </div>  
          @endif
      </div>
    </div>
    


    <div class="col-sm-12 col-md-12 col-lg-4 my-2">
      <div class="row justify-content-center border">
        <div class="col-5 mt-2">
          <small class="fw-bold">*BX</small>
        </div>
          @if ($fmp->bx)
          <div class="col-6">
              <h6 class="m-2">{{$fmp->bx}}</h6>
          </div>  

          @else
            <div class="col-6 fondo">
              <i class="fa-solid fa-info-circle text-info-emphasis mt-2"></i>
              <small class="text-info-emphasis mt-2" >N/A</small>
            </div>  
          @endif 
      </div>
    </div>
   


    <div class="col-sm-12 col-md-12 col-lg-4 my-2">
      <div class="row justify-content-center border">
        <div class="col-5 mt-2">
          <small class="fw-bold">PLAGAS</small>
        </div>
        <div class="col-6">
            <h6 class="m-2">{{$fmp->plagas}}</h6>
        </div>   
      </div>
    </div>

  </div>
<!-- FILA DE CANTIDAD DE MUESTRA, DW Y PLAGAS -->










  <!-- FILA DE CERTIFICADO DE CALIDAD, BX Y ASEGURADO -->
  <div class="row justify-content-between">
    
    <div class="col-sm-12 col-md-12 col-lg-6 my-2">
      <div class="row justify-content-center border">
        <div class="col-5 mt-2">
          <small class="fw-bold">CERTIF. DE CALIDAD</small>
        </div>
        <div class="col-6">
            <h6 class="m-2">{{$fmp->certificado_calidad}}</h6>
        </div>
      </div>
    </div>



    <div class="col-sm-12 col-md-12 col-lg-6 my-2">
      <div class="row justify-content-center border">
        <div class="col-5 mt-2">
          <small class="fw-bold">ASEGURADO</small>
        </div>
        <div class="col-6">
            <h6 class="m-2">{{$fmp->asegurado}}</h6>
        </div>   
      </div>
    </div>

  </div>
  <!-- FILA DE CERTIFICADO DE CALIDAD, BX Y ASEGURADO -->









<!-- FILA DE COLOR Y OLOR CARACTERISTICO, MATERIA EXTRAÑA-->
<div class="row justify-content-between">
    
    <div class="col-sm-12 col-md-12 col-lg-6 my-2">
      <div class="row justify-content-center border">
        <div class="col-5 mt-2">
          <small class="fw-bold">COLOR Y OLOR CARACTERISTICO</small>
        </div>
        <div class="col-6">
            <h6 class="m-2">{{$fmp->color_olor_caracteristico}}</h6>
        </div>
      </div>
    </div>
    

    <div class="col-sm-12 col-md-12 col-lg-6 my-2">
      <div class="row justify-content-center border">
        <div class="col-5 mt-2">
          <small class="fw-bold">EQUIPO DE MUESTREO</small>
        </div>
        <div class="col-6">
            <h6 class="m-2">{{$fmp->equipo_muestreo}}</h6>
        </div>
      </div>
    </div>







  </div>
  <!-- FILA DE COLOR Y OLOR CARACTERISTICO, MATERIA EXTRAÑA-->








  <!-- FILA  DE EQUIPO DE MUESTREO Y FLOURECENCIA -->
  <div class="row justify-content-between">

    <div class="col-sm-12 col-md-12 col-lg-12 my-2">
      <div class="row justify-content-center border">
        <div class="col-5 mt-2">
          <small class="fw-bold">MATERIA EXTRAÑA</small>
        </div>
        @if ($fmp->materia_impropio)
        <div class="col-6">
            <h6 class="m-2">{{$fmp->materia_impropio}}</h6>
        </div>  

      @else
        <div class="col-6 fondo">
          <i class="fa-solid fa-info-circle text-info-emphasis mt-2"></i>
          <small class="text-info-emphasis mt-2" >N/A</small>
        </div>  
      @endif 
      </div>
    </div>
  
  </div>

  <!-- FILA  DE EQUIPO DE MUESTREO Y FLOURECENCIA -->


</div>
<!-- GRILLA DE PROPIEDADES DEL PRODUCTO -->






<!-- CONTAINER DE SUPERVISOR DEL MUESTREO, ACEPTADO POR CONCESIÓN Y DWG -->
<div class="container mt-4 bg-white">
  <div class="row justify-content-around">
    
    <div class="col-sm-12 col-md-12  col-lg-3 mt-3">
      <div class="row">
        <div class="col-12 border p-2 text-center">
          <h6 class="mt-2"> <b> METODO DE MUESTREO: </b> {{$fmp->metodo_muestreo}}</h6>
        </div>
        
        <div class="col-12 border p-2 text-center">
          <h6 class="mt-2">ACEPTADO POR CONCESIÓN</h6>
        </div>
        
        <div class="col-12 border p-2 text-center">
            <h6 class="m-2">{{$fmp->aceptado_concesion}}</h6>
        </div>
      
      </div>
    </div>
    


    <div class="col-sm-12 col-md-12  col-lg-3 mt-3">

      <div class="row">
        <div class="col-6 text-center border">
          <h6 class="mt-2">DWG (micrones)</h6>
        </div>

        @if ($fmp->dwg)
        <div class="col-6 border">
            <h6 class="m-2">{{$fmp->dwg}}%</h6>
        </div>  

        @else
          <div class="col-6 fondo">
            <i class="fa-solid fa-info-circle text-info-emphasis mt-2"></i>
            <small class="text-info-emphasis mt-2" >N/A</small>
          </div>  
        @endif

      </div>



      <div class="row">
        <div class="col-6 py-0 px-1  border">
          <h6 class="mt-2">M10 (%)</h6>
        </div>
          @if ($fmp->m10)
          <div class="col-6 border">
              <h6 class="m-2">{{$fmp->m10}}%</h6>
          </div>  

          @else
            <div class="col-6 fondo border border-white">
              <i class="fa-solid fa-info-circle text-info-emphasis mt-2"></i>
              <small class="text-info-emphasis mt-2" >N/A</small>
            </div>  
          @endif
      </div>






      <div class="row">
        <div class="col-6 py-0 px-1  border">
          <h6 class="mt-2">M16 (%)</h6>
        </div>
          @if ($fmp->m16)
          <div class="col-6 border">
              <h6 class="m-2">{{$fmp->m16}}%</h6>
          </div>  

          @else
            <div class="col-6 fondo border border-white">
              <i class="fa-solid fa-info-circle text-info-emphasis mt-2"></i>
              <small class="text-info-emphasis mt-2" >N/A</small>
            </div>  
          @endif
      </div>





      <div class="row">
        <div class="col-6 py-0 px-1  border">
          <h6 class="mt-2">M18 (%)</h6>
        </div>
            @if ($fmp->m18)
            <div class="col-6 border">
                <h6 class="m-2">{{$fmp->m18}}%</h6>
            </div>  

            @else
              <div class="col-6 fondo border border-white">
                <i class="fa-solid fa-info-circle text-info-emphasis mt-2"></i>
                <small class="text-info-emphasis mt-2" >N/A</small>
              </div>  
            @endif
      </div>







      <div class="row">
        <div class="col-6 py-0 px-1  border">
          <h6 class="mt-2">F(%)</h6>
        </div>
          @if ($fmp->f)
          <div class="col-6 border">
              <h6 class="m-2">{{$fmp->f}}%</h6>
          </div>  

          @else
            <div class="col-6 fondo">
              <i class="fa-solid fa-info-circle text-info-emphasis mt-2"></i>
              <small class="text-info-emphasis mt-2" >N/A</small>
            </div>  
          @endif
      </div>







    </div>
    



    <div class="col-sm-12 col-md-12  col-lg-4 mt-3 border border-4">

      <div class="row">
        <div class="col-12 text-center mt-4">
          <h4>SUPERVISO MUESTREO</h4>
        </div>
        <div class="col-12 text-center mt-4 fondo-titulos">
          <h4 class="mt-2">{{$fmp->superviso_muestreo}}</h4>
        </div>
      </div>

      <div class="row">
        <div class="col-6 text-center mt-4">
          <h5 class="mt-3">DICTAMEN FINAL</h5>
        </div>
        @if ($fmp->dictamen_final == 'ACEPTADO')
          <div class="col-6 text-center mt-4 bg-success text-white py-2">
             <li class="fa fa-circle-check"></li>
              <h6 class="">{{$fmp->dictamen_final}}</h6>
          </div>
            
        @else
        <div class="col-6 text-center mt-4 bg-danger text-white py-2">
          <li class="fa fa-circle-xmark"></li>
          <h6>{{$fmp->dictamen_final}}</h6>
        </div>   
        @endif
      </div>

    </div>

  </div>
</div>
<!-- CONTAINER DE SUPERVISOR DEL MUESTREO, ACEPTADO POR CONCESIÓN Y DWG -->






<!-- CONTENEDOR DE OBSERVACIONES -->
<div class="container mt-5">
  <div class="row mt-4 d-flex justify-content-around ">


        {{-- <div class="col-sm-12 col-md-12 col-lg-3">

          <div class="row">
            <div class="col-12">
              <h6>OBSERVACIONES BASCULA:</h6>
            </div>
            <div class="col-12">
              <i>
                @if ($fmp->observaciones_bascula && $fmp->reviso_bascula)
                    {{$fmp->observaciones_bascula}}
                @else 
                     <li>No hubo oberservaciones</li> 
                @endif 
              </i>
            </div>
          </div>

        </div>

        <div class="col-sm-12 col-md-12 col-lg-3">
          <div class="row">
            <div class="col-12">
              <h6>OBSERVACIONES PRODUCCION:</h6>
            </div>
            <div class="col-12">
              <i>
                @if ($fmp->observaciones_produccion && $fmp->reviso_produccion)
                {{$fmp->observaciones_produccion}}
                @else 
                    <li>No hubo oberservaciones</li> 
                @endif 
               </i>
            </div>
          </div>
        </div> --}}

        <div class="col-sm-12 col-md-12 col-lg-10 text-center">
          <div class="row">
            <div class="col-12">
              <h6>OBSERVACIONES CALIDAD:</h6>
            </div>
            <div class="col-12 text-justify ">
              <i>
                @if ($fmp->observaciones_realizador)
                {{$fmp->observaciones_realizador}}
                @else 
                    <li>No hubo oberservaciones</li> 
                @endif 
               </i>
            </div>
          </div>
        </div>


  </div>
</div>
<!-- CONTENEDOR DE OBSERVACIONES -->






<!-- CONTENEDOR DE LAS FIRMAS -->
<div class="container mt-5">
    <div class="row justify-content-around">




      <div class="col-sm-12 col-md-12 col-lg-3">
        <div class="row">
          <div class="col-12 text-center">
            <h3>BASCULA</h3>
          </div>

          @if ($fmp->reviso_bascula)
            <div class="col-12 text-white text-center bg-success">
              <i class="fa fa-circle-check mt-3"></i> 
              <h6> <b> REVISO:</b> {{$fmp->reviso_bascula}} </h6>
            </div>
          @else
            <div class="col-12 text-white text-center bg-secondary">
              <i class="fa fa-eye mt-3"></i> 
              <h6> FALTA POR REVISAR</h6>
            </div>     
          @endif

        </div>
      </div>



      <div class="col-sm-12 col-md-12 col-lg-3">
        <div class="row">
          <div class="col-12 text-center">
            <h3>PRODUCCIÓN</h3>
          </div>
          
          @if ($fmp->reviso_produccion)
            <div class="col-12 text-white text-center bg-success">
              <i class="fa fa-circle-check mt-3"></i> 
              <h6> <b> REVISO:</b> {{$fmp->reviso_produccion}} </h6>
            </div>
          @else
            <div class="col-12 text-white text-center bg-secondary">
              <i class="fa fa-eye mt-3"></i> 
              <h6> FALTA POR REVISAR</h6>
            </div>     
          @endif

        </div>
      </div>


      <div class="col-sm-12 col-md-12 col-lg-3">

        <div class="row">
          <div class="col-12 text-center">
            <h3>CALIDAD</h3>
          </div>
          
          <div class="col-12 text-white text-center bg-success">
            <i class="fa fa-circle-check mt-3"></i> 
            <h6> <b> REVISO:</b> {{$fmp->usuario_logeado}} </h6>
          </div>

        </div>


      </div>
    </div>
  </div>
  <!-- CONTENEDOR DE LAS FIRMAS -->






</div><!--Cierra contenedor de todo-->





{{-- MODAL DEL LOTE PENDIENTE --}}

@if ($fmp->lote == 'pendiente' and isset(Auth::user()->nombre_completo))

                {{-- modal de ADD PROVEDORES --}}
                <div class="modal fade d-print-none" id="lote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                      <div class="modal-content ">
                          <div class="modal-body">
                              <h4 class="text-center">Agregando el LOTE</h4>
                              <form action="{{route('add.lote', $fmp->id)}}" method="POST" class="mt-4">
                                  @csrf
                                  <div class="form-group">
                                      <input type="text" name="lote" class="form-control w-100 text-uppercase" placeholder="LOTE" required>
                                  </div>
                                  <div class="form-group mt-3 text-center">
                                      <button class="btn btn-success btn-sm w-50">
                                        Guardar 
                                      </button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
                      {{-- modal de ADD PROVEDORES --}}
      


@endif





<script>

 const save_pdf = document.getElementById('save_pdf');

 save_pdf.addEventListener('click', () => {

  save_pdf.innerHTML = "<img src='{{ asset('/img/loader.gif') }}' class='img-fluid' style='width:20px' >";

  setTimeout(() => {
    descargarPDF();
    save_pdf.innerHTML = "<i class='fa fa-check-circle mx-2'></i> DESCARGADO";

  }, 1000);



 })


  function descargarPDF() {
    var element = document.getElementById('contenedor_print'); // o `document.getElementById('miDiv')`

    var opt = {
      margin:       0,
      filename:     "RECEPCIÓN DE MATERIAS PRIMAS - FOLIO {{$fmp->folio}}",
      image:        { type: 'jpeg', quality: 0.98 },
      html2canvas:  { scale: 2 },
      jsPDF:        { unit: 'mm', format: [380, 530], orientation: 'portrait' }
    };

    html2pdf().set(opt).from(element).save();
  }
</script>


@endsection