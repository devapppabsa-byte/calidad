@extends('plantilla')
@section('contenido')
@section('title', 'Panel de Estadísticas')
@include('assets.nav')

<div class="container-fluid py-4">

    <!-- Filtro de fechas -->
    <form method="GET" class="row g-3 align-items-end bg-white p-3 rounded-4 shadow-sm border mb-4">
        <div class="col-12 col-md-4">
            <label class="form-label fw-semibold">Fecha inicio</label>
            <input type="date" name="fecha_inicio" class="form-control" value="{{ $fecha_inicio ?? '' }}">
        </div>
        <div class="col-12 col-md-4">
            <label class="form-label fw-semibold">Fecha fin</label>
            <input type="date" name="fecha_fin" class="form-control" value="{{ $fecha_fin ?? '' }}">
        </div>
        <div class="col-12 col-md-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary flex-fill">Filtrar</button>
            <a href="{{ route('admin.view') }}" class="btn btn-outline-secondary flex-fill">Limpiar</a>
        </div>
    </form>

    <!-- Tarjetas de resumen -->
    <div class="row justify-content-around mb-4">
        <a href="{{ route('busqueda.fmp') }}" class="col-10 col-md-3 bg-white p-3 m-2 rounded-4 shadow-sm border text-center text-decoration-none">
            <h5 class="text-muted">FMP Totales</h5>
            <h2 class="fw-bold text-primary">{{ $total_fmp }}</h2>
        </a>
        <a href="{{ route('busqueda.fpnc') }}" class="col-10 col-md-3 bg-white p-3 m-2 rounded-4 shadow-sm border text-center text-decoration-none">
            <h5 class="text-muted">FPNC Totales</h5>
            <h2 class="fw-bold text-warning">{{ $total_fpnc }}</h2>
        </a>
        <a href="{{ route('busqueda.fvu') }}" class="col-10 col-md-3 bg-white p-3 m-2 rounded-4 shadow-sm border text-center text-decoration-none">
            <h5 class="text-muted">FVU Totales</h5>
            <h2 class="fw-bold text-success">{{ $total_fvu }}</h2>
        </a>
    </div>

    <!-- Filas de gráficas en 3 columnas -->
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
                <canvas id="plantas_chart"></canvas>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="bg-white p-3 rounded-4 shadow-sm border" style="height: 320px">
                <canvas id="dictamenes_chart"></canvas>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="bg-white p-3 rounded-4 shadow-sm border" style="height: 320px">
                <canvas id="totales_chart"></canvas>
            </div>
        </div>
    </div>
    <div class="row mt-4 g-3">
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
// Gráfica 2: Ranking de Proveedores (barras horizontales)
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
// Gráfica 3: Tendencia de Proveedores (líneas)
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
// Gráfica 4: Fleteras más usadas en FMP
const ctx3 = document.getElementById('transportistas_fmp_chart');
const transportistasFMP = [
    @forelse($transportistas_fmp as $t)
        { label: '{{ $t->linea_transportista }}', value: {{ $t->total }} },
    @empty
        { label: 'Sin datos', value: 0 },
    @endforelse
];
new Chart(ctx3, {
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
// Gráfica 5: Fleteras más usadas en FVU
const ctx4 = document.getElementById('transportistas_fvu_chart');
const transportistasFVU = [
    @forelse($transportistas_fvu as $t)
        { label: '{{ $t->linea_transportista }}', value: {{ $t->total }} },
    @empty
        { label: 'Sin datos', value: 0 },
    @endforelse
];
new Chart(ctx4, {
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
// Gráfica 6: Productos más recibidos
const ctx5 = document.getElementById('productos_chart');
new Chart(ctx5, {
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
// Gráfica 7: Formatos por planta (agrupado)
const ctx6 = document.getElementById('plantas_chart');
const fmpData = {
    @foreach($fmp_por_planta as $f)
        '{{ $f->planta }}': {{ $f->total }},
    @endforeach
};
const fpncData = {
    @foreach($fpnc_por_planta as $f)
        '{{ $f->planta }}': {{ $f->total }},
    @endforeach
};
const fvuData = {
    @foreach($fvu_por_planta as $f)
        '{{ $f->planta }}': {{ $f->total }},
    @endforeach
};
const allPlants = [...new Set([...Object.keys(fmpData), ...Object.keys(fpncData), ...Object.keys(fvuData)])].sort();
new Chart(ctx6, {
    type: 'bar',
    data: {
        labels: allPlants.map(p => 'Planta ' + p),
        datasets: [
            {
                label: 'FMP',
                data: allPlants.map(p => fmpData[p] || 0),
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderRadius: 4
            },
            {
                label: 'FPNC',
                data: allPlants.map(p => fpncData[p] || 0),
                backgroundColor: 'rgba(255, 206, 86, 0.7)',
                borderRadius: 4
            },
            {
                label: 'FVU',
                data: allPlants.map(p => fvuData[p] || 0),
                backgroundColor: 'rgba(75, 192, 192, 0.7)',
                borderRadius: 4
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: { stacked: false },
            y: { beginAtZero: true, title: { display: true, text: 'Cantidad', font: { weight: 'bold' } } }
        },
        plugins: {
            legend: { position: 'top' },
            title: { display: true, text: 'Formatos por Planta', font: { size: 16 } }
        }
    }
});
</script>

<script>
// Gráfica 8: Dictámenes (Aceptado vs Rechazado)
const ctx7 = document.getElementById('dictamenes_chart');
const dictamenLabels = [];
const dictamenData = [];
@forelse($dictamenes as $d)
    dictamenLabels.push('{{ $d->dictamen_final }}');
    dictamenData.push({{ $d->total }});
@empty
    dictamenLabels.push('Sin datos');
    dictamenData.push(0);
@endforelse
new Chart(ctx7, {
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
// Gráfica 9: Totales de cada formato
const ctx8 = document.getElementById('totales_chart');
new Chart(ctx8, {
    type: 'bar',
    data: {
        labels: ['FMP', 'FPNC', 'FVU'],
        datasets: [{
            label: 'Totales',
            data: [{{ $total_fmp }}, {{ $total_fpnc }}, {{ $total_fvu }}],
            backgroundColor: [
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1,
            borderRadius: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: { y: { beginAtZero: true, title: { display: true, text: 'Cantidad', font: { weight: 'bold' } } } },
        plugins: {
            legend: { position: 'top' },
            title: { display: true, text: 'Totales por Tipo de Formato', font: { size: 16 } }
        }
    }
});
</script>

<script>
// Gráfica 10: FMP por mes
const ctx9 = document.getElementById('fmp_mes_chart');
const mesesLabels = [
    @forelse($fmp_por_mes as $m)
        '{{ $m->mes }}',
    @empty
        'Sin datos'
    @endforelse
];
const mesesData = [
    @forelse($fmp_por_mes as $m)
        {{ $m->total }},
    @empty
        0
    @endforelse
];
new Chart(ctx9, {
    type: 'line',
    data: {
        labels: mesesLabels.reverse(),
        datasets: [{
            label: 'FMP creados',
            data: mesesData.reverse(),
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
// Gráfica 11: FPNC por mes
const ctx10a = document.getElementById('fpnc_mes_chart');
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
new Chart(ctx10a, {
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
// Gráfica 12: FVU por mes
const ctx10b = document.getElementById('fvu_mes_chart');
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
new Chart(ctx10b, {
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
// Gráfica 14: FVU estado de verificación
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
// Gráfica 15: Usuarios con más formatos
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

@endsection