@extends('layouts.master',['orderindex'=>'active','order'=>'active', 'menu_order'=>'menu-open'])


@section('title','Commandes')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Gestion des Commandes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        {{ Breadcrumbs::render('order.index') }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title font-weight-bold">Liste des commandes</h3>
                <a href="{{route('order.search')}}" class="float-right btn btn-primary btn-sm"><i class="fas fa-plus-circle mr-1"></i>Ajouter une Commande</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @if($orders->count() >0)
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Client</th>
                            <th>Gaz</th>
                            <th>Quartier</th>
                            <th>Tel</th>
                            <th>Date et Heure </th>
                            <th>Heure livraison</th>
                            <th>Délai</th>
                            <th>Livreur</th>
                            <th>Qté</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($orders as $o)
                            <tr>
                                <td><strong>{{$o->customer->code}}</strong></td>
                                <td>{{$o->customer->name}} - {!!  getStatusOrder($o)!!}</td>
                                <td>{{$o->gaz->name}}<span class="text-secondary"> {{$o->gaz->weight}}Kg</span></td>
                                <td>{{$o->customer->quarter->name}}</td>
                                <td>{{$o->customer->tel}}</td>
                                <td>{{ date('d M  Y',strtotime($o->date_order)) }} {{"à $o->time_order" ?? ' '}}</td>
                                <td>{{$o->time_deliver }}</td>
                                <td>{{($o->deliver_delay)?$o->deliver_delay.' min': ''}} </td>
                                <td>{!!  $o->delivery_man->name ?? '<span class=\'text-secondary\'>Inconnu</span>' !!}</td>
                                <td>{{$o->quantity}}</td>
                                <td>
                                    <a class="btn btn-primary btn-xs" href="{{route('order.edit',$o->id)}}"><i class="fas fa-user-edit"></i></a>
                                    <a class="btn btn-danger btn-xs" href="" data-toggle="modal" data-target="#modal-{{ $o->id }}"><i class="fas fa-trash"></i></a>

                                    @include('layouts.partials.delete_modal',
                                    [
                                        'id'=> $o->id,
                                        'name'=> 'Commande',
                                        "route"=> route('order.destroy', $o->id),
                                        "sms"=> "Vouler-vous vraiment supprimer définitivement cette Commande ?"
                                    ])

                                </td>
                            </tr>


                        @endforeach

                        </tbody>
                    </table>
                @else
                    <div class="error-content text-center">
                        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Aucune commande Aujourd'hui !</h3>

                        <p>
                            Vous ne disposez pas d'information dans votre tableau.
                            Ajouter une commande en cliquant ici <i class="ml-2 mr-2 fas fa-arrow-right"></i> <a href="{{ route('order.search') }}">ajouter une Commande</a>.
                        </p>
                    </div>
                @endif

            </div>
            <!-- /.card-body -->
        </div>
    </section>

@endsection

@push('css')
    <link rel="stylesheet" href="/master/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/master/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush

@push('js')
    <!-- DataTables -->
    <script src="/master/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/master/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/master/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/master/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": true,
            });
            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            //     "responsive": true,
            // });
        });
    </script>
@endpush