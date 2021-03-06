@section('title','Modifier une ville')

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
                        {{ Breadcrumbs::render('edit-city', $id_city) }}
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
                            <h3 class="card-title">Modifier une ville</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form wire:submit.prevent="update">
                                <!-- input states -->
                                <div class="form-group">
                                    <label class="col-form-label" for="nom">Nom</label>
                                    <input wire:model.lazy="name" type="text" class="form-control @error('name')is-invalid @enderror" id="nom" placeholder="Entrer un nom ville...">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="slug">Abbréviation</label>
                                    <input wire:model.lazy="slug" type="text" class="form-control @error('slug')is-invalid @enderror" id="slug" placeholder="Entrer une abbréviation ...">
                                    @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="country">Pays</label>
                                    <select wire:model.lazy="country_id" class="form-control @error('country_id')is-invalid @enderror" id="country">
                                        <option value="">Sélectionner un pays</option>
                                        @forelse($countries as $country)
                                            <option @if($country->id === $city_country_id) selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
                                        @empty
                                            <option disabled="disabled">Aucun pays disponible </option>
                                        @endforelse
                                    </select>
                                    @error('country_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <a href="{{ route('city.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Retour</a>
                                    <button class="btn btn-primary">Modifier <i wire:loading wire:target="store" class="ml-2 fas fa-spinner fa-spin"></i></button>
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
