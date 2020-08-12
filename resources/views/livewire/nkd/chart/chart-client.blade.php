





<div>
    {{-- The whole world belongs to you --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Diagrammes Clients</h3>

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
                            <canvas id="chartline" width="500" height="250"></canvas>
{{--                            <p class="text-center "><a href="#" class="btn  btn-xs">Partager</a></p>--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- AREA CHART -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Area Chart</h3>

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
                console.log(clients)
            });

            chartLine(
                ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'G'],
                [11, 82, 33, 25, 23, 22, 8 ,19 ,3],
                "Clients par arrondissement",
                'chartline'
            );

            chartDoughnut(
                ['SCTM', 'TOTAL', 'BIOGAZ','CAMGAZ','NKDGAZ' ],
                [123,345,62,34,299],
                'Diagramme de Gaz',
                'dougnuthChart'
            );

        </script>
    @endpush
</div>


