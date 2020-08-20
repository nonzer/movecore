@extends('layouts.master', ['delivery_history' => 'active', 'delivery' => 'active'])

@section('title', 'Historique Livraison')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Historique Livraison</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('history') }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title font-weight-bold">Historique livraison</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @if($orders->count() >0)
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Client</th>
                            <th>Quartier</th>
                            <th>Type Gaz</th>
                            <th>Date commande</th>
                            <th>Delai livraison</th>
                            <th>Statut commande</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($orders as $o)
                            <tr>
                                <td class="">{{ civilite($o->customer) }} <strong>{{ $o->customer->name }}</strong><br></td>
                                <td>{{ $o->customer->quarter->name }}</td>
                                <td><small class="font-weight-bold">{{ $o->quantity }}</small> x {{ $o->gaz->name }}</td>
                                <td>{{ $o->date_order }}</td>
                                <td><span class="@if($o->deliver_delay > 30) badge badge-danger @endif">{{ round($o->deliver_delay).' min' }}</span></td>
                                <td class="text-center">
                                    @if($o->status_order === "declined")
                                        <i class="fas fa-minus-square text-danger"></i>
                                        <span class="text-danger">Décliné</span>
                                    @elseif($o->status_order === "validated")
                                        <i class="fas fa-check-square text-success"></i>
                                        <span class="text-success">Livré</span>
                                    @endif
                                </td>
                            </tr>


                        @endforeach

                        </tbody>
                    </table>
                @else
                    <div class="error-content text-center">
                        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oh Oh !</h3>

                        <p>
                            Vous n'avez encore effectué aucune livraison.
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