@section('title','Modifier personnel')

<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Personnels</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('edit-personal', $id_personal) }}
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
                            <h3 class="card-title">Modifier un personnel</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form wire:submit.prevent="update">
                                <!-- input states -->
                                <div class="form-group">
                                    <label class="col-form-label" for="nom">Nom</label>
                                    <input wire:model.lazy="name" type="text" class="form-control @error('name')is-invalid @enderror" id="nom" placeholder="Entrer nom personnel...">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="tel">Numéro téléhpone</label>
                                    <input wire:model.lazy="tel" type="text" class="form-control @error('tel')is-invalid @enderror" id="tel" placeholder="Entrer un numéro téléphone ...">
                                    @error('tel')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="b_date">Date anniversaire</label>
                                    <input wire:model.lazy="birth_date" type="date" class="form-control @error('birth_date')is-invalid @enderror" id="b_date">
                                    @error('birth_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="role">Rôle</label>
                                    <select wire:model.lazy="role_id" class="form-control @error('role_id')is-invalid @enderror" id="role">
                                        <option value="">Attribuer un rôle au personnel</option>
                                        @forelse($roles as $role)
                                            <option @if($role->id === $personal_role_id) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                                        @empty
                                            <option disabled="disabled">Aucun rôle disponible </option>
                                        @endforelse
                                    </select>
                                    @error('role_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <a href="{{ route('personal.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Retour</a>
                                    <button class="btn btn-primary">Sauvegarder <i wire:loading wire:target="update" class="ml-2 fas fa-spinner fa-spin"></i></button>
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
