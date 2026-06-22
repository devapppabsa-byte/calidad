<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ─── ADMIN ───
        DB::table('adminis')->insert([
            'nombre_completo' => 'Admin Principal',
            'email'           => 'admin@calidad.com',
            'password'        => Hash::make('admin123'),
        ]);

        // ─── USUARIOS ───
        $usuarios = [
            ['nombre_completo' => 'Carlos López',   'email' => 'calidad1@test.com',  'area' => 'CALIDAD',    'planta' => '1'],
            ['nombre_completo' => 'María García',   'email' => 'calidad2@test.com',  'area' => 'CALIDAD',    'planta' => '2'],
            ['nombre_completo' => 'José Martínez',  'email' => 'calidad3@test.com',  'area' => 'CALIDAD',    'planta' => '3'],
            ['nombre_completo' => 'Ana Fernández',  'email' => 'produccion1@test.com', 'area' => 'PRODUCCION', 'planta' => '1'],
            ['nombre_completo' => 'Luis Rivera',    'email' => 'bascula1@test.com',  'area' => 'BASCULA',    'planta' => '1'],
            ['nombre_completo' => 'Sofía Torres',   'email' => 'almacenpt@test.com', 'area' => 'ALMACEN PT', 'planta' => '1'],
        ];
        foreach ($usuarios as $u) {
            DB::table('users')->insert([
                'nombre_completo' => $u['nombre_completo'],
                'email'           => $u['email'],
                'password'        => Hash::make('12345678'),
                'area'            => $u['area'],
                'planta'          => $u['planta'],
            ]);
        }

        // ─── CATÁLOGOS ───
        $proveedores = ['Agroinsumos SA', 'Semillas del Valle', 'Cosecha Directa', 'Granos del Norte', 'Campo Verde', 'Agropecuaria La Paz'];
        foreach ($proveedores as $p) {
            DB::table('proveedores')->insert(['nombre_proveedor' => $p]);
        }

        $productos = ['Maíz Blanco', 'Maíz Amarillo', 'Trigo', 'Sorgo', 'Frijol', 'Arroz', 'Soya', 'Avena'];
        foreach ($productos as $p) {
            DB::table('productos')->insert(['nombre_producto' => $p]);
        }

        $transportistas = ['Transportes Rápidos', 'Carga Pesada SA', 'Fletes del Centro', 'Logística Integral', 'Camiones Unidos'];
        foreach ($transportistas as $t) {
            DB::table('transportista')->insert(['nombre_transportista' => $t]);
        }

        // ─── FMP ───
        $dictamenes = ['ACEPTADO', 'RECHAZADO'];
        $now = Carbon::now();
        $folio_counters = [1 => 0, 2 => 0, 3 => 0];

        for ($i = 0; $i < 80; $i++) {
            $planta   = rand(1, 3);
            $folio_counters[$planta]++;
            $folio    = "PL{$planta}-0{$folio_counters[$planta]}";
            $created  = $now->copy()->subDays(rand(0, 365));
            $fecha_str = $created->locale('es')->isoFormat('LL');
            $dictamen = $dictamenes[array_rand($dictamenes)];

            DB::table('fmp')->insert([
                "folio_p{$planta}"      => $folio_counters[$planta],
                'planta'                => $planta,
                'folio'                 => $folio,
                'fecha'                 => $fecha_str,
                'hora_recepcion'        => sprintf('%02d:%02d', rand(6, 18), rand(0, 59)),
                'producto'              => $productos[array_rand($productos)],
                'proveedor'             => $proveedores[array_rand($proveedores)],
                'lote'                  => 'LOTE-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT),
                'linea_transportista'   => $transportistas[array_rand($transportistas)],
                'nombre_operador'       => 'Operador ' . rand(1, 20),
                'placas_transporte'     => strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3)) . '-' . rand(100, 999),
                'placas_caja'           => strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3)) . '-' . rand(100, 999),
                'hora_entrada_lab'      => sprintf('%02d:%02d', rand(6, 18), rand(0, 59)),
                'hora_liberacion'       => sprintf('%02d:%02d', rand(6, 18), rand(0, 59)),
                'humedad'               => (string) round(10 + rand(0, 50) / 10, 1),
                'temperatura'           => (string) round(20 + rand(0, 100) / 10, 1),
                'impurezas'             => (string) round(rand(0, 50) / 10, 1),
                'metodo_muestreo'       => 'Manual',
                'aceptado_concesion'    => rand(0, 1) ? 'SI' : 'NO',
                'superviso_muestreo'    => 'Supervisor ' . rand(1, 5),
                'usuario_logeado'       => $usuarios[array_rand($usuarios)]['nombre_completo'],
                'dictamen_final'        => $dictamen,
                'fpnc_lleno'            => 'no',
                'observaciones_realizador' => 'Observación de prueba',
                'reviso_bascula'        => rand(0, 1) ? 'SI' : null,
                'reviso_produccion'     => rand(0, 1) ? 'SI' : null,
                'unidad_medida'         => 'KG',
                'caducidad'             => $created->copy()->addMonths(6)->locale('es')->isoFormat('LL'),
                'fleje'                 => rand(0, 1) ? 'SI' : 'NO',
                'cantidad_recepcionada' => (string) rand(1000, 50000),
                'created_at'            => $created,
                'updated_at'            => $created,
            ]);
        }

        // ─── FPNC (para algunos FMP rechazados) ───
        $rechazados = DB::table('fmp')->where('dictamen_final', 'RECHAZADO')->limit(15)->get();
        foreach ($rechazados as $r) {
            DB::table('fpnc')->insert([
                'fecha'              => $r->fecha,
                'folio'              => 'NC-' . $r->folio,
                'planta'             => $r->planta,
                'folio_fmp'          => $r->folio,
                'materia'            => $r->producto,
                'proveedor'          => $r->proveedor,
                'producto'           => $r->producto,
                'presentacion'       => 'Granel',
                'lote'               => $r->lote,
                'cantidad'           => $r->cantidad_recepcionada,
                'desviacion'         => 'Humedad fuera de especificación',
                'observaciones'      => 'Se detectó fuera de especificación',
                'via_notificacion'   => 'Correo electrónico',
                'recibe_notificacion' => 'proveedor@test.com',
                'emite_notificacion'  => 'calidad@test.com',
                'usuario_logeado'    => $r->usuario_logeado,
                'created_at'         => $r->created_at,
                'updated_at'         => $r->created_at,
            ]);

            DB::table('fmp')->where('id', $r->id)->update(['fpnc_lleno' => 'si']);
        }

        // ─── FVU ───
        $fvu_folio_counters = [1 => 0, 2 => 0, 3 => 0];
        for ($i = 0; $i < 40; $i++) {
            $planta   = rand(1, 3);
            $fvu_folio_counters[$planta]++;
            $folio    = "VU-PL{$planta}-0{$fvu_folio_counters[$planta]}";
            $fecha    = $now->copy()->subDays(rand(0, 365));
            $verificado = rand(0, 1) ? 'verificado' : 'no_verificado';

            DB::table('fvu')->insert([
                "folio_p{$planta}"      => $fvu_folio_counters[$planta],
                'planta'                => $planta,
                'folio'                 => $folio,
                'fecha'                 => $fecha->locale('es')->isoFormat('LL'),
                'hora'                  => sprintf('%02d:%02d', rand(6, 18), rand(0, 59)),
                'propietario'           => 'Propietario ' . rand(1, 10),
                'linea_transportista'   => $transportistas[array_rand($transportistas)],
                'numero_embarque'       => 'EMB-' . rand(1000, 9999),
                'operador'              => 'Operador ' . rand(1, 20),
                'placas_unidad'         => strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3)) . '-' . rand(100, 999),
                'placas_caja'           => strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3)) . '-' . rand(100, 999),
                'estructura_transporte' => rand(0, 1) ? 'BIEN' : 'MAL',
                'estructura_contenedor' => rand(0, 1) ? 'BIEN' : 'MAL',
                'piso'                  => rand(0, 1) ? 'BIEN' : 'MAL',
                'puertas'               => rand(0, 1) ? 'BIEN' : 'MAL',
                'paredes'               => rand(0, 1) ? 'BIEN' : 'MAL',
                'techo'                 => rand(0, 1) ? 'BIEN' : 'MAL',
                'materia_desconocida'   => rand(0, 1) ? 'NO' : 'SI',
                'plaga'                 => 'NO',
                'limpieza'              => rand(0, 1) ? 'BIEN' : 'REGULAR',
                'olores_desconocidos'   => 'NO',
                'filtraciones'          => 'NO',
                'certificado_fumigacion'=> rand(0, 1) ? 'SI' : 'NO',
                'libre_basura'          => 'SI',
                'vidrios_estrellados'   => 'NO',
                'sanitizacion_llantas'  => rand(0, 1) ? 'SI' : 'NO',
                'dictamen_final'        => rand(0, 1) ? 'ACEPTADO' : 'RECHAZADO',
                'usuario_logeado'       => $usuarios[array_rand($usuarios)]['nombre_completo'],
                'verifico_almacen'      => $verificado,
                'created_at'            => $fecha,
                'updated_at'            => $fecha,
            ]);
        }
    }
}
