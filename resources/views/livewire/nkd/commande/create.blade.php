



@section('title','Ajouter une commander', ['menu_order'=>'menu-open','order'=>'active', 'ordersearch'=>'active'])

<div>

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h3>
                    Ajouter une commande à <strong>{{$client->name}}</strong>.
                </h3>
                <div class="row">
                    <div class="col-6">
                        Code Maison: <span class="text-sm badge badge-dark"> <strong>{{$client->code}}</strong></span><br>
                        GAZ habituel: <span class="text-sm badge badge-dark"> <strong>{{$client->type_gaz}}</strong></span><br>
                    </div>
                    <div class="col-6">
                        Telephone: <span class="text-sm badge badge-dark"><strong>{{$client->tel}}</strong></span><br>
                        Quartier: <span class="text-sm badge badge-dark"> <strong>{{$client->quarter->name}}</strong></span><br>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container mt-5">
        <form wire:submit.prevent="save">
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="type_gaz">Type de Gaz</label>

                        <select name="type_gaz" wire:model="typegaz" id="" class="form-control">
                            <option >Choisir...</option>
                            @forelse($gaz as $g)
                                <option value="{{$g->id}}">{{$g->name ." - ". $g->weight ."Kg"}}</option>
                            @empty
                                <option> Vide.</option>
                            @endforelse
                        </select>
                        @error('typegaz')
                        <div class="text-danger">
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="col-md-2">
                    <div class="form-group ">
                        <label for="date_order">Quantite de bouteille </label>
                        <input type="number" name="quantity" id="" class="form-control" wire:model="quantity">
                        @error('quantity')
                        <div class="text-danger">
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="type_order">Type de Commande(L; AAU)</label>

                        <select name="type_order" wire:model="type_order" id="" class="form-control">
                            <option value="L" >Livraison</option>
                            <option value="AAU">Achat A l'Unité</option>
                        </select>
                        @error('type_order')
                        <div class="text-danger">
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status_order">Status de la Livraison</label>
                        <select name="status_order" wire:model="status_order" id="" class="form-control @if($status_order ==='validate') is-valid @else is-warning @endif">
                            <option value="passed">Commande passée</option>
                            <option value="in pending">En cours de livraison</option>
                            <option value="validated">Livré</option>
                            <option value="declined">Commande Annulé</option>
                        </select>
                        @error('status_order')
                        <div class="text-danger">
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group ">
                        <label for="date_order">Date de commande</label>
                        <input type="date" name="date_order" id="" class="form-control" wire:model="date_order">

                        @error('date_order')
                        <div class="text-danger">
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>

                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="time_order">Heure de commande</label>
                        <input type="time" name="time_order" id="" class="form-control" wire:model="time_order">

                        @error('time_order')
                        <div class="text-danger">
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="time_deliver">Heure de livraison</label>
                        <input type="time" name="time_deliver" id="" class="form-control" wire:model="time_deliver">

                        @error('time_deliver')
                        <div class="text-danger">
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-4">
                    <h3>Montant :<strong class=""> {{$cmdcount}} FCFA</strong>
                    </h3>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-success" type="submit"> <i class="fas fa-plus"></i> Ajouter la commande</button>
                    <button class="btn btn-dark" type="reset">Reinitialiser</button>
                </div>
            </div>

        </form>
    </div>
</div>
