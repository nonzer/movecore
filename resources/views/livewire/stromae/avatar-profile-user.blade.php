<div>
    <div class="text-center">
        <img class="profile-user-img img-fluid img-circle"
             src="/master/dist/img/user4-128x128.jpg"
             alt="User profile picture">
    </div>

    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

    <p class="text-muted text-center">{{ Auth::user()->role->name }}</p>

    <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
            <b>Identifiant</b> <a class="float-right">{{ Auth::user()->login }}</a>
        </li>
        <li class="list-group-item">
            <b>Numéro téléphone</b> <a class="float-right">{{ '+237 '.Auth::user()->tel }}</a>
        </li>
        <li class="list-group-item">
            <b>Date Anniversaire</b> <a class="float-right">{{ Auth::user()->birth_date }}</a>
        </li>
    </ul>
    <div>
        <label for="photo">Modifier Avatar</label>
        <input wire:model.lazy="avatar" type="file" id="photo"  class="@error('avatar') is-invalid @enderror btn btn-primary mt-3 mb-3 form-control-file border-0">
        @error('avatar') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
</div>
