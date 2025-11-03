@extends('plantilla')
@section('contenido')
@include('assets.nav')
@section('title', 'Datos')

    
<div class="container-fluid mt-3">



    <div class="row justify-content-around mt-5">



{{-- TABLA Y MODAL DE LOS DATOS DE PROVEEDORES --}}

        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-3 border m-3 bg-white sombra p-4 ">
            <div class="row justify-content-center">
                <div class="col-2 text-center"></div>

                <div class="col-8 text-center">
                    <h5 class="fw-bold">PROVEEDORES</h5>
                </div>

                <div class="col-2 text-center">
                    <a class="btn btn-success " data-bs-toggle="modal" data-bs-target="#add_proveedores">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>

                <div class="col-12 my-4">
                    <input type="text" class="form-control w-100 form-control-sm position-sticky p-2" id="buscador_proveedores" placeholder="Buscar . . ." autofocus>
                </div>
            


            </div>

        <div class="row scroll-tabla">       
            <table class="table  table-striped mt-3 " id="lista_proveedores">
                <thead>
                  <tr>
                    <th scope="col">Creado</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Borrar</th>
                  </tr>
                </thead>
                <tbody>


            @forelse ($proveedores as $proveedor)
            <tr>
                <td>{{substr($proveedor->created_at, 0, -9)}}</td>
                <td>{{$proveedor->nombre_proveedor}}</td>
                <td>
                    <button class="btn btn-danger btn-sm " data-bs-toggle="modal" data-bs-target="#veedor{{$proveedor->id}}">
                        <i class="fa fa-eraser"></i>
                    </button>
                </td>
            </tr>

                                {{-- modal confirma eliminacion --}}
            <div class="modal fade" id="veedor{{$proveedor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content ">
                        <div class="modal-body">
                            <h6 class="text-center fw-bold">¿SEGURO QUE DESEA ELIMINAR AL PROVEEDOR?</h6>

                            <form action="{{route('delete.proveedor', $proveedor->id)}}" method="POST"  class="mt-4">
                                @csrf @method("DELETE")
                                <div class="form-group mt-3">
                                    <button class="btn btn-success btn-sm w-100">SI</button>
                                </div>
                            </form>
                                <div class="form-group mt-3">
                                    <button class="btn btn-danger btn-sm w-100" data-bs-dismiss="modal">NO</button>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
                    {{-- modal confirma eliminacion --}}

            @empty
                <li>Sin registros de proveedores</li>
            @endforelse

            
                </tbody>
              </table>
            </div>




        </div>


                {{-- modal de ADD PROVEDORES --}}
        <div class="modal fade" id="add_proveedores" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content ">
                    <div class="modal-body">
                        <h4 class="text-center">Agregando proveedores</h4>
                        <form action="{{route('add.proveedores')}}" method="POST" class="mt-4">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="nombre_proveedor" id="nombre_proveedor" class="form-control w-100 text-uppercase" placeholder="Nombre" required>
                            </div>
                            <div class="form-group mt-3">
                                <button class="btn btn-success btn-sm w-100">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                {{-- modal de ADD PROVEDORES --}}



{{-- TABLA Y MODAL DE LOS DATOS DE PROVEEDORES --}}











        






    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-3 border m-3 bg-white sombra p-4">

            <div class="row justify-content-center">
                <div class="col-2 text-center"></div>

                <div class="col-8 text-center">
                    <h5 class="fw-bold">LINEAS TRANSPORTISTAS</h5>
                </div>

                <div class="col-2 text-center">
                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_transportistas">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>

                <div class="col-12 my-4">
                    <input type="text" class="form-control w-100 form-control-sm p-2" id="buscador_transportistas" placeholder="Buscar . . .">
                </div>

            </div>



        <div class="row scroll-tabla">
        
            <table class="table table-coqueta table-striped mt-3" id="lista_transportistas">
                <thead>
                    <tr>
                        <th scope="col">Creado</th>
                        <th scope="col">Línea Transportista</th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($transportistas as $transportista)
                    <tr>
                        <td>{{substr($transportista->created_at, 0, -9)}}</td>
                        <td>{{$transportista->nombre_transportista}}</td>
                        <td><button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#trans{{$transportista->id}}"><i class="fa fa-eraser"></i></button></td>
                    </tr>

                                {{-- modal confirma eliminacion --}}
                    <div class="modal fade" id="trans{{$transportista->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content ">
                                <div class="modal-body">
                                    <h6 class="text-center fw-bold">¿SEGURO QUE DESEA ELIMINAR AL TRANSPORTISTA?</h6>

                                    <form action="{{route('delete.transportista', $transportista->id)}}" method="POST"  class="mt-4">
                                        @csrf @method("DELETE")
                                        <div class="form-group mt-3">
                                            <button class="btn btn-success btn-sm w-100">SI</button>
                                        </div>
                                    </form>
                                        <div class="form-group mt-3">
                                            <button class="btn btn-danger btn-sm w-100" data-bs-dismiss="modal">NO</button>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- modal confirma eliminacion --}}






                    @empty
                        <li>No hay transportistas registrados</li>
                    @endforelse                


                </tbody>
            </table>
        </div>



    </div>






        {{-- modal de ADD PROVEDORES --}}
        <div class="modal fade" id="add_transportistas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content ">
                    <div class="modal-body">
                        <h4 class="text-center">Agregando Transportistas</h4>
                        <form action="{{route('add.transportista')}}" method="POST" class="mt-4">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="nombre_transportista" id="nombre_transportista" class="form-control w-100 text-uppercase" placeholder="Nombre" required>
                            </div>
                            <div class="form-group mt-3">
                                <button class="btn btn-success btn-sm w-100">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- modal de ADD PROVEDORES --}}























        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-3 border m-3 bg-white sombra p-4">

            <div class="row justify-content-center">

                <div class="col-2 text-center">

                </div>

                <div class="col-8 text-center">
                    <h5 class="fw-bold">PRODUCTO</h5>
                </div>

                <div class="col-2 text-center">
                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_productos">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>

                <div class="col-12 my-4">
                    <input type="text" class="form-control form-control-sm w-100 my-2 p-2" id="buscador_productos" placeholder="Buscar ...">
                </div>




            </div>


            <div class="row scroll-tabla">

                <table class="table table-coqueta table-striped" id="lista_productos">
                    <thead>
                    <tr>
                        <th scope="col">Creado</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Borrar</th>
                    </tr>
                    </thead>
                    <tbody>

                @forelse ($productos as $producto)
                    <tr>
                        <td>{{substr($producto->created_at, 0 , -9)}}</td>
                        <td>{!!$producto->nombre_producto!!}</td>
                        <td><button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#pro{{$producto->id}}"><i class="fa fa-eraser"></i></button></td>
                    </tr>


                                {{-- modal confirma eliminacion --}}
                    <div class="modal fade" id="pro{{$producto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content ">
                                <div class="modal-body">
                                    <h6 class="text-center fw-bold">¿SEGURO QUE DESEA ELIMINAR AL PRODUCTO?</h6>

                                    <form action="{{route('delete.producto', $producto->id)}}" method="POST"  class="mt-4">
                                        @csrf @method("DELETE")
                                        <div class="form-group mt-3">
                                            <button class="btn btn-success btn-sm w-100">SI</button>
                                        </div>
                                    </form>
                                        <div class="form-group mt-3">
                                            <button class="btn btn-danger btn-sm w-100" data-bs-dismiss="modal">NO</button>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- modal confirma eliminacion --}}





                    
                @empty
                    <li>No hay productos</li>
                @endforelse 



                    </tbody>
                </table>
            </div>




         </div>{{-- div que cierra el contenedor de la seccion --}}





        {{-- modal de ADD PRODUCTOS --}}
        <div class="modal fade" id="add_productos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content ">
                    <div class="modal-body">
                        <h4 class="text-center">Agregando Productos</h4>
                        <form action="{{route('add.productos')}}" method="POST" class="mt-4">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="nombre_producto" id="nombre_productos" class="form-control w-100 text-uppercase" placeholder="Nombre" required>
                            </div>
                            <div class="form-group mt-3">
                                <button class="btn btn-success btn-sm w-100">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- modal de ADD PRODUCTOS --}}























    </div>

</div> {{-- div que cierra todo --}}






<script>
    
    // {{-- focus en el modal de agregar proveedor --}}
    $('#add_proveedores').on('shown.bs.modal', function(){
        $('#nombre_proveedor').focus();
    })

    $('#add_transportistas').on('shown.bs.modal', function(){
        $('#nombre_transportista').focus();
    })

    $('#add_productos').on('shown.bs.modal', function(){
        $('#nombre_productos').focus();
    })


    
    // {{-- focus en el modal de agregar proveedor --}}
</script>




{{-- notificaciones  --}}

{{-- alertas de que el usurio se agrego con exito o que hubo un error se desaparecen en 3 segundos--}}
@if (session('add_proveedor'))
    <script>
         window.addEventListener('load', function(){
            Swal.fire({
                title: "Hecho",
                text:  "{{session('add_proveedor')}}",
                icon: "success"
            });

            setTimeout(function(){
                window.location.replace(window.location.href);
            }, 500);
         });
        
    </script>
 
@endif
{{-- notificaciones  --}}



{{-- alertas que notifica si el proveedor fue eliminado--}}
@if (session('proveedor_eliminado'))
    <script>
         window.addEventListener('load', function(){
            Swal.fire({
                title: "Hecho",
                text:  "{{session('proveedor_eliminado')}}",
                icon: "success"
            });

            setTimeout(function(){
                window.location.replace(window.location.href);
            }, 500);
         });
        
    </script>
 
@endif
{{-- notificaciones  --}}


{{-- alertas que notifica si el proveedor fue eliminado--}}
@if (session('add_transportista'))
    <script>
         window.addEventListener('load', function(){
            Swal.fire({
                title: "Hecho",
                text:  "{{session('add_transportista')}}",
                icon: "success"
            });

            setTimeout(function(){
                window.location.replace(window.location.href);
            }, 500);
         });
        
    </script>
 
@endif
{{-- notificaciones  --}}


{{-- alertas que notifica si el proveedor fue eliminado--}}
@if (session('delete_transportista'))
    <script>
         window.addEventListener('load', function(){
            Swal.fire({
                title: "Hecho",
                text:  "{{session('delete_transportista')}}",
                icon: "success"
            });

            setTimeout(function(){
                window.location.replace(window.location.href);
            }, 2500);
         });
        
    </script>
 
@endif
{{-- notificaciones  --}}


{{-- alertas que notifica si el proveedor fue eliminado--}}
@if (session('add_producto'))
    <script>
         window.addEventListener('load', function(){
            Swal.fire({
                title: "Hecho",
                text:  "{{session('add_producto')}}",
                icon: "success"
            });

            setTimeout(function(){
                window.location.replace(window.location.href);
            }, 500);
         });
        
    </script>
 
@endif
{{-- notificaciones  --}}



{{-- alertas que notifica si el proveedor fue eliminado--}}
@if (session('producto_delete'))
    <script>
         window.addEventListener('load', function(){
            Swal.fire({
                title: "Hecho",
                text:  "{{session('producto_delete')}}",
                icon: "success"
            });

            setTimeout(function(){
                window.location.replace(window.location.href);
            }, 2500);
         });
        
    </script>
 
@endif
{{-- notificaciones  --}}






<script>
{

    document.getElementById("buscador_proveedores").addEventListener("input", function() {
      var filtro = this.value.toUpperCase();
      var lista = document.getElementById("lista_proveedores");
      var elementos = lista.getElementsByTagName("tr");
    
      for (var i = 0; i < elementos.length; i++) {
        var textoElemento = elementos[i].textContent || elementos[i].innerText;
        if (textoElemento.toUpperCase().indexOf(filtro) > -1) {
          elementos[i].style.display = "";
        } else {
          elementos[i].style.display = "none";
        }
      }
    });
}


{

document.getElementById("buscador_transportistas").addEventListener("input", function() {
  var filtro = this.value.toUpperCase();
  var lista = document.getElementById("lista_transportistas");
  var elementos = lista.getElementsByTagName("tr");

  for (var i = 0; i < elementos.length; i++) {
    var textoElemento = elementos[i].textContent || elementos[i].innerText;
    if (textoElemento.toUpperCase().indexOf(filtro) > -1) {
      elementos[i].style.display = "";
    } else {
      elementos[i].style.display = "none";
    }
  }
});
}



{

document.getElementById("buscador_productos").addEventListener("input", function() {
  var filtro = this.value.toUpperCase();
  var lista = document.getElementById("lista_productos");
  var elementos = lista.getElementsByTagName("tr");

  for (var i = 0; i < elementos.length; i++) {
    var textoElemento = elementos[i].textContent || elementos[i].innerText;
    if (textoElemento.toUpperCase().indexOf(filtro) > -1) {
      elementos[i].style.display = "";
    } else {
      elementos[i].style.display = "none";
    }
  }
});
}

</script>





@endsection