<div>
    <div class="text-center">
        <img class="profile-user-img img-fluid img-circle"
             src="{{ !empty(Auth::user()->avatar) ? asset('storage') . '/images/avatars/' .Auth::user()->avatar : '/master/dist/img/avatar4.png' }}"
             alt="{{ Auth::user()->name }} profile picture">
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

    <form wire:submit.prevent="update_avatar_user">
        <label for="photo">Modifier Avatar</label>
        <div class="row">
            {{--<div class="col-md-3">
                @if ($avatar)
                    <img class="shadow-sm img-fluid img-circle" src="{{ $avatar->temporaryUrl() }}" width="100">
                @endif
            </div>--}}
            <div class="col-md-6">
                <input wire:model="avatar" type="file" id="photo"  class="@error('avatar') is-invalid @enderror mt-3 mb-3 form-control-file border-0">
                @error('avatar') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-dark">Valider</button>
            </div>
            <div class="col-md-12">
                <div wire:loading wire:target="avatar" class="text-blue">Téléchargement image <i class="ml-2 fas fa-spinner fa-spin"></i></div>
            </div>
        </div>
    </form>
</div>
