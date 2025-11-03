@extends('plantilla')
@section('contenido')
@section('title', 'Estadisticas Proveedores')
@include('assets.nav')
{{-- @include('assets.nav_admin') --}}
    


<div class="containe-fluid">

    <div class="row  justify-content-around mt-5">

      <div class="col-10 col-md-8 col-lg-4 bg-white p-4 m-2 rounded-4 shadow-sm border" style="height: 300px">
        <canvas id="mas_pedidos"></canvas>
      </div>

      <div class="col-10 col-md-8 col-lg-4 bg-white p-4 m-2 rounded-4 shadow-sm border" style="height: 300px">
        <canvas id="grafico_barras"></canvas>
      </div>

      <div class="col-10 col-md-8 col-lg-4 bg-white p-4 m-2 rounded-4 shadow-sm border" style="height: 300px">
        <canvas id="grafico_lineas"></canvas>
      </div>
        
    </div>
</div>









{{-- aqui esta el codigo para generar los graficos --}}

<script>

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
        label: 'Los mas rechazados',
        data: [
          @forelse($rechazados as $rechazado)
            {{ $rechazado->repeticiones }},
          @empty
            0
          @endforelse
        ],
        backgroundColor: [
          'rgba(54, 162, 235, 0.6)',
          'rgba(255, 99, 132, 0.6)',
          'rgba(255, 206, 86, 0.6)',
          'rgba(75, 192, 192, 0.6)',
          'rgba(153, 102, 255, 0.6)',
          'rgba(255, 159, 64, 0.6)'
        ],
        borderColor: [
          'rgba(54, 162, 235, 1)',
          'rgba(255, 99, 132, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1,
        borderRadius: 8, // esquinas redondeadas
        barPercentage: 0.7 // grosor de barra
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        x: {
          title: {
            display: true,
            font: { weight: 'bold' }
          },
          ticks: {
            maxRotation: 45,
            minRotation: 45
          }
        },
        y: {
          beginAtZero: true,
          title: {
            display: true,
            text: 'Cantidad de Entregas',
            font: { weight: 'bold' }
          }
        }
      },
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Proveedores con más rechazos',
          font: { size: 18 }
        },
        tooltip: {
          callbacks: {
            label: function(context) {
              return context.label + ': ' + context.formattedValue + ' entregas';
            }
          }
        }
      }
    }
  });
</script>



<script>
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
        label: 'Más entregas de Materia Prima',
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
      indexAxis: 'y', // 👉 barras horizontales
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { position: 'top' },
        title: { display: true, text: 'Ranking de Proveedores (Barras Horizontales)' }
      },
      scales: {
        x: { beginAtZero: true }
      }
    }
  });
</script>




<script>
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
      label: 'Más entregas de Materia Prima',
      data: [
        @forelse($proveedores as $proveedor)
          {{ $proveedor->repeticiones }},
        @empty
          0
        @endforelse
      ],
      fill: true,
      tension: 0.3,
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
      title: { display: true, text: 'Tendencia de Entregas por Proveedor' }
    }
  }
});
</script>





@endsection