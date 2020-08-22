



<div>
    {{-- The whole world belongs to you --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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

            <div class="col-md-12">
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

            <div class="col-md-12">
                <!-- AREA CHART -->
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Evolution temporelle des bénefices</h3>

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
                        <div class="row">

                            <div class="col-xs-12 col-md-10 boxchart">
                                <canvas id="lineChart" width="500" height="250"></canvas>
                            </div>

                            <div class="col-sm-12 col-md-2">
                                <br>
                                <h3 class="">Configurations</h3> <br>
                                <p>
                                    Vous pouvez configurer ce diagramme et faire varier <strong>l'intervalle des dates</strong> pour
                                    obtenir ce que vous recherchez.
                                </p>
                                <div class="form-group">
                                    <input type="date" name="datebegin" wire:model.lazy="datebegin" id="" class="form-control">
                                    <span class="p-2"> à </span>
                                    <input type="date" name="dateend" wire:model.lazy="dateend" id="" class="form-control">

                                </div>
                                <div class="d-inline">
                                    <button class="btn btn-primary btn-sm" wire:click="reload" >
                                        configurer
                                    </button>
                                </div>
                            </div>

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

                let clients = @this.get('clients');
                let gaz = @this.get('gaz');
                let benefits = @this.get('benefits');
                // console.log(gaz);

                window.livewire.on('reloader',benefitss =>{

                    // @this.set('clients',0);
                    // @this.set('gaz',0);
                    // @this.set('benefits',benefitss);

                    var benefits = @this.get('benefits');

                    chartPie(
                        clients[0],
                        clients[1],
                        'Nombre de Clients par Quartier',
                        'dougnuthChart'
                    );

                    chartBar(
                        gaz[0],
                        'Nombre de Commandes par Types de Bouteilles',
                        'barChart',
                        gaz[1]
                    );

                    chartLine(
                        benefits[0],
                        benefits[1],
                        "bénefices du jour",
                        'lineChart'
                    );

                });



                chartPie(
                    clients[0],
                    clients[1],
                    'Nombre de Clients par Quartier',
                    'dougnuthChart'
                );

                chartBar(
                    gaz[0],
                    'Nombre de Commandes par Types de Bouteilles',
                    'barChart',
                    gaz[1]
                );

                chartLine(
                    benefits[0],
                    benefits[1],
                    "bénefices du jour",
                    'lineChart'
                );


            });

            // chartDoughnut(
            //     ['SCTM', 'TOTAL', 'BIOGAZ','CAMGAZ','NKDGAZ' ],
            //     [123,345,62,34,299],
            //     'Diagramme de Gaz',
            //     'dougnuthChart'
            // );

        </script>
    @endpush
</div>


