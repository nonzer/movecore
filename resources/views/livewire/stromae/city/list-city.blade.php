@section('title','Liste villes')

<div>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Villes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('city') }}
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
                            <h3 class="card-title font-weight-bold">Liste villes</h3>
                            <a href="{{ route('city.create') }}" class="float-right btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> Ajouter une ville</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(count($cities) > 0)
                                <table id="" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Abbréviation</th>
                                        <th>Pays</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cities as $city)
                                        <tr>
                                            <td></td>
                                            <td>{{ ucfirst($city->name) }}</td>
                                            <td>{{ strtoupper($city->slug) }}</td>
                                            <td>{{ $city->country->slug }}</td>
                                            <td>
                                                <a href="{{ route('city.edit', $city->id) }}" class="btn btn-default"><i class="fas fa-edit"></i> modifier</a>
                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-{{ $city->id }}"><i class="fas fa-trash"></i> Supprimer</a>

                                                <div class="modal fade" id="modal-{{ $city->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Suppression {{ '#'.$city->name }}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oh Oh !</h3>
                                                                @if($city->arrondissements->count() > 0)
                                                                    <p>La ville que vous vous apprêtez à supprimer, contient
                                                                        <br><span class="text-danger font-weight-bold">{{ $city->arrondissements->count() }} arrondissement(s).</span>
                                                                        En acceptant cette suppression, vous admettez supprimer également toutes descendances.
                                                                    </p>
                                                                @endif
                                                                <p class="font-weight-bold">Souhaitez-vous véritablement supprimer cette ville ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fas fa-times"></i> Non</button>
                                                                <button type="button" wire:click="delete({{ $city->id }})" class="btn btn-danger">Oui <i class="fas fa-check"></i></button>
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
                                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Données non disponible.</h3>

                                    <p>
                                        Vous ne disposez pas d'information dans votre tableau.
                                        Pour en ajouter cliquez ici <i class="ml-2 mr-2 fas fa-arrow-right"></i> <a href="{{ route('city.create') }}">ajouter une ville</a>.
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

