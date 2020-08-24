


<div>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" wire:submit.prevent="">
        <div class="input-group input-group-sm">
            <input  wire:model="value" list="ressources" class="form-control " type="search" placeholder="Entrer un code maison " >

            <datalist id="ressources">
                Votre navigateur ne peut utiliser cette option.
                <select name="val" wire:model="val" >
                    @if(!empty($resp))

                        @foreach($resp as $r)
                            <option value="{!! $r['code'] !!}" >
                                    {!!  $r['name'].' '.$r['tel'] ?? '' !!}
                            </option>
                        @endforeach
                    @else
                        <option> Aucun résultat !</option>
                    @endif
                </select>
            </datalist>

            <div class="input-group-append">
                <button class="btn btn-navbar"  type="submit" wire:click="search">
                    <i class="fas fa-search" wire:target="value" wire:loading.class="fas fa-spinner fa-spin"></i>
                </button>
            </div>
        </div>
    </form>

    <div class="">

    </div>
</div>
