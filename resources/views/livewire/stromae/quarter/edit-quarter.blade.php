@section('title','Modifier quartier')

<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Quartiers</h1>
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
                            <h3 class="card-title">Modifier un quartier</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form wire:submit.prevent="update">
                                <!-- input states -->
                                <div class="form-group">
                                    <label class="col-form-label" for="nom">Nom</label>
                                    <input wire:model="name" type="text" class="form-control @error('name')is-invalid @enderror" id="nom" placeholder="Entrer nom quartier...">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="arrondissement">Arrondissement</label>
                                    <select wire:model="arrondissement_id" class="form-control @error('arrondissement_id')is-invalid @enderror" id="arrondissement">
                                        <option value="">Sélectionner un arrondissement</option>
                                        @forelse($arrondissements as $arrondissement)
                                            <option @if($arrondissement->id === $quarter_arrondissement_id) selected @endif value="{{ $arrondissement->id }}">{{ $arrondissement->name }}</option>
                                        @empty
                                            <option disabled="disabled">Aucun arrondissement disponible </option>
                                        @endforelse
                                    </select>
                                    @error('arrondissement_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <a href="{{ route('quarter.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Retour</a>
                                    <button class="btn btn-primary">Modifier <i wire:loading wire:target="update" class="ml-2 fas fa-spinner fa-spin"></i></button>
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
