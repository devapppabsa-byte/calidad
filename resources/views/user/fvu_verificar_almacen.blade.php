@extends('plantilla')
@section('contenido')
@include('assets.nav')
@section('title', 'FO/GP/CC/070/05')
    

{{-- boton de regresar --}}
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-2 text-center">
          <a  id="back" class="btn btn-success btn-sm w-100 d-print-none">
            Regresar
          </a>
        </div>
    </div>
  </div>
  {{-- boton de regresar --}}

        <!-- contenedor de todo -->
        <div class="container bg-white p-5 sombra mt-2">

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
                        <h6 class="mt-1">PROVEEDOR / CLIENTE</h6>
                    </div>
            
                    <div class="col-10 p-2">
                        <h5>{{$fvu->propietario}}</h5>
                    </div>
                    <div class="col-10 mt-3 border fondo-titulos border border-gray">
                        <h6 class="mt-1">LINEA TRANSPORTISTA</h6>
                    </div>
                    
                    <div class="col-10 text-left p-2">
                        <h5>{{$fvu->linea_transportista}}</h5>
                    </div>
            
                    <div class="col-10 fondo-titulos mt-3">
                        <h6 class="mt-1">NÚMERO DE EMBARQUE</h6>
                    </div>
            
                    <div class="col-10 p-2">
                        <h6>{{$fvu->numero_embarque}}</h6>
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
                        
                    <div class="col-10 mt-3 fondo-titulos border border-gray p-0">
                        <h6 class="mt-1">OPERADOR</h6>
                    </div>
            
                    <div class="col-10 p-2">
                        <h5>{{$fvu->operador}}</h5>
                    </div>
                    <div class="col-10 p-0 fondo-titulos mt-3">        
                        <h6 class="mt-2">PLACAS DEL TRACTO O TORTON :</h6>
                    </div>
                    <div class="col-10 p-2 mt-1">
                        <h6>{{$fvu->placas_unidad}}</h6>
                    </div>
                    <div class="col-10 p-0 fondo-titulos mt-3">        
                        <h6 class="mt-2">PLACAS CAJA :</h6>
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
            <div class="container bg-white p-5">
            
                <div class="row justify-content-around ">
                    <div class="col-12 fondo border border-dark text-center">
                        <h5 class="mt-2" >VERIFICACIÓN INTERNA</h5>
                        <b> ANTES DE INICIAR LA CARGA, REVISAR LA UNIDAD PROPUESTA SEÑALANDO CON UNA MARCA EL ESTADO QUE GUARDAN LOS PUNTOS: </b>
                    <br> <small> SI CUMPLEN LOS REQUERIMIENT MENCIONADOS EN LAS INSTRUCCIONES MARCAR CON UN <b>SI</b>, SI ALGUNA DE LAS ESPECIFICACIONES NO SE CUMPLE FAVOR DE ANOTAR <b>NO</b>  </small>
                    </div>
                </div>
            
                <div class="row mt-4">  <!--row de los criterios de verificacion interna -->
            
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

                            <div class="col-12 p-2 border border border-2" >
                                @if ($fvu->firma_operador != null)
                                    <img src="{{Storage::url($fvu->firma_operador)}}" alt="Firma {{$fvu->operador}}" class="img-fluid w-50 fotos" alt="" data-bs-toggle="modal" data-bs-target="#sign{{$fvu->folio}}">
                                @else
                                <img src="{{asset('img/images.png')}}" alt="Firma {{$fvu->operador}}" class="img-fluid w-50 fotos" ">
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
                        @if ($fvu->dictamen_final= 'LIBERADO')
                        
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

                        @if ($fvu->evidencia1 != null )
                            <div class="col-12 fotos" >
                                <img src="{{Storage::url($fvu->evidencia1)}}" class="img-fluid" alt="Evidencia 1" data-bs-toggle="modal" data-bs-target="#b{{$fvu->folio}}">
                            </div>
                        @else
                        <div class="col-12 fotos" >
                            <img src="{{asset('img/images.png')}}" class="img-fluid" alt="Evidencia 1" >
                        </div>
                        @endif

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

                        @if ($fvu->evidencia2 != null)
                            <div class="col-12 fotos" id="imagenPrevia2">
                                <img src="{{Storage::url($fvu->evidencia2)}}" class="img-fluid" alt="Evidencia 2" data-bs-toggle="modal" data-bs-target="#a{{$fvu->folio}}">
                            </div>
                        @else
                        <div class="col-12 fotos" >
                            <img src="{{asset('img/images.png')}}" class="img-fluid" alt="Evidencia 2" >
                        </div>
                        @endif
                        
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
                        @if ($fvu->evidencia3 != null)
                            <div class="col-12  fotos" id="imagenPrevia3">
                                <img src="{{Storage::url($fvu->evidencia3)}}" class="img-fluid" alt="Evidencia 3" data-bs-toggle="modal" data-bs-target="#e{{$fvu->folio}}">
                            </div>
                        @else
                            <div class="col-12 fotos" >
                                <img src="{{asset('img/images.png')}}" class="img-fluid" alt="Evidencia 3" >
                            </div>
                        @endif



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
                


        {{-- formulario de visto --}}
        
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-5">
                    <form id="formularioConfirmacion" action="{{route('almacen.fvu.verificar')}}" method="POST">
                        @csrf
                        <button class="btn btn-success w-100">
                            <input type="hidden" name="id" value="{{$fvu->id}}">
                            <input type="hidden" name="usuario_logeado" value="{{Auth::user()->nombre_completo}}">
                            <i class="fa fa-check mx-3"></i>
                            MARCAR FORMATO COMO REVISADO POR ALMACEN
                        </button>
                    </form>
                </div>
            </div>
        </div>



        {{-- formulario de visto --}}




        </div>
            <!-- contenedor de todo -->


            <script>
                // Agregar el evento al formulario para confirmar el envío
                document.getElementById('formularioConfirmacion').addEventListener('submit', function(event) {
                    const confirmar = confirm("¿Estás seguro de que deseas marcar este formato como revisado?");
                    if (!confirmar) {
                        // Detener el envío si el usuario cancela
                        event.preventDefault();
                    }
                });
            </script>
@endsection