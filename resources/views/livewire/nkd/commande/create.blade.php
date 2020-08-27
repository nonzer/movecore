



@section('title','Ajouter une commander', ['menu_order'=>'menu-open','order'=>'active', 'ordersearch'=>'active'])

<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h3>
                    Ajouter une commande à <strong>{{$client->name}}</strong>.
                </h3>
                <div class="row">
                    <div class="col-6">
                        Code Maison: <span class="text-sm badge badge-warning"> <strong>{{$client->code}}</strong></span><br>
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
                <div class="col-md-12">

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

                <div class="col-md-4">
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

                <div class="col-md-8">
                    <div class="form-group">
                        <label for="type_order">Type de Commande(A/L, L, AAU)</label>

                        <select name="type_order" wire:model="type_order" id="" class="form-control">
                            <option value="L" >Livraison</option>
                            <option value="A/L" >Achat et Livraison</option>
                            <option value="AAU">Achat A l'Unité</option>
                        </select>
                        @error('type_order')
                        <div class="text-danger">
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">

                    <div class="form-group">
                        <label for="type_gaz">Livreur</label>

                        <select name="type_gaz" wire:model="deliver_id" id="" class="form-control">
                            <option >Choisir...</option>
                            @forelse($delivery_man as $d)
                                <option value="{{$d->id}}"> Mr {{$d->name}}</option>
                            @empty
                                <option> Aucun livreur disponible.</option>
                            @endforelse
                        </select>
                        @error('delivery_man')
                            <div class="text-danger">
                                <p>{{$message}}</p>
                            </div>
                        @enderror
                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-12">
                    <h3>Montant total :<strong class=""> {{$cmdcount}} FCFA</strong>
                    </h3>
                </div>
            </div>
            <hr>
            <div class="row mb-5">
                <div class="col-12">
                    <button class="btn btn-success" type="submit"  > <i wire:loading wire:target="save" class="ml-2 fas fa-spinner fa-spin"></i> <i class="fas fa-plus" wire:loading.remove  ></i> Ajouter la commande</button>
                    <button class="btn btn-dark" type="reset">Reinitialiser</button>
                </div>
            </div>

        </form>
    </div>
</div>
