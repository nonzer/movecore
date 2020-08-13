





<div>
    {{-- The whole world belongs to you --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Nombre de Commandes par Types de Bouteilles</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="col-xs-12 col-md-12 boxchart">
                            <canvas id="barChart" width="500" height="250"></canvas>
{{--                            <p class="text-center "><a href="#" class="btn  btn-xs">Partager</a></p>--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- AREA CHART -->
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Nombre de Clients par Quartier</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="col-xs-12 col-md-12 boxchart" >
                            <canvas id="dougnuthChart" width="500" height="250" ></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>


    @push('css')
        <script src="/master/plugins/chart.js/Chart.css"></script>
    @endpush

    @push('js')
        {{--        For chart Js--}}
        <script src="/master/plugins/chart.js/Chart.js"></script>
        <script src="/js/chartCode.js"></script>
        {{--        End For chart Js--}}

        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded',function(){

                var clients = @this.get('clients');
                var gaz = @this.get('gaz');

                chartPie(
                    clients[0],
                    clients[1],
                    'Nombre de Clients par Quartier',
                    'dougnuthChart'
                )

                chartBar(
                    gaz[0],
                    'Nombre de Commandes par Types de Bouteilles',
                    'barChart',
                    gaz[1],
                );
            });

            chartLine(
                ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'G'],
                [11, 82, 33, 25, 23, 22, 8 ,19 ,3],
                "Clients par Quartier",
                'chartline'
            );

            // chartDoughnut(
            //     ['SCTM', 'TOTAL', 'BIOGAZ','CAMGAZ','NKDGAZ' ],
            //     [123,345,62,34,299],
            //     'Diagramme de Gaz',
            //     'dougnuthChart'
            // );

        </script>
    @endpush
</div>


