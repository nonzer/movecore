@extends('layouts.master',['home'=>'active'])


@section('title','Home')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('home') }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
{{--        @livewire('nkd.commande.search')--}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3> {{total_orders(false)}}</h3>
                            <h4>Commandes au total</h4>
                            <p class="">Aujourd'hui: <strong>{{total_orders()}}</strong></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
{{--                        <a href="{{route('order.index')}}" class="small-box-footer">Voir les commandes<i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{total_benefit()}}<sup>Fcfa</sup></h3>
                            <h4>Total des Bénéfices</h4>
                            <p class="">Aujour'hui: <strong>{{total_benefit(date('Y-m-d'))}} </strong>Fcfa</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-money-bill"></i>
                        </div>
                        {{--                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{number_format(delayAvg(),1)}}<sup style="font-size: 20px">Min</sup></h3> <br> <p></p>
                            <h4>Délais Moyen de livraison</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{client_count()}}</h3>

                            <br> <p></p>
                            <h4>Nombre de Client</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
{{--                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>
                <!-- ./col -->

            </div>
        </div>
        @livewire('nkd.chart.chart-client')

    </section>
@endsection
