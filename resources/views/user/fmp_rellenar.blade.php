@extends('plantilla')
@section('contenido')
@section('title', 'FO/GP/CC/070/01')
@include('assets.nav_user')



<div class="container bg-white  p-5 sombra mt-4"  > <!--Contenedor de todo -->



<!-- encabezado -->

<div class="container shadow shadow-sm">
  <div class="row border border-5">
    
    <div class="col-sm-12 col-md-4  col-lg-4 centrar-verticalmente p-2 mt-2">
      <img src="{{asset('img/logo.png')}}" class="mx-auto img-fluid" alt="">
    </div>
    
    <div class="col-sm-12 col-md-4 col-lg-4 border mt-2"> 
      <div class="row  text-center border">
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
        <div class="col-sm-6 col-md-4 col-lg-4 border fw-bold text-center">Página</div>
        <div class="col-sm-6 col-md-8 col-lg-8 border p-0 text-center" >1 de 1</div>
      </div>

    </div>
  
  </div>
</div>
<!-- encabezado -->
    



<form action="{{route('fmp.agregar')}}" id="form" method="POST">
  @csrf

      <!-- datos del formato -->
      <div class="container">
        <div class="row mt-3 p-4 justify-content-center shadow shadow-sm">

        <div class="col-sm-12 col-md-5 col-lg-5 border">

            <div class="row">
              <div class="col-auto mt-1">
                <span class="centrar-verticalmente h6">Planta:</span>
              </div>       
              <div class=" col-sm-3 col-md-3 col-lg-2 bg-white mt-1">
                <h6 class="mt-2">{{Auth::user()->planta}}</h6>
                <input type="hidden" value="{{Auth::user()->planta}}" name="planta" >
              </div>
            </div>
            
            <div class="row mt-2 border-top">
              <div class="col-auto mt-1">
                <span class="centrar-verticalmente h6">Fecha:</span>
              </div>       
              <div class="col-auto bg-white mt-1">
                <span class="font-weight-bold">{{$fecha}}</span>
                <input type="hidden" name="fecha" value="{{$fecha}}">
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
              <span class="text-danger font-weight-bold h6 mt-0 ">
                <i class="fa fa-lock mx-3"></i>
                  Se generara al guardar el documento
              </span>
            </div>
          </div>
          
          <div class="row">
            <div class="col-auto">
              <span class="centrar-verticalmente h6">Hora de recepción:</span>
            </div>       
            <div class="col-auto bg-white">
              <input type="time" class="form-control mt-2" value="{{old('hora_recepcion')}}" name="hora_recepcion">
             {!!$errors->first('hora_recepcion', "<small class='text-danger fw-bold'> :message </small>")!!}
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
          <div class="col-sm-12 col-md-6  col-lg-6 border">
            <div class="row justify-content-around">

              <div class="col-lg-8 mx-1 text-center fondo border border-dark mb-4">
                <span class="mt-1 h6 h6-sm">DATOS DE MATERIA PRIMA</span>
              </div>

              <div class="col-10 mt-3 fondo-titulos p-0">
                <h6 class="mt-1">PRODUCTO:</h6>
              </div>

              <div class="col-10 text-left p-0">
                <select class="text-left form-select form-control  select_busqueda p-0 mt-1" name="producto">
                  @forelse ($productos as $producto)
                    <option value="{{$producto->nombre_producto}}">{{$producto->nombre_producto}}</option>  
                  @empty
                      <option value="no hay productos">no hay productos</option>
                  @endforelse
                </select>
              </div>

              <div class="col-10 mt-3 fondo-titulos p-0">
                <h6 class="mt-1">PROVEEDOR</h6>
              </div>

              <div class="col-10 p-0">
                <select class="text-left form-select form-control select_busqueda mt-1 p-5"  name="proveedor">
                  @forelse ($proveedores as $proveedor)
                    <option value="{{$proveedor->nombre_proveedor}}">{{$proveedor->nombre_proveedor}}</option>      
                  @empty
                    <option value="sin proveedor">sin proveedor</option>
                      
                  @endforelse
           
                </select>
              </div>

              <div class="row justify-content-around">
                <div class="col-10  fondo-titulos p-0 mt-3">
                  <h6 class="mt-1">LOTE</h6>
                  <input types="text" class="form-control mt-1" name="lote" value="{{old('lote')}}" >
                </div>
  

              </div>

              <div class="row justify-content-around">
                <div class="col-10 col-sm-10 col-md-10 col-lg-4 p-0 mt-4">
                  <h6 >CADUCIDAD</h6>
                  <input type="date"  class="form-control fecha" name="caducidad" value="{{old('caducidad')}}">
              </div>

                <div class="col-10 col-sm-10 col-md-10 col-lg-4 mt-4 p-0 my-3">
                  <h6>CANT. RECEPCIONADA</h6>
                  <div class="row mx-1">
                    <div class="col-8 p-0">
                        <input type="number" min="0" class="form-control" name="cantidad_recepcionada" value="{{old('cantidad_recepcionada')}}">
                        {!!$errors->first('cantidad_recepcionada', "<small class='text-danger fw-bold'> :message </small>")!!}
                    </div>
                    <div class="col-4 p-0">
                      <select name="unidad_medida" id="unidad" class="form-control text-white bg-dark">
                        <option value="">--</option>
                        <option value="Kilogramo(s)">Kilogramo(s)</option>
                        <option value="Pieza(s)">Pieza(s)</option>
                        <option value="Litro(s)">Litro(s)</option>
                        
                      </select>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>
      <!-- COLUMNA DE LOS "DATOS DE LA MATERIA PRIMA" -->



      <!-- COLUMNA DE LOS "DATOS DEL TRANSPORTE" -->
          <div class="col-sm-12 col-md-6 col-lg-6 border ">
            <div class="row justify-content-around">
              <!-- Titulo datos del transporte -->
              <div class="col-lg-8 mx-1 text-center fondo border border-dark mb-4">
                <span class="mt-1 h6 ">DATOS DEL TRANSPORTE</span>
              </div>
              
              <div class="col-10 mt-3 fondo-titulos p-0">
                <h6 class="mt-1">LINEA TRANSPORTISTA</h6>
              </div>
              
              <div class="col-10 text-left p-0">
                <select class="text-left form-select form-control mt-1 select_busqueda" name="linea_transportista">
                  @forelse ($transportes as $transporte)
                    <option value="{{$transporte->nombre_transportista}}">{{$transporte->nombre_transportista}}</option>  
                  @empty
                    <option value="no hay transporte">no hay transporte</option>  

                      
                  @endforelse
                </select>
              </div>

              <div class="col-10 mt-3 fondo-titulos p-0">
                <h6 class="mt-1">OPERADOR</h6>
              </div>

              <div class="col-10 p-0">
                <input type="text" class="form-control mt-1" id="operador" oninput="convertir()"  name="operador" value="{{old('operador')}}">
                {!! $errors->first('operador', '<small class="text-danger fw-bold">:message</small> ' ) !!}
              </div>
              <div class="col-10 p-0 fondo-titulos mt-3">        
                <h6 class="mt-2">PLACAS DEL TRACTO O TORTON :</h6>
              </div>
              <div class="col-10 p-0 mt-1">
                <input type="text" class="form-control" name="placas_transporte" value="{{old('placas_transporte')}}">
                {!! $errors->first('placas_transporte', '<small class="text-danger fw-bold">:message</small> ') !!}
              </div>
              <div class="col-10 p-0 fondo-titulos mt-3 ">        
                <h6 class="mt-2">PLACAS CAJA :</h6>
              </div>
              <div class="col-10 p-0 mt-1 my-3">
                <input type="text" class="form-control" name="placas_caja" value="{{old('placas_caja')}}" >
                {!! $errors->first('placas_caja', '<small class="text-danger fw-bold"> :message </small>  ') !!}
              </div>
          </div>
      <!-- COLUMNA DE LOS "DATOS DEL TRANSPORTE" -->

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
                <input type="time" class="form-control" id="hora" name="hora_entrada_laboratorio" value="{{old('hora_entrada_laboratorio')}}">
                {!! $errors->first('hora_entrada_laboratorio', '<small class="text-danger fw-bold"> :message </small>' ) !!}
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-6 col-lg-5 border mt-3">
            <div class="row">
              <div class="col-6">
                <h6 class="mt-2">Hora de liberación:</h6>
              </div>
              <div class="col-6">
                <input type="time" class="form-control" name="hora_liberacion" value="{{old('hora_liberacion')}}">
                {!! $errors->first('hora_liberacion', '<small class="text-danger fw-bold">:message</small>') !!}
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
                <small class="fw-bold">HUMEDAD</small>
              </div>
              <div class="col-6">
                <input type="number" step="any" class="form-control" placeholder="(%)" name="humedad" value="{{old('humedad')}}">
              </div>
            </div>
          </div>
          

          <div class="col-sm-12 col-md-12 col-lg-4 my-2">
            <div class="row justify-content-center border">
              <div class="col-5 mt-2">
                <small class="fw-bold">TEMP.</small>
              </div>
              <div class="col-6">
                <input type="number" step="any" class="form-control" placeholder="(°C)" name="temperatura" {{old('temperatura')}}>
              </div>   
            </div>
          </div>

          <div class="col-sm-12 col-md-12 col-lg-4 my-2">
            <div class="row justify-content-center border">
              <div class="col-5 mt-2">
                <small class="fw-bold">PESO ESPECIFICO</small>
              </div>
              <div class="col-6">
                <input type="number" step="any" class="form-control" placeholder="(g/l)" name="peso_especifico" value="{{old('peso_especifico')}}">
              </div>   
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
              <div class="col-6">
                <input type="number" step="any" class="form-control" placeholder="(%)" name="grano_maltratado" value="{{old('grano_maltratado')}}">
              </div>
            </div>
          </div>
          

          <div class="col-sm-12 col-md-12 col-lg-4 my-2">
            <div class="row justify-content-center border">
              <div class="col-5 mt-2">
                <small class="fw-bold">GRANO QUEBRADO</small>
              </div>
              <div class="col-6">
                <input type="number" step="any" class="form-control" placeholder="(%)" name="grano_quebrado" value="{{old('grano_quebrado')}}">
              </div>   
            </div>
          </div>

          <div class="col-sm-12 col-md-12 col-lg-4 my-2">
            <div class="row justify-content-center border">
              <div class="col-5 mt-2">
                <small class="fw-bold">IMPUREZAS</small>
              </div>
              <div class="col-6">
                <input type="number" step="any" class="form-control" placeholder="(%)" name="impurezas" value="{{old('impurezas')}}">
              </div>   
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
              <div class="col-6">
                <div class="row">
                  <div class="col-7 p-0">
                    <input type="number" step="any" class="form-control" name="cantidad_muestra" placeholder="Cantidad" value="{{old('cantidad_muestra')}}">
                  </div>
                  <div class="col-5 text-center d-flex align-items-center">
                      <span id="unidad_medida">--</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          


          <div class="col-sm-12 col-md-12 col-lg-4 my-2">
            <div class="row justify-content-center border">
              <div class="col-5 mt-2">
                <small class="fw-bold">*BX</small>
              </div>
              <div class="col-6">
                <input type="text" step="any" class="form-control" name="bx" value="{{old('bx')}}">
              </div>   
            </div>
          </div>
        


          <div class="col-sm-12 col-md-12 col-lg-4 my-2">
            <div class="row justify-content-center border">
              <div class="col-5 mt-2">
                <small class="fw-bold">PLAGAS</small>
              </div>
              <div class="col-6">
                <select class="text-left form-select form-control mt-1" name="plagas">
                  <option value="NO">NO</option>
                  <option value="SI">SI</option>
                </select>
              </div>   
            </div>
          </div>

        </div>
      <!-- FILA DE CANTIDAD DE MUESTRA, DW Y PLAGAS -->










        <!-- FILA DE CERTIFICADO DE CALIDAD, BX Y ASEGURADO -->
        <div class="row justify-content-between">
          
          <div class="col-sm-12 col-md-12 col-lg-12 my-2">

            <div class="row  border p-3">

              <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-2">
                <small class="fw-bold">CERTIF. DE CALIDAD</small>

                <select class="text-left form-select form-control mt-1" name="certificado_calidad">
                  <option value="NO">NO</option>
                  <option value="SI">SI</option>
                </select>
              </div>

              <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-2">
                <small class="fw-bold">ASEGURADO</small>
    
                <select class="text-left form-select form-control mt-1" name="asegurado" >
                  <option value="SI/FLEJE">SI/FLEJE</option>
                  <option value="SI/CANDADO">SI/CANDADO</option>
                  <option value="NO">NO</option>
                </select>
              </div>  


              <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-2">
                <h6 class="mt-1">FLEJE</h6>
                <input types="text" class="form-control mt-1" name="fleje" value="{{old('lote')}}" >
                {!!$errors->first('fleje', "<small class='text-danger fw-bold'> :message </small>")!!}
              </div> 
              
            </div>

          </div>

        </div>
        <!-- FILA DE CERTIFICADO DE CALIDAD, BX Y ASEGURADO -->









      <!-- FILA DE COLOR Y OLOR CARACTERISTICO, MATERIA EXTRAÑA-->
      <div class="row justify-content-between">
          
          <div class="col-sm-12 col-md-12 col-lg-6 my-2">
            <div class="row justify-content-center border">
              <div class="col-6 mt-2">
                <small class="fw-bold">COLOR Y OLOR CARACTERISTICO</small>
              </div>
              <div class="col-6">
                <select class="text-left form-select mt-1 form-control" name="color_olor">
                  <option value="CUMPLE">CUMPLE</option>
                  <option value="NO CUMPLE">NO CUMPLE</option>
                  <option value="NO APLICA">NO APLICA</option>
                </select>
              </div>
            </div>
          </div>
          

          <div class="col-sm-12 col-md-12 col-lg-6 my-2">
            <div class="row justify-content-center border">
              <div class="col-5 mt-2">
                <small class="fw-bold">EQUIPO DE MUESTREO</small>
              </div>
              <div class="col-6">
                <select class="text-left form-select mt-1 form-control" name="equipo_muestreo">
                  <option value="NO APLICA">NO APLICA</option>
                  <option value="CALADOR DE ALVEOLOS">CALADOR DE ALVEOLOS</option>
                  <option value="CALDO DE MANO">CALADOR DE MANO</option>
                  <option value="CAVA HOYOS">CAVA HOYOS</option>
                  <option value="MUESTRADOR DE LIQUIDOS">MUESTRADOR DE LIQUIDOS</option>
                </select>
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
              <div class="col-6">
                <input type="text" class="form-control form-control" name="materia_impropio" value="{{old('materia_impropio')}}">
              </div>   
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
                <h6 class="mt-2"> <b> METODO DE MUESTREO: </b> POE/GP/CC/080</h6>
                <input type="hidden" value="POE/GP/CC/080" name="metodo_muestreo">
              </div>
              
              <div class="col-12 border p-2 text-center">
                <h6 class="mt-2">ACEPTADO POR CONCESIÓN</h6>
              </div>
              
              <div class="col-12 border p-2">
                <select class="text-center form-select mt-1 form-control p-0" name="aceptado_concesion">
                  <option value="NO APLICA">NO APLICA</option>
                  <option value="SR. ROBERTO BERISTAIN ">SR. ROBERTO BERISTAIN </option>
                  <option value="DR. SAMUEL BERISTAIN ">DR. SAMUEL BERISTAIN </option>
                  <option value="SR. MOISES BRITAIN ">SR. MOISES BERISTAIN </option>
                  <option value="SR. ROBERTO BERISTAIN">SR. ROBERTO BERISTAIN</option>
                  <option value="SR. JOSUE BERISTAIN ">SR. JOSUE BERISTAIN </option>
                </select>
              </div>
            </div>
          </div>
          


          <div class="col-sm-12 col-md-12  col-lg-3 mt-3">

            <div class="row">
              <div class="col-6 py-2  px-0 text-center border">
                <h6 class="mt-2">DWG (micrones)</h6>
              </div>
              <div class="col-6 py-2  px-0 border">
                <input type="text" class="form-control form-control-sm mt-2" name="dwg" value="{{old('dwg')}}">
              </div>
            </div>

            <div class="row">
              <div class="col-6 py-0 px-1  border">
                <h6 class="mt-2">M10 (%)</h6>
              </div>
              <div class="col-6 py-0 px-1 border">
                <input type="text" class="form-control form-control-sm" name="m10" value="{{old('m10')}}">
              </div>
            </div>

            <div class="row">
              <div class="col-6 py-0 px-1  border">
                <h6 class="mt-2">M16 (%)</h6>
              </div>
              <div class="col-6 py-0 px-1 border">
                <input type="text" class="form-control form-control-sm" name="m16" value="{{old('m16')}}" >
              </div>
            </div>

            <div class="row">
              <div class="col-6 py-0 px-1  border">
                <h6 class="mt-2">M18 (%)</h6>
              </div>
              <div class="col-6 py-0 px-1 border">
                <input type="text" class="form-control form-control-sm" name="m18" value="{{old('m18')}}" >
              </div>
            </div>

            <div class="row">
              <div class="col-6 py-0 px-1  border">
                <h6 class="mt-2">F(%)</h6>
              </div>
              <div class="col-6 py-0 px-1 border">
                <input type="text" class="form-control form-control-sm" name="f" value="{{old('f')}}" >
              </div>
            </div>

          </div>
          



          <div class="col-sm-12 col-md-12  col-lg-4 mt-3 border border-4">

            <div class="row">
              <div class="col-12 text-center mt-4">
                <h4>SUPERVISO MUESTREO</h4>
              </div>
              <div class="col-12 text-center">

                @if ($usuarios_planta)
                  <select class="text-center form-select mt-1 form-control p-1" name="superviso_muestreo" >
                    @foreach ($usuarios_planta as $usuario)
                      <option value="{{$usuario->nombre_completo}}">{{$usuario->nombre_completo}}</option>
                    @endforeach
                  </select>
                @else
                    <span class="text-danger fw-bold">No se han registrado más usuarios para supervisión de la planta {{Auth::user()->planta}}</span>
                @endif
             
                  {!!$errors->first('superviso_muestreo', '<br> <li class="text-danger"> :message </li>')!!}

              </div>
              <div class="col-12 text-center mt-4 fondo-titulos mt-5">
                <h4 class="mt-2">{{Auth::user()->nombre_completo}}</h4>
                <input type="hidden" value="{{Auth::user()->nombre_completo}}" name="usuario_logeado">
              </div>
            </div>

            <div class="row">
              <div class="col-6 text-center mt-4">
                <h5 class="mt-3">DICTAMEN FINAL</h5>
              </div>
              <div class="col-6 text-center mt-4 fondo-titulos">
                <select class="text-center form-select mt-1 form-control p-0" value="{{old('dictamen')}}" name="dictamen">
                  <option value="ACEPTADO">ACEPTADO</option>
                  <option value="RECHAZADO">RECHAZADO</option>
                </select>
              </div>
            </div>

          </div>

        </div>
      </div>
      <!-- CONTAINER DE SUPERVISOR DEL MUESTREO, ACEPTADO POR CONCESIÓN Y DWG -->






      <!-- CONTENEDOR DE OBSERVACIONES -->
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h4>OBSERVACIONES:</h4>
          </div>
          <div class="col-12">
            <textarea name="observaciones" id="miTextarea" class="form-control w-100 h-100">{{old('observaciones')}}</textarea>
          </div>
        </div>
      </div>
      <!-- CONTENEDOR DE OBSERVACIONES -->



            <!-- Loader, inicialmente oculto -->
            <div id="formLoader" class="d-none text-center">
                <div class="spinner-border " role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <!-- Loader, inicialmente oculto -->


      <!-- BOTON PARA ENVIAR A REVISIÓN -->
      <div class="container mt-5">
        <div class="row">
          <div class="col-12">
            <button class="btn btn-success btn-lg w-100">
              <i class="fa fa-save mx-3"></i> GUARDAR Y ENVIAR FORMATO
            </button>
          </div>
        </div>
      </div>
      <!-- BOTON PARA ENVIAR A REVISIÓN -->



</form>


</div><!--Cierra contenedor de todo-->





<script>
  const hoy = new Date();
  const yyyy = hoy.getFullYear();
  const mm = String(hoy.getMonth() + 1).padStart(2, '0');
  const dd = String(hoy.getDate()).padStart(2, '0');
  const fechaMinima = `${yyyy}-${mm}-${dd}`;
  // Selecciona todos los inputs con la clase "fecha"
  document.querySelectorAll('.fecha').forEach(input => {
    input.setAttribute('min', fechaMinima);
  });
</script>


@endsection