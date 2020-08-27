@extends('layouts.master',['client'=>'active','client_list'=>'active', 'menu_client'=>'menu-open'])


@section('title','Clients')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ucwords($client->name)}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        {{ Breadcrumbs::render('client.show',$client) }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title font-weight-bold">Information du client {{$client->name}}</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <div class="conatainer ">
                    <div class="row">
                        <ul class="list-group col-md-6 px-3 py-3 ">
{{--                            <li class="list-group-item active"><h4>Informations personnel</h4></li>--}}
                            <li class="list-group-item "><span class="text-secondary ">Nom : </span> <h4>{{genre($client).' '. $client->name}}</h4></li>
                            <li class="list-group-item"><span class="text-secondary">Code : </span> <h4><span class="badge badge-warning">{{$client->code}}</span></h4></li>
                            <li class="list-group-item"><span class="text-secondary">Gaz Habituel :</span> {{$client->type_gaz}}</li>
                            <li class="list-group-item"><span class="text-secondary">Téléphone :</span> {{$client->tel}}</li>
                            <li class="list-group-item"><span class="text-secondary">Anniversaire : </span> {{date('l F', strtotime($client->birthday))}}</li>
                        </ul>
                        <ul class="list-group col-md-6 px-3 py-3">
{{--                            <li class="list-group-item disabled ">Position</li>--}}
                            <li class="list-group-item"><span class="text-secondary">Pays</span>: {{$client->quarter->arrondissement->city->country->name}}</li>
                            <li class="list-group-item"><span class="text-secondary">Vile - Arrondissement :</span> {{$client->quarter->arrondissement->city->name}} - {{$client->quarter->arrondissement->name}}</li>
                            <li class="list-group-item"><span class="text-secondary">Quartier :</span> {{$client->quarter->name}}</li>
                            <li class="list-group-item"><span class="text-secondary">Secteur :</span> {{$client->sector}}</li>
                            <li class="list-group-item"><span class="text-secondary">Repère :</span> {{$client->landmark}}</li>
                            <li class="list-group-item"><span class="text-secondary">Repère particulier :</span> {{$client->particular_landmark}}</li>
                        </ul>
                    </div>
                </div>

                <div class="container-fluid">
                    <br>
                        <h3>Historique des commandes :</h3>
                        @if($orders->count() >0)
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Client</th>
                                    <th>Gaz</th>
                                    <th>Quartier</th>
                                    <th>Tel</th>
                                    <th>Heure commande </th>
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
                                        <td>{{$o->time_order}}</td>
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
                                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Données non disponible.</h3>

                                <p>
                                    Ce client n'a passé qucune commande.
                                    Ajouter en cliquant ici <i class="ml-2 mr-2 fas fa-arrow-right"></i> <a href="{{ route('order.create',$client->id) }}">Ajouter</a>.
                                </p>
                            </div>
                        @endif
                    <br>
                </div>

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
                "responsive": false,
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