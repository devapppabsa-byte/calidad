<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Fmp;
use App\Models\Fvu;
use App\Models\Fpnc;
use App\Models\User;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Transportista;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;
use App\Exports\FmpExport;
use Maatwebsite\Excel\Facades\Excel;


class Controlador extends Controller
{


    protected $guard = 'adminis'; 


    public function __construct(){
        $this->middleware('auth')->only('fmp_agregar');
    }




    public function login(Request $request){

        //Se cierran las sesiones abiertas antes de iniciar una nueva sesion
        Session::flush(); 
        Auth::logout();
        //Se cierran las sesiones abiertas antes de iniciar una nueva sesion


        $credenciales = request()->only('email', 'password');


        if(request('admin')){
       
            if(Auth::guard('adminis')->attempt($credenciales)){
                return redirect()->route('admin.view');
            }


            else{
                return back()->withErrors(['email' => 'El email no esta registrado como admnistrador' ]);
            }

        }


            if(Auth::attempt($credenciales)){
                
                return redirect()->route('user.perfil');
            }
            else{
                return back()->withErrors(['email' => 'El email no esta registrado como usuario ']);
            }


    }



    public function showAdmin(){

                
        $proveedores = DB::select("SELECT proveedor, COUNT(*) AS repeticiones FROM fmp GROUP BY proveedor ORDER BY repeticiones DESC LIMIT 10 ");

        $rechazados = DB::select("SELECT proveedor, COUNT(*) AS repeticiones FROM fmp WHERE dictamen_final LIKE 'RECHAZADO' GROUP BY proveedor ORDER BY repeticiones DESC LIMIT 10 ");

        


        return view('admin.perfil', compact('proveedores', 'rechazados'));
    }



    public function datos_admin(){

        $proveedores = DB::select("SELECT*FROM proveedores");
        $transportistas = DB::select("SELECT*FROM transportista");
        $productos = DB::select("SELECT*FROM productos");

        return view('admin.datos', compact('proveedores', 'transportistas', 'productos'));
    }



    public function delete_proveedor(Proveedor $proveedor){
  
        $proveedor->delete();
        return back()->with('proveedor_eliminado', 'El proveedor fue eliminado');

    }




    public function add_proveedores(){

        $proveedor = new Proveedor();
        $proveedor->nombre_proveedor = request('nombre_proveedor');
        $proveedor->save();
        

        return back()->with('add_proveedor', 'El proveedor fue agregado');
    }

    public function add_transportista(){

        $transportista = new Transportista();
        $transportista->nombre_transportista = request('nombre_transportista');
        $transportista->save();
        return back()->with('add_transportista', 'El Transportista fue agregado');

    }

    public function delete_transportista(Transportista $transportista){
        $transportista->delete();
        return back()->with('delete_transportista', 'El transportista fue eliminado');
    }


    public function add_productos(){

        $producto = new Producto();
        $producto->nombre_producto = request('nombre_producto');
        $producto->save();

        return back()->with('add_producto', 'El producto se agrego con exito');


    }

    public function delete_producto(Producto $producto){

        $producto->delete();

        return back()->with('producto_delete', 'El producto fue borrado');
    }



     
    public function agregar_usuario(){ //Agregarndo usuarios desde el perfil del administrador   

        request()->validate([
            'nombre' => 'required|string|max:100',
            'email'  => 'required',
            'password' => 'required|string|min:6'
        ]);    

    
        


        $user = new User();
        $user->nombre_completo = request('nombre');
        $user->email = request('email');
        $user->password = request('password');
        $user->area = request('area');
        $user->planta = request('planta');
        $user->save();

        return back()->with('success', 'El usuario:  '. request('nombre').' se registro correctamente');


    }


    public function lista_usuarios(){
        
        $resultados = User::all();
    

        return view('admin.administrar_usuarios', compact('resultados'));

    }

    public function lista_buscados(){
    
        $query = request('query');
        $resultados = DB::select("SELECT * FROM users WHERE nombre_completo LIKE '%$query%' OR  email LIKE '%$query%' OR area LIKE '%$query%'"  );
        return view('admin.administrar_usuarios', compact('resultados'));
   
    }

    public function editar_usuarios(User $usuario){
        return view('admin.editar_usuario', ['usuario' => $usuario] );
    }


    public function usuarios_update(User $usuario){
        
        //Obtenemos las contraseñas para ver si la cambio el usuario
        $id = request('id');
        $password = DB::select("SELECT password FROM Users WHERE id = $id");


        if(request('password') == $password[0]->password ){
         
            $usuario->update([
                'nombre_completo' => request('nombre'),
                'email' => request('email'),
                'area' =>request('area'),
                'planta' => request('planta')

            ]);

            return redirect()->route('lista.usuarios')->with("actualizado", "El usuario fue actualizado");
            
        }
        else{
            
            $usuario->update([
                'nombre_completo' => request('nombre'),
                'email' => request('email'),
                'password' => request('password'),
                'area' =>request('area'),
                'planta' => request('planta')

            ]);

            return redirect()->route('lista.usuarios')->with("actualizado", "El usuario fue actualizado");


        }



    }

    public function eliminar_usuario(User $usuario){

        return view('admin.eliminar_usuario', ['usuario' => $usuario] );
        
    }

    public function usuario_destruir(User $usuario){
    
        $usuario->delete();
        return redirect()->route('lista.usuarios')->with("eliminado", "El usuario $usuario->nombre_completo fue eliminado");
    
    }



    public function fmp_rellenar(){

        //Obteniendo la fecha
        Carbon::setLocale(config('app.locale'));
        $fecha = Carbon::now()->isoFormat('LL');
        //Obteniendo la fecha

        //Obteniendo todos los usuario
        $planta = Auth::user()->planta;
        $area = Auth::user()->area;
        $id_logeado = Auth::user()->id;
        $usuarios_planta = DB::select("SELECT nombre_completo FROM USERS WHERE planta LIKE $planta AND area LIKE '$area' ");
        //Obteniendo todos los usuario

        //Datos del proveedor//
        $proveedores = DB::select("SELECT*FROM proveedores");
        //Datos del proveedor//

        //Datos del producto
        $productos = DB::select("SELECT*FROM productos");
        //Datos del producto

        //Datos de los transportes
        $transportes = DB::select("SELECT*FROM transportista");
        //Datos de los transportes


        return view('user.fmp_rellenar', compact('fecha', 'usuarios_planta', 'proveedores', 'productos', 'transportes'));


    }

    public function fmp_agregar(){

        //
        $planta = Auth::user()->planta;

        if($planta == 1){
            $mas_alto = DB::select("SELECT MAX(folio_p1) as id  FROM fmp");
            $folio = "PL1-0".$mas_alto[0]->id + 1;
            $folio_planta = 'folio_p1';
            $consecutivo = $mas_alto[0]->id + 1;

        }



        if($planta == 2){
            $mas_alto = DB::select("SELECT MAX(folio_p2) as id  FROM fmp");
            $folio = "PL2-0".$mas_alto[0]->id + 1;
            $folio_planta = 'folio_p2';
            $consecutivo = $mas_alto[0]->id +1;

        }




        if($planta == 3){
            $mas_alto = DB::select("SELECT MAX(folio_p3) as id  FROM fmp");
            $folio = "PL3-0".$mas_alto[0]->id + 1;
            
            $folio_planta = 'folio_p3'; //igualo la variable al nombre de la columna que se va a utilizar

            $consecutivo = $mas_alto[0]->id + 1; //obtengo el folio mas alto y le sumo uno ara tener el folio que voy a asignar

        }
        

        //validando los datos obligatorios
        request()->validate([
            'hora_recepcion' => 'required',
            'operador' => 'required',
            'fleje' => 'required',
            'placas_transporte' => 'required',
            'placas_caja' => 'required',
            'hora_entrada_laboratorio' => 'required',
            'hora_liberacion' => 'required',
            'superviso_muestreo' => 'required'
        ]);
        
        $lote = 'pendiente';
        if(request('lote') !=null){
            $lote = request('lote');
        }

        $fmp = new Fmp();
        $fmp->$folio_planta = $consecutivo;
        $fmp->planta = request('planta');
        $fmp->folio = $folio;
        $fmp->fecha = request('fecha');
        $fmp->hora_recepcion = request('hora_recepcion');
        $fmp->producto = request('producto');
        $fmp->proveedor = request('proveedor');
        $fmp->lote = $lote;
        $fmp->fleje = request('fleje');
        $fmp->caducidad = request('caducidad');
        $fmp->cantidad_recepcionada = request('cantidad_recepcionada');
        $fmp->linea_transportista = request('linea_transportista');
        $fmp->nombre_operador = request('operador');
        $fmp->placas_transporte = request('placas_transporte');
        $fmp->placas_caja = request('placas_caja');
        $fmp->hora_entrada_lab = request('hora_entrada_laboratorio');
        $fmp->hora_liberacion = request('hora_liberacion');
        $fmp->humedad = request('humedad');
        $fmp->temperatura = request('temperatura');
        $fmp->peso_especifico = request('peso_especifico');
        $fmp->grano_maltratado = request('grano_maltratado');
        $fmp->grano_quebrado = request('grano_quebrado');
        $fmp->impurezas = request('impurezas');
        $fmp->cantidad_muestra = request('cantidad_muestra');
        $fmp->unidad_medida = request('unidad_medida');
        $fmp->bx = request('bx');
        $fmp->plagas = request('plagas');
        $fmp->certificado_calidad = request('certificado_calidad');
        // $fmp->fluorecencia = request('fluorecencia');
        $fmp->asegurado = request("asegurado");
        $fmp->color_olor_caracteristico = request('color_olor');
        $fmp->equipo_muestreo = request('equipo_muestreo');
        $fmp->materia_impropio = request('materia_impropio');
        $fmp->metodo_muestreo = request('metodo_muestreo');
        $fmp->dwg = request('dwg');
        $fmp->m10 = request('m10');
        $fmp->m16 = request('m16');
        $fmp->m18 = request('m18');
        $fmp->f = request('f');
        $fmp->superviso_muestreo = request('superviso_muestreo');
        $fmp->aceptado_concesion = request('aceptado_concesion');
        $fmp->usuario_logeado = request('usuario_logeado');
        $fmp->dictamen_final = request('dictamen');
        $fmp->observaciones_realizador = request('observaciones');
        
        $fmp->save();


        //Si el dictamen fue rechazado se manda al usuario a rellenar el forato de Producto No Conforme (fpnc)
        //con el folio para ligarlo al Formato de Materia Prima (fmp)
        if(request('dictamen') == 'rechazado' ){
            return view('user.fpnc_rellenar', compact('folio'));

        }





        // return view('user.tabla_fmp_enviados_revision', compact('formatos'))->with('creado', "El documento con folio: $folio fue creado correctamente");



        //Si todo marcha genial me va a redirigir a esta vista con el mensaje de sesion que se muestra
        return redirect()->route('user.perfil')->with('creado', "El documento con folio: $folio   fue creado correctamente");


    }


    public function fmp_generados(){

        $planta = Auth::user()->planta;
        //Me selecciona todos los formatos generados por es planta 
        //$formatos = DB::select("SELECT*FROM fmp WHERE planta LIKE $planta ORDER BY created_at DESC ")->simplePaginate(10);
        $formatos = Fmp::where('planta', $planta)->orderBy('created_at', 'DESC')->get();
        

        return view('user.tabla_fmp_enviados_revision', compact('formatos'));
    }



    


    public function fmp_lleno(Fmp $fmp){

        return view('fmp_lleno', compact('fmp'));

    }





    public function pendientes_revisar(){

        $area = Auth::user()->area;
        $planta = Auth::user()->planta;

        if($area == 'PRODUCCION'){
            $reviso = 'reviso_produccion';
        }
        if($area == 'BASCULA'){
            $reviso = 'reviso_bascula';
        }

        if($area == 'CALIDAD'){
            Session::flush(); //Manda alv la session
            Auth::logout();
            return redirect()->route('login');
            
        }






        $pendientes = DB::select("SELECT*FROM fmp WHERE planta=$planta ORDER BY  created_at DESC ");

   
        return view('user.tabla_fmp_por_revisar', compact('pendientes', 'reviso'));
    }








    public function  fmp_revisar(Fmp $fmp){

        $area = Auth::user()->area;

        if($area == 'PRODUCCION'){
            $reviso = 'reviso_produccion';
            $observaciones = 'observaciones_produccion';
        }

        if($area == 'BASCULA'){
            $reviso = 'reviso_bascula';
            $observaciones = 'observaciones_bascula';
        }

        if($area == 'CALIDAD'){
            Session::flush(); //Manda alv la session
            Auth::logout();
            return redirect()->route('login');
    
        }

 

        return view('user.fmp_por_revisar', compact('fmp', 'reviso', 'observaciones'));

    }






    public function fmp_revisado(Fmp $fmp){




        $fmp->update([
            request('reviso') => request('usuario'),
            request('observaciones_area') => request('observaciones'),
        ]);

        return redirect()->route('pendientes.revisar')->with('revisado', 'El documento se guardo con exito');
    }




    public function busqueda_fmp(){

        $formatos = Fmp::orderBy('created_at', 'desc')->get();

        return view('admin.buscador_fmp', compact('formatos'));
    }



    public function buscados_fmp(){

        $query = request('busqueda');
        $formatos = DB::select("SELECT*FROM fmp WHERE proveedor LIKE '%$query%'  OR producto LIKE '%$query%' OR fecha LIKE '%$query%' ");
        return view('admin.buscador_fmp', compact('formatos'));
    }


    public function busqueda_fpnc(){
        $formatos = Fpnc::orderBy('updated_at', 'desc')->get();

        return view('admin.buscador_fpnc', compact('formatos'));
    }


    public function buscados_fpnc(){
        $query = request('busqueda');
        $formatos = DB::select("SELECT*FROM fpnc WHERE proveedor LIKE '%$query%'  OR producto LIKE '%$query%' OR fecha LIKE '%$query%' OR lote LIKE '%$query%' OR folio LIKE '%$query%' ");
        
        return view('admin.buscador_fpnc', compact('formatos'));
    
    }



    public function busqueda_fvu(){
    
        $formatos = Fvu::orderBy('updated_at', 'desc')->get();
        return view('admin.buscador_fvu', compact('formatos'));
    
    }



    public function buscados_fvu(){

        $query = request('busqueda');
        $formatos = DB::select("SELECT*FROM fvu WHERE folio LIKE '%$query%' OR linea_transportista LIKE '%$query%' OR   OR propietario LIKE '%$query%' OR numero_embarque LIKE '%$query%' ");
        
        return view('admin.buscador_fvu', compact('formatos'));

    }









    public function cerrar_sesion(){

        Session::flush(); //Manda alv la session
        Auth::logout();
        return redirect()->route('login');

    }



    public function tabla_fpnc(){
        $planta = Auth::user()->planta;
        $fmp = DB::select("SELECT*FROM fmp WHERE dictamen_final LIKE 'RECHAZADO' AND fpnc_lleno LIKE 'no' AND planta LIKE $planta ORDER BY created_at DESC ");

        return view('user.tabla_fpnc_pendientes', compact('fmp'));
    }



    public function fpnc_rellenar(Fmp $fmp){
        
        //Obteniendo la fecha
        Carbon::setLocale(config('app.locale'));
        $fecha = Carbon::now()->isoFormat('LL');
        //Obteniendo la fecha

        return view('user.fpnc_rellenar', compact('fmp', 'fecha'));
    }

    public function fpnc_agregar(){

 

        request()->validate([
            'presentacion' => 'required',
            'desviacion' => 'required',
            'observaciones' => 'required',
            'recibe_notificacion' => 'required',
            'emite_notificacion' => 'required',
            'notificacion' => 'required',
            'folio_fmp' => 'required|unique:fpnc',
            'imagen1' => 'image|max:2048',
            'imagen2' => 'image|max:2048',
            'imagen3' => 'image|max:2048'
        ]);




        $foto1 = '';
        $foto2 = '';
        $foto3 = '';
        $otra_notificacion = '';


        if(request('imagen1')){
            $foto1 = request('imagen1')->store('public');
        }
        if(request('imagen2')){
            $foto2 = request('imagen2')->store('public');
        }
        if(request('imagen3')){
            $foto3 = request('imagen3')->store('public');
        }

        if(request('notificacion') == 'Otra' ){
            $otra_notificacion = request('otra_notificacion');
        }





        $fpnc = new Fpnc();
        $fpnc->fecha = request('fecha');
        $fpnc->planta = request('planta');
        $fpnc->folio = request('folio_fmp');
        $fpnc->folio_fmp = request('folio_fmp');
        $fpnc->materia = request('material');
        $fpnc->proveedor = request('proveedor');
        $fpnc->producto = request('producto');
        $fpnc->presentacion = request('presentacion');
        $fpnc->lote = request('lote');
        $fpnc->cantidad = request('cantidad');
        $fpnc->desviacion = request('desviacion');
        $fpnc->foto1 = $foto1;
        $fpnc->foto2 = $foto2;
        $fpnc->foto3 = $foto3;
        $fpnc->observaciones = request('observaciones');
        $fpnc->via_notificacion = request('notificacion');
        $fpnc->otra_notificacion = $otra_notificacion;
        $fpnc->recibe_notificacion = request('recibe_notificacion');
        $fpnc->emite_notificacion = request('emite_notificacion');
        $fpnc->usuario_logeado = request('usuario_logeado');
 
        $fpnc->save();
        
        $fmp = Fmp::findOrFail(request('id_fmp'));
        $fmp->fpnc_lleno = 'llenado';
        $fmp->save();



    
        return redirect()->route('tabla.fpnc')->with('fpnc_agregado', 'El formato  de Producto no Conforme fue agregado');

    }





    public function fpnc_generados(){

        $planta = Auth::user()->planta;
        $fpnc = DB::select("SELECT*FROM fpnc  WHERE planta LIKE $planta ORDER BY created_at DESC ");
        return view('user.tabla_fpnc_llenos', compact('fpnc'));

    }





    public function fpnc_lleno(Fpnc $fpnc){
        
        return view('user.fpnc_lleno', compact('fpnc')); 
    }




    public function fvu_rellenar(){

        //saco los datos de la persona que esta logeada para saber de que planta y de que area es, aunque el area ahuevo tendria que ser calidad pero igual losdejo por si hay alguna opcion de update
        $planta = Auth::user()->planta;
        $area = Auth::user()->area;

        //Obteniendo la fecha
        Carbon::setLocale(config('app.locale'));
        $fecha = Carbon::now()->isoFormat('LL');
        //Obteniendo la fecha


        //DATOS DEL TRANSPORTISTA
        $transportes = DB::select("SELECT*FROM transportista");
        //DATOS DEL TRANSPORTISTA

        //DATOS DEL PROVEEDOR / CLIENTE
        $proveedores = DB::select("SELECT*FROM proveedores");
        //DATOS DEL PROVEEDOR / CLIENTE

        $usuarios = DB::select("SELECT*FROM users WHERE planta LIKE $planta AND area LIKE '$area'");





        return view('user.fvu_rellenar', compact('fecha', 'transportes', 'proveedores', 'usuarios'));
    }





    public function fvu_agregar(){


        $foto1='';
        $foto2='';
        $foto3='';
        $firma= '';
        
    

        request()->validate([
            'hora' => 'required',
            'operador' => 'required',
            'placas_transporte' => 'required',
            'placas_caja' => 'required',
            'evidencia1' => 'max:2048',
            'evidencia2' => 'max:2048',
            'evidencia3' => 'max:2048',
            'firma' => 'max:2048'
        ]);



        //validando fotos
        if(request('evidencia1')){
            $foto1 = request('evidencia1')->store('public');
        }

        if(request('evidencia2')){
            $foto2 = request('evidencia2')->store('public');
        }

        if(request('evidencia3')){
            $foto3 = request('evidencia3')->store('public');
        }
        if(request('firma')){
            $firma = request('firma')->store('public');
        }





        //
        $planta = Auth::user()->planta;

        if($planta == 1){
            $mas_alto = DB::select("SELECT MAX(folio_p1) as id  FROM fvu");
            $folio = "PL1-0".$mas_alto[0]->id + 1;
            $folio_planta = 'folio_p1';
            $consecutivo = $mas_alto[0]->id + 1;

        }



        if($planta == 2){
            $mas_alto = DB::select("SELECT MAX(folio_p2) as id  FROM fvu");
            $folio = "PL2-0".$mas_alto[0]->id + 1;
            $folio_planta = 'folio_p2';
            $consecutivo = $mas_alto[0]->id +1;

        }




        if($planta == 3){
    
            $mas_alto = DB::select("SELECT MAX(folio_p3) as id  FROM fvu");

            $folio = "PL3-0".$mas_alto[0]->id + 1;
            
            $folio_planta = 'folio_p3'; //igualo la variable al nombre de la columna que se va a utilizar

            $consecutivo = $mas_alto[0]->id + 1; //obtengo el folio mas alto y le sumo uno ara tener el folio que voy a asignar

        }





        $embarque = 'pendiente';
        $embarque2 = '';

        if(request('embarque') !=''){
            $embarque = request('embarque');
        }

        if(request('embarque2') !=''){
            $embarque2 = request('embarque2');
        }


        //Guardando los datos del FVU
        $fvu = new  Fvu();
        $fvu->planta = request('planta');
        $fvu->$folio_planta = $consecutivo;
        $fvu->folio = $folio;
        $fvu->fecha = request('fecha');
        $fvu->hora = request('hora');
        $fvu->propietario = request('propietario');
        $fvu->propietario2 = request('propietario2');
        $fvu->linea_transportista = request('linea_transportista');
        $fvu->numero_embarque = $embarque;
        $fvu->numero_embarque2 = $embarque2;
        $fvu->operador = request('operador');
        $fvu->placas_unidad = request('placas_transporte');
        $fvu->placas_caja = request('placas_caja');
        $fvu->estructura_transporte = request('vehiculo');
        $fvu->estructura_contenedor = request('estructura_contenedor');
        $fvu->piso = request('piso');
        $fvu->puertas = request('puertas');
        $fvu->paredes = request('paredes');
        $fvu->techo = request('techo');
        $fvu->materia_desconocida = request('materia_desconocida');
        $fvu->plaga = request('plaga');
        $fvu->limpieza = request('limpieza');
        $fvu->olores_desconocidos = request('olores_raros');
        $fvu->filtraciones = request('filtraciones');
        $fvu->certificado_fumigacion = request('fumigacion');
        $fvu->libre_basura = request('libre_basura');
        $fvu->vidrios_estrellados = request('vidrios_estrellados');
        $fvu->sanitizacion_llantas = request('sanitizacion_llantas');
        $fvu->firma_operador = $firma;
        $fvu->dictamen_final = request('dictamen_final');
        $fvu->usuario_logeado = request('usuario_logeado');
        $fvu->observaciones = request('observaciones');
        $fvu->evidencia1 = $foto1;
        $fvu->evidencia2 = $foto2;
        $fvu->evidencia3 = $foto3;

        $fvu->save();
        


        return redirect()->route('user.perfil')->with("agregado", "El formato $folio fue agregado con exito!");




    }



    public function fvu_tabla(){
        $planta = Auth::user()->planta;
        $fvu = DB::select("SELECT*FROM fvu WHERE planta LIKE $planta  ORDER by created_at DESC");
        return view('user.tabla_fvu_llenos', compact('fvu'));
    }






    public function fvu_lleno(Fvu $fvu){
        return view('user.fvu_lleno', compact('fvu'));
    }


    public function fvu_pendientes(){
        $fvu = DB::select("SELECT*FROM fvu WHERE verifico_almacen LIKE 'no_verificado' ORDER BY  updated_at DESC");

        return view('user.tabla_fvu_pendientes', compact('fvu'));
    }



    public function fvu_verificar(Fvu $fvu){

        return view('user.fvu_verificar_almacen', compact('fvu'));
    }




    public function almacen_fvu_verificar(){
        
        $fvu = Fvu::findOrFail(request('id'));
        $fvu->verifico_almacen = request('usuario_logeado');
        $fvu->save();

        return redirect()->route('fvu.pendientes')->with('verificado', 'El documento se guardo con éxito');



    }


    //Exportando a excel

    public function fmp_excel(){
        return Excel::download(new FmpExport, 'fmp.xlsx');
    }




    public function add_lote($id){

        $fmp = Fmp::findOrFail($id);
        $fmp->lote = request('lote');
        $fmp->save();

        return back();

    }




    public function add_embarque($id){

        $fvu = Fvu::findOrFail($id);
        $fvu->numero_embarque = request('embarque');
        $fvu -> save();

        return back();
    }



    public function user_perfil(){


        //Obtiene el top de las materias primas mas recepcionadass
        $fmp_mas_recibidos = DB::table('fmp')
                            ->select('producto', DB::raw('COUNT(*) as cantidad'))
                            ->where('planta', Auth::user()->planta)
                            ->groupBy('producto')
                            ->orderByDesc('cantidad')
                            ->limit(20)
                            ->get();


        $hoy = Carbon::today();
        $limite = Carbon::today()->addDays(30);
        $caducidades_proximas = Fmp::whereBetween('caducidad', [$hoy, $limite])->where('planta', Auth::user()->planta)->get();

        foreach($caducidades_proximas as $caducidad){
            $caducidad->fecha_larga = Carbon::parse($caducidad->caducidad)->locale('es')->translatedFormat('j \d\e F \d\e Y');
        }


        return view('user.perfil', compact('fmp_mas_recibidos', 'caducidades_proximas'));
    }








}
