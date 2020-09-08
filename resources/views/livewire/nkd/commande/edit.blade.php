




<div>
    @section('title','Ajouter une commander')

    <div class="card">
        <div class="card-body">
            <div class="">
                <h3>
                    Modifier la commande de {{ ucfirst($client->name)}}
                </h3>
                <div class="row">
                    <div class="col-4">
                        Code Maison: <span class="text-sm badge badge-warning"> <strong>{{$client->code}}</strong></span><br>
                        GAZ habituel: <span class="text-sm badge badge-dark"> <strong>{{$client->type_gaz}}</strong></span><br>
                    </div>
                    <div class="col-4">
                        Telephone: <span class="text-sm badge badge-dark"><strong>{{$client->tel}}</strong></span><br>
                        Quartier: <span class="text-sm badge badge-dark"> <strong>{{$client->quarter->name}}</strong></span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container mt-5">
        <form wire:submit.prevent="update">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="type_gaz">Type de Gaz</label>

                        <select name="typegaz" wire:model="typegaz" id="" class="form-control">
                            <option >{{$cmd->gaz->name}}</option>
                            @forelse($gaz as $g)
                                <option value="{{$g->id}}">{{$g->name ." - ". $g->weight ."Kg"}}</option>
                            @empty
                                <option> Vide.</option>
                            @endforelse
                        </select>
                        @error('date_order')
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
                                <option value="{{$d->id}}"> Mr {{$d->name}}  <span class="italic">( {{ deliver_man_order_count($d) }} livraisons actuellement</span> )</option>
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


{{--                <div class="col-4">--}}
{{--                    <h3>--}}
{{--                        Montant :<strong class=""> {{$cmdcount}} FCFA</strong>--}}
{{--                    </h3>--}}
{{--                </div>--}}

            </div>

{{--            <div class="row">--}}
{{--                <div class="col-6">--}}
{{--                    <div class="form-group ">--}}
{{--                        <label for="date_order">Date de commande</label>--}}
{{--                        <input type="date" name="date_order" id="" class="form-control" wire:model="date_order" value="{{$date_order}}">--}}

{{--                        @error('date_order')--}}
{{--                            <div class="text-danger">--}}
{{--                                <p>{{$message}}</p>--}}
{{--                            </div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3 col-sm-6">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="time_order">Heure de commande</label>--}}
{{--                        <input type="time" name="time_order" id="" class="form-control" wire:model="time_order" >--}}
{{--                        @error('time_order')--}}
{{--                        <div class="text-danger">--}}
{{--                            <p>{{$message}}</p>--}}
{{--                        </div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3 col-sm-6">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="time_deliver">Heure de livraison</label>--}}
{{--                        <input type="time" name="time_deliver" id="" class="form-control" wire:model="time_deliver" >--}}

{{--                        @error('time_deliver')--}}
{{--                        <div class="text-danger">--}}
{{--                            <p>{{$message}}</p>--}}
{{--                        </div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--            </div>--}}
            <hr>
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-success" type="submit"> <i class="fas fa-plus"></i> Enregistrer</button>
                    <button class="btn btn-dark" type="reset">Reinitialiser</button>
                </div>
            </div>

        </form>
    </div>
</div>
