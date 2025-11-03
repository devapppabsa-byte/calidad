@extends('plantilla')
@section('contenido')  
@section('title', 'FO/GP/CC/001/001')  
@include('assets.nav_user')





<form action="{{route('fpnc.agregar')}}" id="form" enctype="multipart/form-data" method="POST">
@csrf


<div class="container bg-white  p-5 sombra"> <!--Contenedor de todo -->

    <div class="row">
        {!!$errors->first('folio_fmp', 
        ' <div class="col-12 bg-danger text-white text-center"> 
            <h2>
                <i class="fa fa-circle-exclamation"></i>
                NO SE PUEDE GUARDAR EL DOCUMENTO, YA EXISTE UN DOCUMENTO CON ESTE FOLIO
            </h2> 
        </div>')!!}
        
       
    </div>

<!-- encabezado -->
<div class="container shadow shadow-sm">
  <div class="row border border-5">
    
    <div class="col-sm-12 col-md-3 col-lg-4 d-flex align-items-center p-2 mt-2">
      <img src="{{asset('img/logo.png')}}" class="mx-auto img-fluid" alt="">
    </div>
    
    <div class="col-sm-12 col-md-4 col-lg-4 border mt-2"> 
      <div class="row text-center border">
        <h3>FORMATO</h3>
      </div>
      
      <div class="row">
            <span class="text-center mt-3">NOTIFICACIÓN DE PRODUCTO NO CONFORME</span>
      </div>
    </div>

    <div class=" col-sm-12 col-md-5 col-lg-4 border mt-2">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-4 border fw-bold text-center">Codigo</div>
        <div class="col-sm-6 col-md-8 col-lg-8 border p-0 text-center" >FO/GP/CC/001/001</div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-4 border fw-bold text-center">Versión</div>
        <div class="col-sm-6 col-md-8 col-lg-8 border p-0 text-center" >03</div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-4 border fw-bold text-center">Vigencia</div>
        <div class="col-sm-6 col-md-8 col-lg-8 border p-0 text-center" >
          FEBRERO 2026</div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-4 border fw-bold text-center">Pagina</div>
        <div class="col-sm-6 col-md-8 col-lg-8 border p-0 text-center" >1 de 1</div>
      </div>

    </div>
  
  </div>
</div>
<!-- encabezado -->



<!-- fecha y folio -->
<div class="container mt-3 border p-3">
    <div class="row">
        <div class="col-sm-12 col-md-12 mt-2 col-lg-4">
            <div class="row">
                <div class="col-auto">
                    <span><b> FOLIO DE:  <i> FO/GP/CC/070/01</i> </b> </span> 
                    <span class="text-danger fw-bold mx-2">{{$fmp->folio}}</span>
                    <input type="hidden" name="folio_fmp" value="{{$fmp->folio}}">
                    <input type="hidden" name="planta" value="{{Auth::user()->planta}}">
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 mt-2 col-lg-5">
            <div class="row">
                <div class="col-auto">
                    <span class="fw-bold">Fecha de emisión: </span>
                </div>
                <div class="col-6">
                   {{$fecha}}
                   <input type="hidden" name="fecha" value="{{$fecha}}">
                </div>
            </div>
        </div>


        <div class="col-sm-12 col-md-12 mt-2 col-lg-3">
            <div class="row">
                <div class="col-auto">
                    <span class="fw-bold">Folio: </span>
                    <input type="hidden" name="id_fmp" value="{{$fmp->id}}">
                </div>
                <div class="col-auto text-danger">
                    <i class="fa fa-lock mx-1"></i>
                   <span class="fw-bold">
                    {{$fmp->folio}}
                   </span>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- fecha y folio -->





<!-- materia prima, material de empaque -->
<div class="container mt-3 p-3">
    <div class="row d-flex justify-content-around">

        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" value="Materia Prima" name="material" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-secondary"  for="btnradio1">Materia Prima</label>
          
            <input type="radio" class="btn-check" value="Material de Empaque" name="material" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-secondary" for="btnradio2">Material de empaque</label>
        </div>


    </div>
</div>

<!-- materia prima, material de empaque -->





<!-- Proveedor, producto y presentación -->
<div class="container mt-4">
    <div class="row border p-4 d-flex justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-4 mt-2">
            <div class="row">
                <div class="col-auto px-0 mx-0">
                    <span class="fw-bold">Proveedor: </span>
                </div>
                <div class="col-auto ">
                    <span>{{$fmp->proveedor}}</span>
                    <input type="hidden" name="proveedor" value="{{$fmp->proveedor}}">
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-4 mt-2">
            <div class="row">
                <div class="col-auto px-0 mx-0">
                    <span class="fw-bold">Producto: </span>
                </div>
                <div class="col-auto">
                    <span>{{$fmp->producto}}</span>
                    <input type="hidden" name="producto" value="{{$fmp->producto}}">
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-4 mt-2">
            <div class="row">
                <div class="col-auto px-0 mx-0">
                    <span class="fw-bold">Presentación: </span>
                </div>
                <div class="col-6">
                    <input type="text" name="presentacion" value="{{old('presentacion')}}" class="form-control form-control-sm" autofocus>
                    {!!$errors->first('presentacion', '<li class="text-danger text-justify fw-bold">:message</li>')!!}
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Proveedor, producto y presentación -->






<!-- lote y cantidad -->

<div class="container mt-4 border">
    <div class="row p-3 d-flex justify-content-center">

        <div class="col-sm-12 col-md-5  col-lg-6 mt-3 text-center">
            <div class="row d-flex justify-content-center">
                <div class="col-auto">
                    <span class="fw-bold">Lote: </span>
                </div>
                <div class="col-auto">
                    <span>{{$fmp->lote}}</span>
                    <input type="hidden" value="{{$fmp->lote}}" name="lote">
                </div>
            </div>
        </div>




        <div class="col-sm-12 col-md-5  col-lg-6 mt-3 text-center">
            <div class="row d-flex justify-content-center">
                <div class="col-auto">
                    <span class="fw-bold">Cantidad: </span>
                </div>

                <div class="col-sm-4 col-md-4 col-lg-2 p-0">  
                    {{$fmp->cantidad_recepcionada}} {{$fmp->unidad_medida}}
                    <input type="hidden" min="0" class="form-control form-control-sm" name="cantidad" value="{{$fmp->cantidad_recepcionada}} {{$fmp->unidad_medida}}">
                </div>

            </div>
        </div>        


    </div>
</div>


<!-- lote y cantidad -->










<!-- desviacion -->
<div class="container mt-3">
    <div class="row">
        <div class="col-12 text-center fondo">
            <span class="fw-bold">Desviación:</span>
        </div>
        <div class="col-12 mt-2 p-0">
            <textarea name="desviacion" class="form-control" class="w-100 border">{{old('desviacion')}}</textarea>
            {!!$errors->first('desviacion', '<li class="text-danger text-justify fw-bold">:message</li>')!!}

        </div>
    </div>
</div>

<!-- desviacion -->






<!-- evicencia de desviación -->
<div class="container">
    <div class="row p-3 justify-content-around">
        <div class="col-12 text-center fondo">
            <h5>Evidencias</h5>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-4 p-4">
            <div class="row">
                <div class="col-12 border text-center" id="imagen1">
                    <img src="img/images.png"  alt="">
                </div>
                <div class="col-12">
                    <input type="file" id="foto1" name="imagen1" value="{{old('imagen1')}}" class="form-control form-control-sm">
                    {!!$errors->first('imagen1', '<li class="text-danger text-justify fw-bold">:message</li>')!!}
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-4 p-4">
            <div class="row">
                <div class="col-12 border text-center" id="imagen2" >
                    <img src="img/images.png"  alt="">
                </div>
                <div class="col-12">
                    <input type="file" id="foto2" name="imagen2" value="{{old('imagen2')}}" class="form-control form-control-sm">
                    {!!$errors->first('imagen2', '<li class="text-danger text-justify fw-bold">:message</li>')!!}
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-4 p-4">
            <div class="row">
                <div class="col-12 border text-center" id="imagen3">
                    <img src="img/images.png"  alt="">
                </div>
                <div class="col-12">
                    <input type="file" id="foto3" name="imagen3" value="{{old('imagen3')}}" class="form-control form-control-sm">
                    {!!$errors->first('imagen3', '<li class="text-danger text-justify fw-bold">:message</li>')!!}
                </div>
            </div>
        </div>


    </div>
</div>



<!-- evicencia de desviación -->



<!-- observaciones -->
<div class="container">
    <div class="row">
        <div class="col-12 fondo text-center">
            <span class="fw-bold">Observaciones:</span>
        </div>
        <div class="col-12 mt-2 p-0">
            <textarea name="observaciones" class="w-100 form-control">{{old('observaciones')}}</textarea>
            {!!$errors->first('observaciones', '<small class="text-danger text-justify fw-bold">:message</small>')!!}
        </div>
    </div>
</div>

<!-- observaciones -->




<!-- via de notificacion -->
<div class="container mt-5 border pb-3">
    
    <div class="row justify-content-center">
        <div class="col-12 text-center fondo">
            <h4 class="mt-2">Via de notificación</h4>
            {!!$errors->first('notificacion', '<span class="text-danger fw-bold"> :message </span> '  )!!}
        </div>
    </div>

    <div class="row mt-4 justify-content-around">
        <div class="col-sm-12 col-md-3 col-lg-3 text-center m-1">
            <input type="radio" class="btn-check" name="notificacion" value="Correo" id="vbtn-radio3" autocomplete="off">
            <label class="btn btn-outline-success" for="vbtn-radio3">Correo</label>
        </div>


        <div class="col-sm-12 col-md-3 col-lg-3 text-center m-1">
            <input type="radio" class="btn-check" name="notificacion" value="Telefónica" id="vbtn-radio2" autocomplete="off">
            <label class="btn btn-outline-success" for="vbtn-radio2">Telefónica</label>
        </div>



        <div class="col-sm-12 col-md-3 col-lg-3 text-center m-1">
            <div class="row justify-content-center">
                <div class="col-12">
                    <input type="radio" class="btn-check" name="notificacion" value="Otra" id="vbtn-radio1" autocomplete="off">
                    <label class="btn btn-outline-success" for="vbtn-radio1">Otra</label>
                </div>
                
                <div class="col-auto mt-1">
                    <input type="text" class="form-control form-control-sm" name="otra_notificacion" placeholder="Mencionela" id="otra" style="display:none">
                </div>
            </div>

        </div>



    </div>
</div>
<!-- via de notificacion -->





<!-- quien recibe notificación -->
<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-12">

            
            <div class="row justify-content-center mt-3">
                <div class="col-3  mt-2">
                    <span>Quien recibe la notificación</span>
                </div>
                <div class="col-4 ">
                    <input type="text" name="recibe_notificacion" value="{{old('recibe_notificacion')}}" class="form-control" placeholder="Nombre / Puesto">
                    {!!$errors->first('recibe_notificacion', '<small class="text-danger text-justify fw-bold">:message</small>')!!}
                </div>
            </div>



            <div class="row justify-content-center mt-3">
                <div class="col-3  mt-2">
                    <span>Quien emite la notificación</span>
                </div>
                <div class="col-4 ">
                    <input type="text" name="emite_notificacion" value="{{old('emite_notificacion')}}" class="form-control" placeholder="Nombre / Puesto">
                    <input type="hidden" value="{{Auth::user()->nombre_completo}}" name="usuario_logeado">
                    {!!$errors->first('emite_notificacion', '<small class="text-danger text-justify fw-bold">:message</small>')!!}
                </div>
            </div>


        </div>


    </div>
</div>
<!-- quien recibe notificación -->



<!-- Loader, inicialmente oculto -->
<div id="formLoader" class="d-none text-center">
    <div class="spinner-border " role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Loader, inicialmente oculto -->


<!-- boton de guardar todo alv -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <button class="btn btn-success w-100">
               <i class="fa fa-save mx-3"></i>  Guardar
            </button>
        </div>
    </div>
</div>



<!-- boton de guardar todo alv -->

</div><!--Cierra contenedor de todo-->


</form>


<script>

// El codigo que oculta el input 
{
    document.getElementById('vbtn-radio1').addEventListener('change', function(){
        if(this.checked){
            document.getElementById('otra').style.display = 'block'
            document.setAttribute('required')
        }
        else{
            document.getElementById('otra').style.display = 'none'
        }
    });


    document.getElementById('vbtn-radio2').addEventListener('change', function(){
        if(this.checked){
            document.getElementById('otra').style.display = 'none'
        }
    })

    document.getElementById('vbtn-radio3').addEventListener('change', function(){
        if(this.checked){
            document.getElementById('otra').style.display = 'none'
        }
    })
}
// El codigo que oculta el input 







//El codigo de la  vista previa de las imagenes
{
    
// imagen -> contenedor
// foto -> input
document.getElementById('foto1').addEventListener('change', function(){

    const file = this.files[0]

    if(file){
        const reader = new FileReader();
        reader.onload = function(e){
            const preview = document.getElementById('imagen1');
            preview.innerHTML = '<img src="' + e.target.result + '" alt="Vista previa de imagen" class="img-fluid" >';
        }
        reader.readAsDataURL(file)
    }
})



document.getElementById('foto2').addEventListener('change', function(){

const file = this.files[0]

if(file){
    const reader = new FileReader();
    reader.onload = function(e){
        const preview = document.getElementById('imagen2');
        preview.innerHTML = '<img src="' + e.target.result + '" alt="Vista previa de imagen" class="img-fluid" >';
    }
    reader.readAsDataURL(file)
}
})




document.getElementById('foto3').addEventListener('change', function(){

const file = this.files[0]

if(file){
    const reader = new FileReader();
    reader.onload = function(e){
        const preview = document.getElementById('imagen3');
        preview.innerHTML = '<img src="' + e.target.result + '" alt="Vista previa de imagen" class="img-fluid" >';
    }
    reader.readAsDataURL(file)
}
})

}
//El codigo de la  vista previa de las imagenes

</script>






@endsection