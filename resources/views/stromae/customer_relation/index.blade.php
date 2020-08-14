@extends('layouts.master',['customer_relation'=>'active'])


@section('title','Gestion relation client')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Gestion Relation Client</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        {{--                        {{ Breadcrumbs::render('order.index') }}--}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title font-weight-bold">Gestion relation client</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @if($orders->count() >0)
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Client</th>
                            <th>Téléphone</th>
                            <th>Anniverssaire</th>
                            <th>Quartier</th>
                            <th>Type Gaz</th>
                            <th>Date commande</th>
                            <th>Nbr commande</th>
                            <th>Heure commande</th>
                            <th>Heure livraison</th>
                            <th>Delai livraison</th>
                            <th>Date relance</th>
                            <th>Rappel client</th>
                            <th>Observation</th>
                            <th>Statut commande</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($orders as $o)
                            <tr>
                                <td><span class="p-1 badge badge-dark">{{ $o->customer->code }}</span></td>
                                <td class="">{{ civilite($o->customer) }} <strong>{{ $o->customer->name }}</strong><br></td>
                                <td>{{ $o->customer->tel }}</td>
                                <td class="">
                                    <strong>{{ $o->customer->birthday }}</strong>
                                    @if(birthday_status($o->customer->birthday))
                                        <img class="float-right" src="/gift.svg" width="30px">
                                    @endif
                                </td>
                                <td>{{ $o->customer->quarter->name }}</td>
                                <td>{{ $o->gaz->name }}</td>
                                <td>{{ $o->date_order }}</td>
                                <td>{{ $o->quantity }}</td>
                                <td>{{ $o->time_order }}</td>
                                <td>{{ $o->time_deliver }}</td>
                                <td>{{ $o->deliver_delay }}</td>
                                <td>
                                    <span class="badge badge-{{ timing($o->relauch->date_reminder) }}">
{{--
                                        {{ date_relance($o->date_order, $o->customer->category->period) }}
--}}
                                        {{ $o->relauch->date_reminder }}
                                    </span>
                                </td>
                                <td></td>
                                <td>
                                    @if($o->relauch->status)
                                        {{ $o->relauch->observation }}
                                    @else
                                        @livewire('stromae.observation-relance', ['id' => $o->id])
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($o->status_order === "declined")
                                        <i class="fas fa-minus-square text-danger"></i>
                                        <span class="text-danger">Décliné</span>
                                    @elseif($o->status_order === "validated")
                                        <i class="fas fa-check-square text-success"></i>
                                        <span class="text-success">Approuvé</span>
                                    @endif
                                </td>
                            </tr>


                        @endforeach

                        </tbody>
                    </table>
                @else
                    <div class="error-content text-center">
                        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Données non disponible.</h3>

                        <p>
                            Vous ne disposez d'aucune information dans votre tableau.
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