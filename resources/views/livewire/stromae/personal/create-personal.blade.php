@section('title','Ajout personnel')

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
                            <h3 class="card-title">Ajouter un personnel</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form wire:submit.prevent="store">
                                <!-- input states -->
                                <div class="form-group">
                                    <label class="col-form-label" for="nom">Nom</label>
                                    <input wire:model="name" type="text" class="form-control @error('name')is-invalid @enderror" id="nom" placeholder="Entrer nom personnel...">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="tel">Numéro téléhpone</label>
                                    <input wire:model="tel" type="text" class="form-control @error('tel')is-invalid @enderror" id="tel" placeholder="Entrer un numéro téléphone ...">
                                    @error('tel')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="b_date">Date anniversaire</label>
                                    <input wire:model="birth_date" type="date" class="form-control @error('birth_date')is-invalid @enderror" id="b_date">
                                    @error('birth_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="role">Rôle</label>
                                    <select wire:model="role_id" class="form-control @error('role_id')is-invalid @enderror" id="role">
                                        <option value="">Attribuer un rôle au personnel</option>
                                        @forelse($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
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
                                    <label class="col-form-label" for="login">Identifiant</label>
                                    <input wire:model="login" type="text" class="form-control @error('login')is-invalid @enderror" id="login" placeholder="Entrer l'identifiant de connexion...">
                                    @error('login')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="mdp">Mot de passe <span class="h4 font-weight-bold ml-5">{{ $password }}</span></label>
                                    <div class="row ml-1">
                                        <input wire:model="password" type="password" class="col-9 form-control @error('password')is-invalid @enderror" id="mdp" placeholder="Entrer mot de passe...">
                                        <a wire:click="password_key" class="btn btn-default col-2 ml-1">Générer un mot de passe</a>
                                    </div>

                                    @error('password')
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
