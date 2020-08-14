@section('title','Liste marque gaz')

<div>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Gaz</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('gaz') }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Liste marques de gaz</h3>
                            <a href="{{ route('gaz.create') }}" class="float-right btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> Ajouter une marque de gaz</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(count($all_gaz) > 0)
                                <table id="example1" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prix d'achât <small>(FCFA)</small></th>
                                        <th>Prix vente <small>(FCFA)</small></th>
                                        <th>Quantité stock</th>
                                        <th>Poids</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($all_gaz as $gaz)
                                        <tr>
                                            <td>{{ ucfirst($gaz->name) }}</td>
                                            <td>{{ number_format($gaz->price,  ($gaz->price == 0) ? 2 : 0, '.', ' ') }}</td>
                                            <td>{{ number_format($gaz->price_buy, ($gaz->price_buy == 0) ? 2 : 0, '.', ' ') }}</td>
                                            <td>
                                                @if($visible && ($id_gaz === $gaz->id))
                                                    <form wire:submit.prevent="update_qty" class="form-inline">
                                                        <input class="form-control p-l-1 w-75 my-1 mr-sm-2" id="qty" wire:model="qty_stock">
                                                        <button class="btn btn-primary btn-sm">mettre à jour</button>
                                                    </form>
                                                @else
                                                    {{ number_format($gaz->qty_stock, ($gaz->qty_stock == 0) ? 1 : 0, '.', ' ') }}
                                                    <span wire:click="showInput({{ $gaz->id }}, {{ $gaz->qty_stock }})" style="cursor: pointer" class="float-right text-primary">editer <i class="fas fa-edit"></i></span></td>
                                                @endif
                                            <td>{{ number_format($gaz->weight, 1).' Kg' }}</td>
                                            <td>
                                                <a href="{{ route('gaz.edit', $gaz->id) }}" class="btn btn-default"><i class="fas fa-edit"></i> modifier</a>
                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-{{ $gaz->id }}"><i class="fas fa-trash"></i> Supprimer</a>

                                                <div class="modal fade" id="modal-{{ $gaz->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Suppression {{ $gaz->name }}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oh Oh !</h3>
                                                                <p>Souhaitez-vous véritablement supprimer ce gaz ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fas fa-times"></i> Non</button>
                                                                <form action="{{ route('gaz.destroy', $gaz->id) }}" method="post">
                                                                    @method('DELETE')

                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger">Oui <i class="fas fa-check"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="error-content text-center">
                                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Donnée non disponible.</h3>

                                    <p>
                                        Vous ne disposez pas d'information dans votre tableau.
                                        Pour en ajouter cliquez ici <i class="ml-2 mr-2 fas fa-arrow-right"></i> <a href="{{ route('gaz.create') }}">ajouter un gaz</a>.
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


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
                "ordering": false
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