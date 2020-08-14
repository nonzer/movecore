@section('title','Liste arrondissements')

<div>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Arrondissements</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('arrondissement') }}
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
                            <h3 class="card-title font-weight-bold">Liste arrondissements</h3>
                            <a  class="text-white float-right btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> Ajouter un arrondissement</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if($show)
                                <form class="form-inline" wire:submit.prevent="store">
                                    <div>
                                        <label class="sr-only" for="nom">Nom</label>
                                        <input wire:model.lazy="name" type="text" class="form-control mb-2 mr-sm-2 @error('name')is-invalid @enderror" id="nom" placeholder="Entrer nom arrondissement...">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="sr-only" for="slug">Abbréviation</label>
                                        <input wire:model.lazy="slug" type="text" class="form-control mb-2 mr-sm-2 @error('slug')is-invalid @enderror" id="slug" placeholder="Entrer une abbréviation ...">
                                        @error('slug')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="sr-only" for="ville">Ville</label>
                                        <select wire:model.lazy="city_id" class="form-control mb-2 mr-sm-2 @error('city_id')is-invalid @enderror" id="ville">
                                            <option value="">Sélectionner une ville</option>
                                            @forelse($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @empty
                                                <option disabled="disabled">Aucune ville disponible </option>
                                            @endforelse
                                        </select>

                                        <button class="btn btn-primary mb-2">Ajouter <i wire:loading wire:target="store" class="ml-2 fas fa-spinner fa-spin"></i></button>

                                        @error('city_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </form>
                            @endif

                            @if(count($arrondissements) > 0)
                                <table id="" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Abbréviation</th>
                                        <th>Ville</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($arrondissements as $arrondissement)
                                        <tr>
                                            <td></td>
                                            <td>{{ ucfirst($arrondissement->name) }}</td>
                                            <td>{{ strtoupper($arrondissement->slug) }}</td>
                                            <td>{{ $arrondissement->city->slug }}</td>
                                            <td>
                                                <a href="{{ route('arrondissement.edit', $arrondissement->id) }}" class="btn btn-default"><i class="fas fa-edit"></i> modifier</a>
                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-{{ $arrondissement->id }}"><i class="fas fa-trash"></i> Supprimer</a>

                                                <div class="modal fade" id="modal-{{ $arrondissement->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Suppression {{ $arrondissement->name }}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oh Oh !</h3>
                                                                <p>Souhaitez-vous véritablement supprimer cet arrondissement ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fas fa-times"></i> Non</button>
                                                                <form action="{{ route('arrondissement.destroy', $arrondissement->id) }}" method="post">
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
                                        Pour en ajouter cliquez ici <i class="ml-2 mr-2 fas fa-arrow-right"></i> <a class="text-primary" style="cursor: pointer" wire:click="show_add_form_arrondissement">ajouter un arrondissement</a>.
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

