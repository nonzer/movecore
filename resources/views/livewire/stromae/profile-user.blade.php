<div>
    <form wire:submit.prevent="update_profile" class="form-horizontal">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
                <input wire:model.lazy="name" type="text" class="@error('name')is-invalid @enderror form-control" id="name" placeholder="Nom...">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="login" class="col-sm-2 col-form-label">Identifiant</label>
            <div class="col-sm-10">
                <input wire:model.lazy="login" type="text" class="@error('login')is-invalid @enderror form-control" id="login" placeholder="Identifiant...">
                @error('login')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="birth_date" class="col-sm-2 col-form-label">Date anniversaire</label>
            <div class="col-sm-10">
                <input wire:model.lazy="birth_date" type="date" class="@error('birth_date')is-invalid @enderror form-control" id="birth_date" >
                @error('birth_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="tel" class="col-sm-2 col-form-label">Numero téléphone</label>
            <div class="col-sm-10">
                <input wire:model.lazy="tel" class="@error('tel')is-invalid @enderror form-control" type="tel" id="tel" placeholder="+237...">
                @error('tel')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="mdp" class="col-sm-2 col-form-label">Nouveau Mot de passe</label>
            <div class="col-sm-10">
                <input wire:model.lazy="password" type="password" class="@error('password')is-invalid @enderror  form-control" id="mdp" placeholder="Mot de passe...">
            </div>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group float-right">
            <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
        </div>
    </form>
</div>
