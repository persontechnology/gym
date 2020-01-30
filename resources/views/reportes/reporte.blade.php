<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reportes</title>
    <!-- bootstrap v4 css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/dumbbell.js"></script>
<script src="https://code.highcharts.com/modules/lollipop.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>
<body>
    <div class="card">
        <figure class="highcharts-figure">
            <div id="container"></div>
            
        </figure>
       
    </div>
    <script>
        Highcharts.chart('container', {

            chart: {
                type: 'lollipop',
                scrollablePlotArea: {
                    minWidth: 500,
                    scrollPositionX: 1
                }
            },
        
            accessibility: {
                point: {
                    descriptionFormatter: function (point) {
                        var ix = point.index + 1,
                            x = point.name,
                            y = point.y;
                        return ix + '. ' + x + ', ' + y + '.';
                    }
                }
            },
        
            legend: {
                enabled: true
            },
            
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
        
            subtitle: {
                text: 'Control de peso'
            },
        
            title: {
                text: 'Control de Usuario {{ $user->nombre.' '.$user->apellido }} '
            },
        
            tooltip: {
                shared: true
            },
        
            xAxis: {
                type: 'category'
            },
        
            yAxis: {
                title: {
                    text: 'Control de Masa'
                }
            }, 
        
            series: [
                        {
                        name: 'Dieta',
                        data: [
                            @php
                                $i=0;
                            @endphp
                        @foreach ($dietas as $dieta)
                            
                           
                        {
                            name: '{{$dieta->dieta->titulo.'-'.Carbon\Carbon::parse($dieta->created_at)->format('d-M-Y')}}',
                            low: {{number_format($dieta->peso/pow($dieta->altura,2),4) }}
                        },
                        @php
                            $i++;
                        @endphp
                        @endforeach 
                        ]
                    }
            ]
        
        });
    </script>
</body>
</html>