@section('title','Ajout arrondissement')

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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter un arrondissement</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form wire:submit.prevent="store">
                                <!-- input states -->
                                <div class="form-group">
                                    <label class="col-form-label" for="nom">Nom</label>
                                    <input wire:model="name" type="text" class="form-control @error('name')is-invalid @enderror" id="nom" placeholder="Entrer nom arrondissement...">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="slug">Abbréviation</label>
                                    <input wire:model="slug" type="text" class="form-control @error('slug')is-invalid @enderror" id="slug" placeholder="Entrer une abbréviation ...">
                                    @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="city">Ville</label>
                                    <select wire:model="city_id" class="form-control @error('city_id')is-invalid @enderror" id="city">
                                        <option value="">Sélectionner une ville</option>
                                        @forelse($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @empty
                                            <option disabled="disabled">Aucune ville disponible </option>
                                        @endforelse
                                    </select>
                                    @error('city_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary">Sauvegarder <i wire:loading wire:target="store" class="ml-2 fas fa-spinner fa-spin"></i></button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
