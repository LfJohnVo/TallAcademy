@extends('adminlte::page')

@section('title', 'Escuela')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <canvas id="graficaTendencia"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <canvas id="graficaBarras"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <canvas id="graficaPastel"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>

    <script>
        //grafica tendencia

        // Obtener una referencia al elemento canvas del DOM
        const $grafica = document.querySelector("#graficaTendencia");
        // Las etiquetas son las que van en el eje X.
        const etiquetas = ["Enero", "Febrero", "Marzo"]
        // Podemos tener varios conjuntos de datos. Comencemos con uno
        const datosVentas2020 = {
            label: "Alumnos por mes",
            data: [10, 100, 500
            ], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
            borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
            borderWidth: 1, // Ancho del borde
        };
        new Chart($grafica, {
            type: 'line', // Tipo de gráfica
            data: {
                labels: etiquetas,
                datasets: [
                    datosVentas2020,
                    // Aquí más datos...
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                },
            }
        });
    </script>

    <script>
        var ctx = document.getElementById("graficaBarras");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["A5", "A6", "A7", "A8", "A9", "A10", "A11", "A12"],
                datasets: [{
                    label: '# Categorias mas populares',
                    data: [
                        1, 2, 3, 4, 5, 6, 7, 8
                    ],

                    backgroundColor: [

                        'rgba(32, 165, 147, 0.9)',
                        'rgba(35, 244, 105, 0.9)',
                        'rgba(238, 125, 226, 0.9)',
                        'rgba(15, 143, 73, 0.9)',
                        'rgba(240, 237, 0, 0.9)',
                        'rgba(255, 159, 64, 0.9)',
                        'rgba(255, 99, 132, 0.9)',
                        'rgba(54, 162, 235, 0.9)',
                        'rgba(255, 206, 86, 0.9)',
                        'rgba(75, 192, 192, 0.9)',
                        'rgba(153, 102, 255, 0.9)',
                        'rgba(18, 108, 255, 0.9)',
                        'rgba(105, 206, 15, 0.9)',
                        'rgba(255, 18, 151, 0.9)'
                    ],
                    borderColor: [
                        'rgba(32, 165, 147,1)',
                        'rgba(35, 244, 105,1)',
                        'rgba(238, 125, 226,1)',
                        'rgba(15, 143, 73,1)',
                        'rgba(240, 237, 0,1)',
                        'rgba(255, 159, 64,1)',
                        'rgba(255, 99, 132,1)',
                        'rgba(54, 162, 235,1)',
                        'rgba(255, 206, 86,1)',
                        'rgba(75, 192, 192,1)',
                        'rgba(153, 102, 255,1)',
                        'rgba(18, 108, 255,1)',
                        'rgba(105, 206, 15,1)',
                        'rgba(255, 18, 151,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                scales: {
                    xAxes: [{
                            ticks: {
                                maxRotation: 90,
                                minRotation: 80
                            },
                            gridLines: {
                                offsetGridLines: true // à rajouter
                            }
                        },
                        {
                            position: "top",
                            ticks: {
                                maxRotation: 90,
                                minRotation: 80
                            },
                            gridLines: {
                                offsetGridLines: true // et matcher pareil ici
                            }
                        }
                    ],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <script>
        var canvas_sgsi = document.getElementById("graficaPastel");
        var pie_sgsi = new Chart(canvas_sgsi, {
            type: 'pie',
            labels: {
                render: 'value'
            },
            data: {
                labels: [
                    "Inscritos",
                    "Aprobados"
                ],
                datasets: [{
                    label: '% Capacitacion',
                    data: [
                        40, 60
                    ],
                    backgroundColor: [
                        'rgba(22, 193, 66, 66)',
                        'rgba(22, 160, 133, 0.6)',


                    ]
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        fontColor: "black",
                        boxWidth: 20,
                        padding: 8
                    }
                },
                tooltips: {
                    mode: 'label'
                },

            }
        });
    </script>
@stop
