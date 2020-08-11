@extends('layouts.master',['category'=>'active','client'=>'active', 'menu_client'=>'menu-open'])


@section('title','Categorie de Client')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Categories de Clients</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        {{ Breadcrumbs::render('category.index') }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">

        <div class="card">
            <div class="card-header">
{{--                <h3 class="card-title font-weight-bold">Liste des Categorie de client</h3>--}}
                <a href="{{route('category.create')}}" class="float-right btn btn-primary btn-sm ml-1"><i class="fas fa-plus-circle mr-1"></i>Ajouter une Categorie</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @if(session()->get('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Succès !</h5>
                        Réussite de l'enregistrement
                    </div>
                @endif

                @if($category->count() >0)
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Périod</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($category as $c)
                            <tr>
                                <td><strong>{{$c->name}}</strong></td>
                                <td>{{$c->period}}</td>
                                <td>{{$c->description}}</td>
                                <td>
                                    <a class="btn btn-primary btn-xs" href="{{route('category.edit', $c->id)}}"><i class="fas fa-user-edit"></i></a>
                                    <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#modal-{{ $c->id }}"><i class="fas fa-trash"></i></a>
                                    @include('layouts.partials.delete_modal',
                                   [
                                       'id'=> $c->id,
                                       'name'=> 'Categorie de Client',
                                       "route"=> route('category.destroy', $c->id),
                                       "sms"=> "Vouler-vous supprimer définitivement categorie de client ?"
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
                            Vous ne disposez pas d'information dans votre tableau.
                            Ajouter une categorie en cliquant ici <i class="ml-2 mr-2 fas fa-arrow-right"></i> <a href="{{ route('category.create') }}">ajouter une Categorie</a>.
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