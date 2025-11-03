<?php

use App\Http\Controllers\Controlador;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\encabezadosController;
use App\Http\Controllers\estadisticasController;



//Rutas temporales


//Route::view('/admin', 'admin.perfil'); //Ya se uso en las rutas verdaderas
// Route::view('/admin/editar_usuario','admin.editar_usuario');







// Route::view('/user/fmp_por_revisar', 'user.fmp_por_revisar')->name('por_revisar');



// Route::view('/buscador_fmp', 'buscador_fmp');
// Route::view('/user/fmp_enviado_revision', 'user.fmp_enviado_revision');
// Route::view('/admin/eliminar', 'admin.eliminar_usuario');
// Route::view('/encontrado', 'fmp_lleno');

//Para mantener viva la session 
Route::get('/keep-alive', function () {
    return response()->noContent();
})->middleware('auth');



//Rutas reales 


//ruta para agregar usuarios


Route::get('/admin', [Controlador::class, 'showAdmin' ])->name('admin.view')->middleware('auth:adminis');
Route::view('/admin/agregar_usuario','admin.agregar_usuario')->name('admin.add_usuario')->middleware('auth:adminis');
Route::post('/admin/agregar_usuario', [Controlador::class, 'agregar_usuario'])->name('agregar.usuario')->middleware('auth:adminis');
//rutas para gregar usuarios

//rutas para gestionar usuarios
Route::get('/admin/administrar_usuarios', [Controlador::class, 'lista_usuarios'])->name('lista.usuarios')->middleware('auth:adminis');
Route::post('/admin/administrar_usuarios', [Controlador::class, 'lista_buscados'])->name('lista.buscados')->middleware('auth:adminis');

Route::get('/admin/administrar_usuarios/{usuario}/editar', [Controlador::class, 'editar_usuarios'] )->name('editar.usuarios')->middleware('auth:adminis');
Route::patch('/admin/administrar_usuarios/{usuario}/editar',[Controlador::class, 'usuarios_update']  )->name('usuarios.update')->middleware('auth:adminis');
Route::get('/admin/administrar_usuarios/{usuario}/eliminar', [Controlador::class, 'eliminar_usuario'])->name('eliminar.usuario')->middleware('auth:adminis');
Route::delete('/admin/administrar_usuarios/{usuario}/eliminar/destroy',[Controlador::class, 'usuario_destruir'])->name('usuario.destruir')->middleware('auth:adminis');



Route::get('/admin/busqueda', [Controlador::class, 'busqueda_fmp'])->name('busqueda.fmp');
Route::post('/admin/busqueda', [Controlador::class, 'buscados_fmp'])->name('buscados.fmp');


Route::get('/admin/busqueda/fpnc', [Controlador::class, 'busqueda_fpnc'])->name('busqueda.fpnc');
Route::post('/admin/busqueda/fpnc', [Controlador::class, 'buscados_fpnc'])->name('buscados.fpnc');
Route::get('/admin/busqueda/fpnc/{fpnc}/lleno', [Controlador::class, 'fpnc_lleno'])->name('fpnc.lleno.admin');


Route::get('/admin/busqueda/fvu', [Controlador::class, 'busqueda_fvu'])->name('busqueda.fvu');
Route::post('/admin/busqueda/fvu/', [Controlador::class, 'buscados_fvu'])->name('buscados.fvu');
Route::get('/admin/busqueda/fvu/{fvu}/lleno', [Controlador::class, 'fvu_lleno'])->name('fvu.lleno.admin');



//Rutas de los productos, proveedores y linea transportista
Route::get('admin/datos', [Controlador::class, 'datos_admin'])->name('datos.admin');
Route::post('admin/datos/add_proveedor', [Controlador::class, 'add_proveedores'])->name('add.proveedores');
Route::delete('admin/datos/{proveedor}/delete_proveedor', [Controlador::class, 'delete_proveedor'])->name('delete.proveedor');


Route::post('admin/datos/add_transportista', [Controlador::class, 'add_transportista'])->name('add.transportista');
Route::delete('admin/datos/{transportista}/delete_transportista', [Controlador::class, 'delete_transportista'])->name('delete.transportista');


Route::post('/admin/datos/add_productos', [Controlador::class, 'add_productos'])->name('add.productos');
Route::delete('/admin/datos/{producto}/delete_producto', [ Controlador::class, 'delete_producto'])->name('delete.producto');


//Rutas de los productos, proveedores y linea transportista


// //Admin  exportando a excel fmp
// Route::get('/admin/busqueda/excelExport',[Controlador::class, 'fmp_excel'])->name('fmp.excel');


//ritas de los datos recopiolados de los proveedores
Route::get('/admin/datos/proveedores-estadisticas',[ estadisticasController::class, 'proveedores'])->name('estadisticas.proveedores')->middleware('auth:adminis');



//Rutas de la actualizacion de los  encabezados 

Route::get('/admin/datos/actulizar-encabezados', [encabezadosController::class, 'inicio'])->name('actualizar.encabezados');
//Rutas de la actualizacion de los  encabezados 







//Rutas del usuario
Route::get('/user', [Controlador::class, 'user_perfil'])->name('user.perfil')->middleware('auth');


//Rutas del formato de materia prima
// Route::view('/user/fmp', 'user.fmp_rellenar')->middleware('auth');
Route::get('/user/fmp', [Controlador::class, 'fmp_rellenar'])->name('fmp.rellenar')->middleware('auth');
Route::post('/user/fmp/agregar', [Controlador::class, 'fmp_agregar'])->name('fmp.agregar')->middleware('auth');
Route::get('/user/fmp/generados', [Controlador::class, 'fmp_generados'])->name('fmp.generados')->middleware('auth');
Route::get('/fmp/generados/{fmp}/llenos', [Controlador::class, 'fmp_lleno'])->name('fmp.lleno');
Route::get('/user/fmp_pendientes_revisar', [Controlador::class, 'pendientes_revisar'])->name('pendientes.revisar')->middleware('auth');
Route::get('/user/fmp_pendientes_revisar/{fmp}/fmp', [Controlador::class, 'fmp_revisar'])->name('fmp.revisar')->middleware('auth');
Route::patch('/user/fmp_pendientes_revisar/{fmp}/fmp/revisado', [Controlador::class, 'fmp_revisado'])->name('fmp.revisado');
//Rutas del formato de materia prima




//Rutas del formato de producto no conforme
Route::get('/user/fpnc/{fmp}/rellenar', [Controlador::class, 'fpnc_rellenar'])->name('fpnc.rellenar')->middleware('auth');
Route::get('/user/fpnc', [Controlador::class, 'tabla_fpnc'])->name('tabla.fpnc')->middleware('auth');
Route::post('/user/fpnc/agregar', [Controlador::class, 'fpnc_agregar'])->name('fpnc.agregar')->middleware('auth');
Route::get('/user/fpnc/generados', [Controlador::class, 'fpnc_generados'] )->name('fpnc.generados')->middleware('auth');
Route::get('user/fpnc/{fpnc}/lleno', [Controlador::class, 'fpnc_lleno'])->name('fpnc.lleno')->middleware('auth');
//Rutas del formato de producto no conforme



//Rutas del formato de verificacion de vehiculos
Route::get('/user/fvu/', [Controlador::class, 'fvu_rellenar'])->name('fvu.rellenar')->middleware('auth');
Route::post('/user/fvu/post', [Controlador::class, 'fvu_agregar'])->name('fvu.agregar')->middleware('auth');
Route::get('/user/fvu/tabla', [Controlador::class, 'fvu_tabla'])->name('fvu.tabla')->middleware('auth');
Route::get('/user/fvu/{fvu}/fvu_lleno', [Controlador::class, 'fvu_lleno'])->name('fvu.lleno')->middleware('auth');




Route::get('/user/fvu/almacen/pendientes', [Controlador::class, 'fvu_pendientes'])->name('fvu.pendientes')->middleware('auth');
Route::get('/users/fvu/almace/pendientes/{fvu}/verificar', [Controlador::class, 'fvu_verificar'])->name('fvu.verificar')->middleware('auth');

Route::post('/user/fvu/almacen/verificado/post',[Controlador::class, 'almacen_fvu_verificar'])->name('almacen.fvu.verificar')->middleware('auth');

//Rutas del formato de verificacion de vehiculos



//Agregando el lote un formato que quedo pendiente
Route::post('/fmp/generados/{id}/llenos/lote', [Controlador::class, 'add_lote'])->name('add.lote');
Route::post('/user/fvu/{id}/fvu_lleno/asignar_embarque', [Controlador::class, 'add_embarque'])->name('add.embarque');









Route::post('/user', [Controlador::class, 'cerrar_sesion'])->name('cerrar.sesion');
Route::post('/', [Controlador::class, 'login'])->name('login.intro');
Route::view('/', 'login')->name('login');