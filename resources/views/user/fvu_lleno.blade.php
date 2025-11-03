@extends('plantilla')
@section('contenido')
@section('title', 'FO/GP/CC/070/05')
@if(Auth::guard('adminis')->user())
  @include('assets.nav')
@else
  @include('assets.nav_user')
@endif

{{-- boton de imprimir --}}
<div class="container">
    <div class="row justify-content-center">
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


        <!-- contenedor de todo -->
        <div class="container bg-white p-5 sombra mt-2" id="contenedor_print">

            <!-- encabezado -->
            <div class="container shadow shadow-sm bg-white">
                <div class="row border border-5">
                
                <div class="col-sm-12 col-md-4  col-lg-4 centrar-verticalmente p-2 mt-2">
                    <img src="{{asset('img/logo.png')}}" class="mx-auto img-fluid" alt="">
                </div>
                
                <div class="col-sm-12 col-md-4 col-lg-4 border mt-2"> 
                    <div class="row text-center border">
                    <h3>FORMATO</h3>
                    </div>
                    
                    <div class="row d-flex align-items-center">
                        <span class="text-center mt-3">VERIFICACIÓN DE UNIDADES</span>
                    </div>
                </div>
            
                <div class=" col-sm-12 col-md-4 col-lg-4 border mt-2">
                    <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-4 border fw-bold text-center">Codigo</div>
                    <div class="col-sm-6 col-md-8 col-lg-8 border p-0 text-center" >FO/GP/CC/070/05</div>
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
                    <div class="col-sm-6 col-md-8 col-lg-8 border p-0 text-center" >1 de 4</div>
                    </div>
            
                </div>
                
                </div>
            </div>
            <!-- encabezado -->
            
            
            
            
            
            <!-- datos del formato -->
            <div class="container bg-white">
                <div class="row  p-4 justify-content-center shadow shadow-sm">
            
                <div class="col-sm-12 col-md-5 col-lg-5 border">
            
                    <div class="row">
                    <div class="col-auto mt-1">
                        <span class="centrar-verticalmente h6">Planta:</span>
                    </div>       
                    <div class=" col-auto bg-white mt-1">
                        <h6 class="mt-2">No. {{$fvu->planta}}</h6>
                    </div>
                    </div>
                    
                    <div class="row mt-2 border-top">
                    <div class="col-auto mt-1">
                        <span class="centrar-verticalmente h6">Fecha:</span>
                    </div>       
                    <div class="col-auto bg-white mt-1">
                        <span class="font-weight-bold">{{$fvu->fecha}}</span>
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
                    <span class="text-danger font-weight-bold h6">{{$fvu->folio}}</span>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-auto">
                        <span class="centrar-verticalmente h6">Hora de recepción:</span>
                    </div>       
                    <div class="col-auto bg-white mt-1">
                        <span class="fw-bold ">{{$fvu->hora}}</span>
                    </div>
                </dv>      
                </div>
                </div>
            
                </div>
            </div>
            <!-- datos del formato -->
            
            
            
            
            
            <!-- Titulos -->
            <div class="container  bg-white">
                <div class="row justify-content-around shadow shadow-sm py-3 border">
            
            <!-- COLUMNA DE LOS "DATOS DE LA MATERIA PRIMA" -->
                <div class="col-sm-12 col-md-6  col-lg-6 border">
                    <div class="row justify-content-around">
            
                    <div class="col-lg-8 mx-1 text-center fondo border border-dark">
                        <span class="mt-1 h6 h6-sm">DATOS DEL CLIENTE / PROVEEDOR</span>
                    </div>
            
            
                    <div class="col-10 mt-3 border border-gray border-2 fondo-titulos">
                        <h6 class="mt-1">PROVEEDOR (S) / CLIENTE (S): </h6>
                    </div>
            
                    <div class="col-10 p-2">
                        <h5>{{$fvu->propietario}}</h5>
                        <h5>{{$fvu->propietario2}}</h5>
                    </div>
                    <div class="col-10 mt-3 border fondo-titulos border border-gray">
                        <h6 class="mt-1">LINEA TRANSPORTISTA: </h6>
                    </div>
                    
                    <div class="col-10 text-left p-2">
                        <h5>{{$fvu->linea_transportista}}</h5>
                    </div>
            
                    <div class="col-10 fondo-titulos mt-3 border">
                        <h6 class="mt-1">NÚMERO DE EMBARQUE: </h6>
                    </div>
            
                    <div class="col-10 p-2 text-center">
                        @if ($fvu->numero_embarque == 'pendiente' && isset(Auth::user()->nombre_completo))
                            
                            @if (Auth::user()->nombre_completo == $fvu->usuario_logeado)
                                <button class="btn btn-success w-50 btn-sm" data-bs-toggle="modal" data-bs-target="#embarque">
                                    <i class="fa fa-plus"></i>
                                    Agregar No. Embarque </button>
                            @else
                                <button class="btn btn-success btn-sm w-100" disabled>
                                    <i class="fa fa-plus"></i>
                                    Agregar No. Embarque </button>
                                <small class="text-center fw-bold">El No. de embarque solo puede añadirse por la persona que hizo el dictamen final.</small>
                            @endif
                        
                        @else
                            <h6>{{$fvu->numero_embarque}} - {{$fvu->numero_embarque2}}</h6>
                        @endif

                    </div>
            
                    </div>
                </div>
            <!-- COLUMNA DE LOS "DATOS DE LA MATERIA PRIMA" -->
            
            
            
            <!-- COLUMNA DE LOS "DATOS DEL TRANSPORTE" -->
                <div class="col-sm-12 col-md-6 col-lg-6 border">
                    <div class="row justify-content-around">
                    <!-- Titulo datos del transporte -->
                    <div class="col-lg-8 mx-1 text-center fondo border border-dark">
                        <span class="mt-1 h6 ">DATOS DEL TRANSPORTE</span>
                    </div>
                        
                    <div class="col-10 mt-3 fondo-titulos border border-gray">
                        <h6 class="mt-1">OPERADOR: </h6>
                    </div>
            
                    <div class="col-10 p-2">
                        <h6>{{$fvu->operador}}</h6>
                    </div>
                    <div class="col-10 fondo-titulos mt-3 border">        
                        <h6 class="mt-2">PLACAS DEL TRACTO O TORTON: </h6>
                    </div>
                    <div class="col-10 p-2 mt-1">
                        <h6>{{$fvu->placas_unidad}}</h6>
                    </div>
                    <div class="col-10 fondo-titulos mt-3 border">        
                        <h6 class="mt-2">PLACAS CAJA: </h6>
                    </div>
                    <div class="col-10 p-2 mt-1">
                        <h6>{{$fvu->placas_caja}}</h6>
                    </div>
                </div>
            <!-- COLUMNA DE LOS "DATOS DEL TRANSPORTE" -->
            
                </div>
            </div>
            </div>
            <!-- Titulos -->
            
            
            
            
            <!-- contenedor de los datos de la estructura -->
            <div class="container  bg-white p-5 ">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-12 col-lg-12 fondo text-center border border-dark">
                    <h6 class="mt-2">ESTRUCTURA</h6>
                    </div>
                </div>

                <div class="row mt-4 d-flex justify-content-center" >

                    <div class="col-6 border">

                        <div class="row">
                            <div class="col-12 fondo text-center">
                                <h4>TRANSPORTE</h4>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center mt-2">
                            <div class="col-auto m-2 ">
                                <h5>{{$fvu->estructura_transporte}}</h5>
                            </div>
                                           
                        </div>
                    </div>



                    <div class="col-6 border">

                        <div class="row">
                            <div class="col-12 fondo text-center">
                                <h4>CONTENEDOR</h4>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">

                            <div class="col-auto m-2 ">
                                <h5>{{$fvu->estructura_contenedor}}</h5>
                            </div>
                
                        </div>
                    </div>  
                    
                    


                </div>

            </div>
            <!-- contenedor de los datos de la estructura -->
            
            
            <!-- verificacion interna -->
            <div class="container bg-white px-5 py-2">
            
                <div class="row justify-content-around ">
                    <div class="col-12 fondo border border-dark text-center">
                        <h5 class="" >VERIFICACIÓN INTERNA</h5>
                        <b> ANTES DE INICIAR LA CARGA, REVISAR LA UNIDAD PROPUESTA SEÑALANDO CON UNA MARCA EL ESTADO QUE GUARDAN LOS PUNTOS: </b>
                    <br> <small> SI CUMPLEN LOS REQUERIMIENT MENCIONADOS EN LAS INSTRUCCIONES MARCAR CON UN <b>SI</b>, SI ALGUNA DE LAS ESPECIFICACIONES NO SE CUMPLE FAVOR DE ANOTAR <b>NO</b>  </small>
                    </div>
                </div>
            
                <div class="row mt-2">  <!--row de los criterios de verificacion interna -->
            
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-4 border">
                        <label for="" class="fw-bold" >PISO</label>
                        <h5>{{$fvu->piso}}</h5>
                    </div>
            
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-4 border">
                        <label for="" class="fw-bold" >PUERTAS</label>
                        <h5>{{$fvu->puertas}}</h5>
                    </div>
            
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-4 border">
                        <label for="" class="fw-bold" >PAREDES</label>
                        <h5>{{$fvu->paredes}}</h5>
                    </div>
            
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-4 border">
                        <label for="" class="fw-bold" >TECHO</label>
                        <h5>{{$fvu->techo}}</h5>
                    </div>
            
            
                    <div class="col-sm-12 col-md-4 col-lg-2 mt-4 border">
                        <label for="" class="fw-bold" >MATERIA EXTRAÑA</label>
                        <h5>{{$fvu->materia_desconocida}}</h5>
                    </div>
            
                    <div class="col-sm-12 col-md-4 col-lg-2 mt-4 border">
                        <label for="" class="fw-bold" >PLAGA</label>
                        <h5>{{$fvu->plaga}}</h5>
                    </div>
            
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-4 border">
                        <label for="" class="fw-bold" >LIMPIEZA</label>
                        <h5>{{$fvu->limpieza}}</h5>
                    </div>
            
            
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-4 border">
                        <label for="" class="fw-bold" >OLORES EXTRAÑOS</label>
                        <h5>{{$fvu->olores_desconocidos}}</h5>
                    </div>
            
                    <div class="col-sm-12 col-md-4 col-lg-2 mt-4 border">
                        <label for="" class="fw-bold" >FILTRACIONES</label>
                        <h5>{{$fvu->filtraciones}}</h5>
                    </div>
            
                </div> <!--row de los criterios de verificacion interna -->
            
            
            
            
            
                <div class="row justify-content-around mt-5">
                    <div class="col-12 fondo border border-dark text-center">
                        <h5 class="mt-2" >VERIFICACIÓN EXTERNA</h5>
                    </div>
                </div>
            
            
            
                <div class="row mt-1">  <!--row de los criterios de verificacion externa -->
            
                    <div class="col-sm-12  col-lg-6 border">
            
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                            <label for="" class="fw-bold" >CERTIFICADOS DE FUMIGACIÓN Y SANITIZACIÓN</label>
                            <h5>{{$fvu->certificado_fumigacion}}</h5>
                        </div>
                
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                            <label for="" class="fw-bold" >LIBRE DE BASURA, QUIMICOS U OTROS</label>
                            <h5>{{$fvu->libre_basura}}</h5>
                        </div>  
                        
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                            <label for="" class="fw-bold" >VIDRIOS ESTRELLADOS</label>
                            <h5>{{$fvu->vidrios_estrellados}}</h5>
                        </div>  
                
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                            <label for="" class="fw-bold" >SANITIZACIÓN LLANTAS Y CHASIS ANTES DE INGRESAR</label>
                            <h5>{{$fvu->sanitizacion_llantas}}</h5>
                        </div>  
            
            
                    </div>
            
            
            
                    <div class="col-sm-12  col-lg-6 p-5 text-center border">
                        <div class="row">
                            <div class="col-12">
                                <h4>EN CASO DE ALGUN INCUMPLIMIENTO </h4>
                                <h6>EL OPERADOR SE ATRIBUYE EL GARANTIZAR LA INTEGRIDAD DE LA CARGA</h6>
                            </div>

                            <div class="col-12 p-2 border border border-2" id="firma_preview">

                                @if ($fvu->firma_operador && Storage::exists($fvu->firma_operador))
                                    <img src="{{Storage::url($fvu->firma_operador)}}" alt="Firma {{$fvu->operador}}" class="img-fluid w-50 fotos" alt="" data-bs-toggle="modal" data-bs-target="#sign{{$fvu->folio}}">
                                    
                                @else
                                    <img src="{{asset('img/no_image.png')}}" class="img-fluid" alt="">
                                @endif


                            </div>

                            {{-- modal de la imagen 3 --}}
                            <div class="modal fade" id="sign{{$fvu->folio}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content ">
                                        <img src="{{Storage::url($fvu->firma_operador)}}" class="img-fluid"  alt="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    </div>
                                </div>
                            </div>
                            {{-- modal de la imagen 3 --}}


                        </div>
                    </div>
            
                </div> <!--row de los criterios de verificacion externa -->
            
            </div>
            <!-- verificacion interna y externa -->
            
            
            
            
            
            <div class="container bg-white p-5"> <!--dictamen y observaciones -->
            
                <div class="row justify-content-around">
                <div class="col-12 fondo border border-dark text-center">
                    <h5 class="mt-2" >OBSERVACIONES Y DICTAMEN</h5>
                </div>
                </div>
            
            
                <div class="row mt-3">
                    <div class="col-sm-12 col-md-12 col-lg-4 border text-center">
                    <label for="" class="fw-bold">DICTAMEN FINAL: <mark> {{$fvu->usuario_logeado}} </mark></label>
                    <br> <br>
                        @if ($fvu->dictamen_final== 'LIBERADO')
                        
                        <h5 class="mx-3 text-white bg-success py-1 px-2"><i class="fa fa-circle-check"></i> {{$fvu->dictamen_final}}</h5>
                            
                        @else
                        <h5 class="mx-3  text-danger"><i class="fa fa-circle-xmark"></i>{{$fvu->dictamen_final}}</h5>
                            
                        @endif

                    </div>
            
                    <div class="col-sm-12 col-md-12 col-lg-8  border">
                         <label for="" class="fw-bold">OBSERVACIONES; </label>
                        <p>{{$fvu->observaciones}}</p>
                    </div>
            
                </div>
            </div><!--dictamen y observaciones -->
            
            
            
            
            
            
            
            
            <div class="container bg-white"><!--EVIDENCIAS DEL LUGRA DONDE SE ENCONTRO LA INCONFORMIDAD -->
            
            <div class="row justify-content-center ">
                <div class="col-11 fondo  text-center border border-dark">
                <h5 class=mt-2>EVIDENCIAS DEL LUGRA DONDE SE ENCONTRO LA INCONFORMIDAD</h5>
                </div>
            </div>
            
            <div class="row justify-content-around p-3">
            
                <div class="col-sm-12 col-md-4 col-lg-4 border text-center shadow shadow-sm">
                    <div class="row">
                        <div class="col-12 fotos" id="imagenPrevia">
                            @if ($fvu->evidencia1 && Storage::exists($fvu->evidencia1))
                                <img src="{{Storage::url($fvu->evidencia1)}}" class="img-fluid" alt="Evidencia 1" data-bs-toggle="modal" data-bs-target="#b{{$fvu->folio}}">
                                
                            @else
                                <img src="{{asset('img/no_image.png')}}" class="img-fluid" alt="">
                            @endif

                        </div>
                    </div>
                </div>

                {{-- modal de la imagen 3 --}}
                <div class="modal fade" id="b{{$fvu->folio}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content ">
                            <img src="{{Storage::url($fvu->evidencia1)}}" class="img-fluid"  alt="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                         </div>
                    </div>
                </div>
                {{-- modal de la imagen 3 --}}




            

                <div class="col-sm-12 col-md-4 col-lg-4 border text-center shadow shadow-sm">
                    <div class="row">
                        <div class="col-12 fotos" id="imagenPrevia2">

                            @if ($fvu->evidencia2 && Storage::exists($fvu->evidencia2))
                                <img src="{{Storage::url($fvu->evidencia2)}}" class="img-fluid" alt="Evidencia 2" data-bs-toggle="modal" data-bs-target="#a{{$fvu->folio}}">
                                
                            @else
                                <img src="{{asset('img/no_image.png')}}" class="img-fluid" alt="">
                            @endif


                        </div>
                     </div>
                </div>


                {{-- modal de la imagen 3 --}}
                <div class="modal fade" id="a{{$fvu->folio}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content ">
                            <img src="{{Storage::url($fvu->evidencia2)}}" class="img-fluid"  alt="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                         </div>
                    </div>
                </div>
                {{-- modal de la imagen 3 --}}




            


                <div class="col-sm-12 col-md-4 col-lg-4 border text-center shadow shadow-sm">
                     <div class="row">
                        <div class="col-12  fotos" id="imagenPrevia3">
                            @if ($fvu->evidencia3 && Storage::exists($fvu->evidencia3))
                                <img src="{{Storage::url($fvu->evidencia3)}}" class="img-fluid" alt="Evidencia 3" data-bs-toggle="modal" data-bs-target="#e{{$fvu->folio}}">
                                
                            @else
                                <img src="{{asset('img/no_image.png')}}" class="img-fluid" alt="">
                            @endif

                        </div>
                     </div>
                </div>

                {{-- modal de la imagen 3 --}}
                <div class="modal fade" id="e{{$fvu->folio}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content ">
                            <img src="{{Storage::url($fvu->evidencia3)}}" class="img-fluid"  alt="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                         </div>
                    </div>
                </div>
                {{-- modal de la imagen 3 --}}
            
            
            </div>
            
            </div> <!-- EVIDENCIAS DEL LUGRA DONDE SE ENCONTRO LA INCONFORMIDAD -->


            {{-- marca de que almacen ya reviso el formato --}}
            <div class="container mt-5">
                <div class="row justify-content-center">


                    @if ($fvu->verifico_almacen == 'no_verificado')
                        <div class="col-12 col-sm-12 col-md-8 col-lg-5 p-3 text-white text-center bg-danger">
                            <h5 class="fw-bold">
                                <i class="fa fa-circle-exclamation mt-1 mx-2"></i>
                                NO VERIFICADO
                            </h5>
                        </div>

                    @else

                    <div class="col-3 text-white text-center bg-success">
                        <h5 class="fw-bold">
                            <i class="fa fa-circle-check mt-1"></i>
                           VERIFICADO
                        </h5>
                    </div>
                    @endif


                </div>
            </div>                       
            {{-- marca de que almacen ya reviso el formato --}}

            
        </div>
            <!-- contenedor de todo -->


    {{-- MODALES DE EL EMBARQUE --}}

    @if ($fvu->numero_embarque == 'pendiente' and isset(Auth::user()->nombre_completo))

    {{-- modal de ADD PROVEDORES --}}
    <div class="modal fade" id="embarque" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content ">
              <div class="modal-body">
                  <h4 class="text-center">Agregando el LOTE</h4>
                  <form action="{{route('add.embarque', $fvu->id)}}" method="POST" class="mt-4">
                      @csrf
                      <div class="form-group">
                          <input type="text" name="embarque" class="form-control w-100 text-uppercase" placeholder="EMBARQUE" required>
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
         filename:     "VERIFICACIÓN DE UNIDADES - FOLIO {{$fvu->folio}}",
         image:        { type: 'jpeg', quality: 0.98 },
         html2canvas:  { scale: 2 },
         jsPDF:        { unit: 'mm', format: [380, 680], orientation: 'portrait' }
       };
   
       html2pdf().set(opt).from(element).save();
     }
</script>

@endsection