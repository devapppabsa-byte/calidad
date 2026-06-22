@extends('plantilla')
@section('contenido')
@section('title', Auth::user()->nombre_completo )

@if (Auth()->user()->area == 'CALIDAD')
    @include('assets.nav_user')
@else
    @include('assets.nav')
@endif

<!-- Gráficas -->
<div class="container-fluid py-4">

    <!-- Tarjetas de resumen -->
    <div class="row justify-content-around mb-4">
        <div class="col-10 col-md-3 bg-white p-3 m-2 rounded-4 shadow-sm border text-center">
            <h5 class="text-muted">FMP Totales</h5>
            <h2 class="fw-bold text-primary">{{ $total_fmp }}</h2>
        </div>
        <div class="col-10 col-md-3 bg-white p-3 m-2 rounded-4 shadow-sm border text-center">
            <h5 class="text-muted">FPNC Totales</h5>
            <h2 class="fw-bold text-warning">{{ $total_fpnc }}</h2>
        </div>
        <div class="col-10 col-md-3 bg-white p-3 m-2 rounded-4 shadow-sm border text-center">
            <h5 class="text-muted">FVU Totales</h5>
            <h2 class="fw-bold text-success">{{ $total_fvu }}</h2>
        </div>
    </div>






<!-- MENU DE OPCIONES -->
<div class="container">

<div class="row d-flex justify-content-around">
        



@if (Auth()->user()->area == 'CALIDAD')


<div class="col-10 col-sm-10 col-md-10 col-lg-5 bg-white shadow p-5 m-5 ">
    <div class="row">
        <div class="col-12 text-center arvo">
            <h4>Top Recepcionados - Planta {{Auth()->user()->planta}}</h4>
        </div>
        <div class="col-12 mt-4 scroll-estadisticas  p-4">
                @php
                    $contador = 1;
                @endphp
                @forelse ($fmp_mas_recibidos as $fmp)
                      
                    <b> {{$contador++}}.- {{$fmp->producto}}</b> <br>  
                      
                    <small class="badge text-bg-light px-4 mb-4">{{$fmp->cantidad}} Recepciones</small>
                    <br> 
                @empty
                


                @endforelse
        </div>
    </div>
</div>




<div class="col-10 col-sm-10 col-md-10 col-lg-5 bg-white shadow p-5 m-5">
    <div class="row">
        <div class="col-12 text-center arvo">
            <h4>A caducar en los siguientes 30 dias - Planta {{Auth()->user()->planta}}</h4>
        </div>
        <div class="col-12 mt-4 scroll-estadisticas">

            <div class="accordion accordion-flush" id="accordionFlushExample">
                @forelse ($caducidades_proximas as $fmp)

                    <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#coll{{$fmp->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                {{$fmp->producto}} - {{$fmp->fecha_larga}}
                                </button>
                            </h2>
                            <div id="coll{{$fmp->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                   <div class="row justify-content-center">
                                        <div class="col-6 text-center">
                                           <b> Lote: </b>{{$fmp->lote}}
                                        </div>
                                        <div class="col-6 text-center">
                                            <a href="{{route('fmp.lleno', $fmp->id)}}" class="btn btn-light btn-sm">
                                                <i class="fa fa-eye mx-1"></i>
                                                Folio: {{$fmp->folio}}</a>
                                        </div>
                                   </div>
                                </div>
                            </div>
                    </div> 
                @empty
                    <div class="row">
                        <div class="col-12 text-center mt-5">
                            <i class="fa-solid fa-wand-magic-sparkles fa-5x text-center"></i>
                        </div>
                        <div class="col-12 text-center p-4">
                            <p class="cascadia h5">No hay proximos a caducar en los siguientes 30 dias</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>


@endif





@if (Auth::user()->area == 'PRODUCCION' || Auth::user()->area == 'BASCULA' )

        <div class="col-sm-12 col-md-3 mt-1 col-lg-3 sombra btn resizeable-div border border-5 mt-5">
            <div class="row d-flex align-items-center">
                <a href="{{route('pendientes.revisar')}}">
                    <div class="col-12">
                        <p class="mx-auto h5">FORMATOS POR REVISAR</p>
                    </div>
                    <div class="col-12">
                        <small>SON LOS FORMATOS QUE AÚN NO HAZ REVISADO</small> <br>
                        <i class="fa fa-eye mt-3 fa-2x"></i>
                    </div>
                </a>
            </div>
        </div>



            {{-- card documentos generados formato materia prima --}}
        <div class="col-sm-12 col-md-3 mt-1 col-lg-3 sombra btn resizeable-div  border border-5 mt-5">
            <a href="{{route('fmp.generados')}}">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h5 class="mx-auto">DOCUMENTOS GENERADOS</h5>
                        <small>FORMATO DE RECEPCIÓN DE MATERIA PRIMA</small>
                    </div>
                <div class="col-12">
                       <i class="fa-solid fa-magnifying-glass fa-2x mt-3"></i>
                 </div>
                </div>
            </a>
        </div>
              {{-- card documentos generados formato materia prima --}}            

        


 
@endif


@if (Auth::user()->area == 'ALMACEN PT' )    

    <div class="col-sm-12 col-md-3 mt-1 col-lg-3 sombra btn resizeable-div  border border-5 mt-5">
        <div class="row">
            <a href="{{route('fvu.pendientes')}}">
                <div class="col-12">
                    <p class="mx-auto h5">REVISAR FORMATO DE VERIFICACIÓN DE UNIDADES</p>
                </div>
                <div class="col-12">
                    <i class="fa fa-circle-check mt-3 fa-2x"></i>
                </div>
            </a>
        </div>
    </div>

@endif


@if (Auth::user()->area == 'ALMACEN MP' || Auth::user()->area == 'RECEPCIONES')
                {{-- card documentos generados formato materia prima --}}
                <div class="col-sm-12 col-md-3 mt-1 col-lg-3 sombra btn resizeable-div  border border-5 mt-5">
                    <a href="{{route('fmp.generados')}}">
                        <div class="row">
                            <div class="col-12 mt-3">
                                <h5 class="mx-auto">DOCUMENTOS GENERADOS</h5>
                                <small>FORMATO DE RECEPCIÓN DE MATERIA PRIMA</small>
                            </div>
                        <div class="col-12">
                               <i class="fa-solid fa-magnifying-glass fa-2x mt-3"></i>
                         </div>
                        </div>
                    </a>
                </div>
                      {{-- card documentos generados formato materia prima --}}  
@endif


    </div>

    
</div>







    <div class="row mt-4 g-3">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="bg-white p-3 rounded-4 shadow-sm border" style="height: 320px">
                <canvas id="mas_pedidos"></canvas>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="bg-white p-3 rounded-4 shadow-sm border" style="height: 320px">
                <canvas id="grafico_barras"></canvas>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="bg-white p-3 rounded-4 shadow-sm border" style="height: 320px">
                <canvas id="grafico_lineas"></canvas>
            </div>
        </div>
    </div>
    <div class="row mt-4 g-3">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="bg-white p-3 rounded-4 shadow-sm border" style="height: 320px">
                <canvas id="fmp_mes_chart"></canvas>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="bg-white p-3 rounded-4 shadow-sm border" style="height: 320px">
                <canvas id="fpnc_mes_chart"></canvas>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="bg-white p-3 rounded-4 shadow-sm border" style="height: 320px">
                <canvas id="fvu_mes_chart"></canvas>
            </div>
        </div>
    </div>
    <div class="row mt-4 g-3">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="bg-white p-3 rounded-4 shadow-sm border" style="height: 320px">
                <canvas id="transportistas_fmp_chart"></canvas>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="bg-white p-3 rounded-4 shadow-sm border" style="height: 320px">
                <canvas id="transportistas_fvu_chart"></canvas>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="bg-white p-3 rounded-4 shadow-sm border" style="height: 320px">
                <canvas id="productos_chart"></canvas>
            </div>
        </div>
    </div>
    <div class="row mt-4 g-3">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="bg-white p-3 rounded-4 shadow-sm border" style="height: 320px">
                <canvas id="dictamenes_chart"></canvas>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="bg-white p-3 rounded-4 shadow-sm border" style="height: 320px">
                <canvas id="fvu_verificacion_chart"></canvas>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="bg-white p-3 rounded-4 shadow-sm border" style="height: 320px">
                <canvas id="usuarios_chart"></canvas>
            </div>
        </div>
    </div>

</div>

<script>
// Gráfica 1: Proveedores más rechazados
const ctx = document.getElementById('mas_pedidos');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            @forelse($rechazados as $rechazado)
                '{{ $rechazado->proveedor }}',
            @empty
                'Sin datos'
            @endforelse
        ],
        datasets: [{
            label: 'Rechazos',
            data: [
                @forelse($rechazados as $rechazado)
                    {{ $rechazado->repeticiones }},
                @empty
                    0
                @endforelse
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)',
                'rgba(255, 159, 64, 0.6)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
            borderRadius: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: { ticks: { maxRotation: 45, minRotation: 45 } },
            y: { beginAtZero: true, title: { display: true, text: 'Cantidad', font: { weight: 'bold' } } }
        },
        plugins: {
            legend: { position: 'top' },
            title: { display: true, text: 'Proveedores con más rechazos', font: { size: 16 } }
        }
    }
});
</script>

<script>
// Gráfica 2: Ranking de Proveedores
const ctx1 = document.getElementById('grafico_barras');
new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: [
            @forelse($proveedores as $proveedor)
                '{{ $proveedor->proveedor }}',
            @empty
                'Sin datos'
            @endforelse
        ],
        datasets: [{
            label: 'Entregas',
            data: [
                @forelse($proveedores as $proveedor)
                    {{ $proveedor->repeticiones }},
                @empty
                    0
                @endforelse
            ],
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
            borderRadius: 8
        }]
    },
    options: {
        indexAxis: 'y',
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { position: 'top' },
            title: { display: true, text: 'Ranking de Proveedores', font: { size: 16 } }
        },
        scales: { x: { beginAtZero: true } }
    }
});
</script>

<script>
// Gráfica 3: Tendencia de Proveedores
const ctx2 = document.getElementById('grafico_lineas');
new Chart(ctx2, {
    type: 'line',
    data: {
        labels: [
            @forelse($proveedores as $proveedor)
                '{{ $proveedor->proveedor }}',
            @empty
                'Sin datos'
            @endforelse
        ],
        datasets: [{
            label: 'Entregas',
            data: [
                @forelse($proveedores as $proveedor)
                    {{ $proveedor->repeticiones }},
                @empty
                    0
                @endforelse
            ],
            fill: true,
            tension: 0.1,
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.3)',
            pointBackgroundColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { position: 'top' },
            title: { display: true, text: 'Tendencia de Proveedores', font: { size: 16 } }
        }
    }
});
</script>

<script>
// Gráfica 4: FMP por mes
const ctx3 = document.getElementById('fmp_mes_chart');
const fmpMesesLabels = [
    @forelse($fmp_por_mes as $m)
        '{{ $m->mes }}',
    @empty
        'Sin datos'
    @endforelse
];
const fmpMesesData = [
    @forelse($fmp_por_mes as $m)
        {{ $m->total }},
    @empty
        0
    @endforelse
];
new Chart(ctx3, {
    type: 'line',
    data: {
        labels: fmpMesesLabels.reverse(),
        datasets: [{
            label: 'FMP creados',
            data: fmpMesesData.reverse(),
            fill: true,
            tension: 0.1,
            borderColor: 'rgba(54, 162, 235, 1)',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            pointBackgroundColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: { beginAtZero: true, title: { display: true, text: 'Cantidad', font: { weight: 'bold' } } }
        },
        plugins: {
            legend: { position: 'top' },
            title: { display: true, text: 'FMP por Mes', font: { size: 16 } }
        }
    }
});
</script>

<script>
// Gráfica 5: FPNC por mes
const ctx4 = document.getElementById('fpnc_mes_chart');
const fpncMesesLabels = [
    @forelse($fpnc_por_mes as $m)
        '{{ $m->mes }}',
    @empty
        'Sin datos'
    @endforelse
];
const fpncMesesData = [
    @forelse($fpnc_por_mes as $m)
        {{ $m->total }},
    @empty
        0
    @endforelse
];
new Chart(ctx4, {
    type: 'line',
    data: {
        labels: fpncMesesLabels.reverse(),
        datasets: [{
            label: 'FPNC creados',
            data: fpncMesesData.reverse(),
            fill: true,
            tension: 0.1,
            borderColor: 'rgba(255, 206, 86, 1)',
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            pointBackgroundColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: { beginAtZero: true, title: { display: true, text: 'Cantidad', font: { weight: 'bold' } } }
        },
        plugins: {
            legend: { position: 'top' },
            title: { display: true, text: 'FPNC por Mes', font: { size: 16 } }
        }
    }
});
</script>

<script>
// Gráfica 6: FVU por mes
const ctx5 = document.getElementById('fvu_mes_chart');
const fvuMesesLabels = [
    @forelse($fvu_por_mes as $m)
        '{{ $m->mes }}',
    @empty
        'Sin datos'
    @endforelse
];
const fvuMesesData = [
    @forelse($fvu_por_mes as $m)
        {{ $m->total }},
    @empty
        0
    @endforelse
];
new Chart(ctx5, {
    type: 'line',
    data: {
        labels: fvuMesesLabels.reverse(),
        datasets: [{
            label: 'FVU creados',
            data: fvuMesesData.reverse(),
            fill: true,
            tension: 0.1,
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            pointBackgroundColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: { beginAtZero: true, title: { display: true, text: 'Cantidad', font: { weight: 'bold' } } }
        },
        plugins: {
            legend: { position: 'top' },
            title: { display: true, text: 'FVU por Mes', font: { size: 16 } }
        }
    }
});
</script>

<script>
// Gráfica 7: Fleteras más usadas en FMP
const ctx6 = document.getElementById('transportistas_fmp_chart');
const transportistasFMP = [
    @forelse($transportistas_fmp as $t)
        { label: '{{ $t->linea_transportista }}', value: {{ $t->total }} },
    @empty
        { label: 'Sin datos', value: 0 },
    @endforelse
];
new Chart(ctx6, {
    type: 'doughnut',
    data: {
        labels: transportistasFMP.map(t => t.label),
        datasets: [{
            data: transportistasFMP.map(t => t.value),
            backgroundColor: [
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 99, 132, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)',
                'rgba(201, 203, 207, 0.7)',
                'rgba(34, 139, 34, 0.7)',
                'rgba(255, 69, 0, 0.7)',
                'rgba(0, 191, 255, 0.7)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { position: 'right', labels: { boxWidth: 12, font: { size: 10 } } },
            title: { display: true, text: 'Fleteras más usadas (FMP)', font: { size: 16 } }
        }
    }
});
</script>

<script>
// Gráfica 8: Fleteras más usadas en FVU
const ctx7 = document.getElementById('transportistas_fvu_chart');
const transportistasFVU = [
    @forelse($transportistas_fvu as $t)
        { label: '{{ $t->linea_transportista }}', value: {{ $t->total }} },
    @empty
        { label: 'Sin datos', value: 0 },
    @endforelse
];
new Chart(ctx7, {
    type: 'doughnut',
    data: {
        labels: transportistasFVU.map(t => t.label),
        datasets: [{
            data: transportistasFVU.map(t => t.value),
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)',
                'rgba(201, 203, 207, 0.7)',
                'rgba(34, 139, 34, 0.7)',
                'rgba(255, 69, 0, 0.7)',
                'rgba(0, 191, 255, 0.7)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { position: 'right', labels: { boxWidth: 12, font: { size: 10 } } },
            title: { display: true, text: 'Fleteras más usadas (FVU)', font: { size: 16 } }
        }
    }
});
</script>

<script>
// Gráfica 9: Productos más recibidos
const ctx8 = document.getElementById('productos_chart');
new Chart(ctx8, {
    type: 'bar',
    data: {
        labels: [
            @forelse($productos_top as $p)
                '{{ $p->producto }}',
            @empty
                'Sin datos'
            @endforelse
        ],
        datasets: [{
            label: 'Recepciones',
            data: [
                @forelse($productos_top as $p)
                    {{ $p->total }},
                @empty
                    0
                @endforelse
            ],
            backgroundColor: 'rgba(153, 102, 255, 0.6)',
            borderColor: 'rgba(153, 102, 255, 1)',
            borderWidth: 1,
            borderRadius: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: { beginAtZero: true, title: { display: true, text: 'Cantidad', font: { weight: 'bold' } } },
            x: { ticks: { maxRotation: 45, minRotation: 45 } }
        },
        plugins: {
            legend: { position: 'top' },
            title: { display: true, text: 'Productos más recibidos', font: { size: 16 } }
        }
    }
});
</script>

<script>
// Gráfica 10: Dictámenes
const ctx9 = document.getElementById('dictamenes_chart');
const dictamenLabels = [];
const dictamenData = [];
@forelse($dictamenes as $d)
    dictamenLabels.push('{{ $d->dictamen_final }}');
    dictamenData.push({{ $d->total }});
@empty
    dictamenLabels.push('Sin datos');
    dictamenData.push(0);
@endforelse
new Chart(ctx9, {
    type: 'doughnut',
    data: {
        labels: dictamenLabels,
        datasets: [{
            data: dictamenData,
            backgroundColor: [
                'rgba(75, 192, 192, 0.7)',
                'rgba(255, 99, 132, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(153, 102, 255, 0.7)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { position: 'right' },
            title: { display: true, text: 'Dictámenes de FMP', font: { size: 16 } }
        }
    }
});
</script>

<script>
// Gráfica 11: FVU verificación almacén
const ctx10 = document.getElementById('fvu_verificacion_chart');
const verificacionLabels = [];
const verificacionData = [];
@forelse($fvu_verificados as $v)
    verificacionLabels.push('{{ $v->verifico_almacen }}');
    verificacionData.push({{ $v->total }});
@empty
    verificacionLabels.push('Sin datos');
    verificacionData.push(0);
@endforelse
new Chart(ctx10, {
    type: 'pie',
    data: {
        labels: verificacionLabels,
        datasets: [{
            data: verificacionData,
            backgroundColor: [
                'rgba(75, 192, 192, 0.7)',
                'rgba(255, 159, 64, 0.7)',
                'rgba(201, 203, 207, 0.7)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { position: 'right' },
            title: { display: true, text: 'FVU - Verificación Almacén', font: { size: 16 } }
        }
    }
});
</script>

<script>
// Gráfica 12: Usuarios con más FMP
const ctx11 = document.getElementById('usuarios_chart');
new Chart(ctx11, {
    type: 'bar',
    data: {
        labels: [
            @forelse($usuarios_top as $u)
                '{{ $u->usuario_logeado }}',
            @empty
                'Sin datos'
            @endforelse
        ],
        datasets: [{
            label: 'FMP creados',
            data: [
                @forelse($usuarios_top as $u)
                    {{ $u->total }},
                @empty
                    0
                @endforelse
            ],
            backgroundColor: 'rgba(255, 159, 64, 0.6)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 1,
            borderRadius: 8
        }]
    },
    options: {
        indexAxis: 'y',
        responsive: true,
        maintainAspectRatio: false,
        scales: { x: { beginAtZero: true, title: { display: true, text: 'Cantidad', font: { weight: 'bold' } } } },
        plugins: {
            legend: { position: 'top' },
            title: { display: true, text: 'Usuarios con más FMP', font: { size: 16 } }
        }
    }
});
</script>



<!-- MENU DE OPCIONES -->









{{-- alertas de que el usurio se agrego con exito o que hubo un error se desaparecen en 3 segundos--}}
@if (session('creado'))
    <script>
         window.addEventListener('load', function(){
            Swal.fire({
                title: "Hecho",
                text:  "{{session('creado')}}",
                icon: "success"
            });

            setTimeout(function(){
                window.location.replace(window.location.href);
            }, 2500);
         });
        
    </script>
 
@endif





{{-- alertas de que el usurio se agrego con exito o que hubo un error se desaparecen en 3 segundos--}}
@if (session('agregado'))
    <script>
         window.addEventListener('load', function(){
            Swal.fire({
                title: "Hecho",
                text:  "{{session('agregado')}}",
                icon: "success"
            });

            setTimeout(function(){
                window.location.replace(window.location.href);
            }, 2500);
         });
        
    </script>
 
@endif





@endsection