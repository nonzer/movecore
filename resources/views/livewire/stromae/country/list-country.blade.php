@section('title','Liste pays')

<div>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pays</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('country') }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Liste pays</h3>
                            <a href="{{ route('country.create') }}" class="float-right btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> Ajouter un pays</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(count($countries) > 0)
                                <table id="" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Abbréviation</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($countries as $country)
                                            <tr>
                                                <td></td>
                                                <td>{{ ucfirst($country->name) }}</td>
                                                <td>{{ strtoupper($country->slug) }}</td>
                                                <td>
                                                    <a href="{{ route('country.edit', $country->id) }}" class="btn btn-default"><i class="fas fa-edit"></i> modifier</a>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-{{ $country->id }}"><i class="fas fa-trash"></i> Supprimer</a>

                                                    <div class="modal fade" id="modal-{{ $country->id }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Suppression {{ $country->name }}</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oh Oh !</h3>
                                                                    <p>Souhaitez-vous véritablement supprimer ce pays ?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fas fa-times"></i> Non</button>
                                                                    <form action="{{ route('country.destroy', $country->id) }}" method="post">
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
                                        Pour en ajouter cliquez ici <i class="ml-2 mr-2 fas fa-arrow-right"></i> <a href="{{ route('country.create') }}">ajouter un pays</a>.
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
