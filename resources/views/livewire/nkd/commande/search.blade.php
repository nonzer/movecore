






    <div class="">
        <style>
            .linknkd:hover{
                background-color: #2b2b2b;
            }
        </style>

        @section('title','Rechercher un Client')

        {{-- Do your work, then step back. --}}
        <div class="container ">
            <div class="row py-5">
                <div class="mx-auto text-center">
                    <h1 class=""> Code Maison ou Numero de Téléphone</h1>
                    <p>
                        <span class="text-secondary">Cliquez dessous sur <strong>code</strong>/<strong>tel</strong> puis entrer le <strong>code/numéro</strong> et trouver une client pour lui ajouter une commande.</span>
                    </p>

                    <div class="input-group m-1 justify-content-center">
                        <div class="btn-group btn-group-toggle border">
                            <label class="btn btn-sm @if($searchbycode) bg-success @endif ">
                                <input type="radio" name="options" wire:model="searchbycode">code
                            </label>
                            <label class="btn btn-sm @if($searchbytel) bg-success  @endif ">
                                <input type="radio" name="options"  wire:model="searchbytel"> tel
                            </label>
                        </div>
                    </div>
                </div>

                <div class="input-group ">
                    <input type="text" wire:model="value" class="form-control " placeholder="Rechercher un client " autocomplete="off">
                    <span class="input-group-append">
                        <button class="btn btn-success" >
                            <i class="fas fa-search" wire:loading.class="fas fa-spinner fa-spin"></i>
                        </button>
                    </span>
                </div>
                <br>
            </div>

            @if(session()->has('sms') && !empty($value) )
                <div class="row">
                    <div class="col-sm-12">
                        <div class="info-box align-items-center  justify-content-center ">
                            <p>
                                Aucun resultat pour '<strong>{{$value}}</strong>', ajouter un client <i class="fas fa-lg fa-arrow-right"></i>  <a href="{{Route('client.create')}}"> ici</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            @if(!empty($resources))
                <br>
                <span>Les résultats trouvées</span>
                @forelse($resources as $r)
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{route('order.create',$r['id'])}}" class="linknkd text-decoration-none" style="cursor: pointer">
                                <div class="info-box ">
                                    <div class="p-1">
                                        @if($searchbycode)
                                            <h6 class="card-title">{!!  str_replace($value,"<span style='color: #d30f34'>".$value."</span>" ,$r['code']??'' ) !!}</h6>
                                        @elseif($searchbytel)
                                            <h6 class="card-title">{!!  str_replace($value,"<span style='color: #d30f34'>".$value."</span>" ,$r['tel']??'' ) !!}</h6>
                                        @endif
                                        <br>
                                        <span class="text-secondary">{!! $r['type_gaz'] ?? '' !!}</span>
                                        <span class="text-secondary">- {!! $r['name'] ?? '' !!}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty

                @endforelse
            @endif
        </div>
    </div>
