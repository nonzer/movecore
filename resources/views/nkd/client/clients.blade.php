@extends('layouts.master',['client'=>'active','client_list'=>'active', 'menu_client'=>'menu-open'])


@section('title','Clients')

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Gestion des Clients</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        {{ Breadcrumbs::render('client') }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title font-weight-bold">Liste des cLients</h3>
                <a href="{{route('category.create')}}" class="float-right btn btn-dark btn-sm ml-1"><i class="fas fa-plus-circle mr-1"></i>Ajouter une Categorie</a>
                <a href="{{route('excel.client')}}" class="float-right btn btn-success btn-sm ml-1"><i class="fas fa-file-excel mr-1"></i>Charger Excel</a>
                <a href="{{route('client.create')}}" class="float-right btn btn-primary btn-sm"><i class="fas fa-plus-circle mr-1"></i>Ajouter un client</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @if($clients->count() >0)
                    <table id="example1" class="table table-bordered table-responsive table-striped">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Nom</th>
                            <th>Gaz</th>
                            <th>Catégorie</th>
                            <th>Tel</th>
                            <th>Quartier</th>
                            <th>Secteur</th>
                            <th>Repère</th>
                            <th>Repère Part.</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($clients as $c)
                        <tr>
                            <td><strong>{{$c->code}}</strong></td>
                            <td> <span class="text-secondary">{{genre($c)}}</span> {{$c->name}}</td>
                            <td>{{$c->type_gaz}}</td>
                            <td>{{$c->category->name}}</td>
                            <td>{{$c->tel}}</td>
                            <td>{{$c->quarter->name}}</td>
                            <td>{{$c->sector}}</td>
                            <td>{{$c->landmark}}</td>
                            <td>{{Str::limit($c->particular_landmark,50)}}</td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="{{route('client.edit',$c->id)}}"><i class="fas fa-user-edit"></i></a>
                                <a class="btn btn-danger btn-xs"  href="" data-toggle="modal" data-target="#modal-{{ $c->id }}"><i class="fas fa-trash"></i></a>

                                @include('layouts.partials.delete_modal',
                                   [
                                       'id'=> $c->id,
                                       'name'=> 'Client',
                                       "route"=> route('client.destroy', $c->id),
                                       "sms"=> "Vouler-vous supprimer définitivement le client : $c->name?"
                                   ])
                            </td>
                        </tr>

                        @empty

                        @endforelse
                        </tbody>
                    </table>
                @else
                    <div class="error-content text-center">
                        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Données non disponible.</h3>

                        <p>
                            Vous ne disposez pas d'information dans votre tableau.
                            Ajouter un client en cliquant ici <i class="ml-2 mr-2 fas fa-arrow-right"></i> <a href="{{ route('client.create') }}">ajouter une Client</a>.
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