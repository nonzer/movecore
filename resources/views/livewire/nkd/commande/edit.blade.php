




<div>
    @section('title','Ajouter une commander')

    <div class="card">
        <div class="card-body">
            <div class="">
                <h3>
                    Modifier la commande.
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
                <div class="col-12">
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

            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group ">
                        <label for="date_order">Date de commande</label>
                        <input type="date" name="date_order" id="" class="form-control" wire:model="date_order" value="{{$date_order}}">

                        @error('date_order')
                            <div class="text-danger">
                                <p>{{$message}}</p>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="time_order">Heure de commande</label>
                        <input type="time" name="time_order" id="" class="form-control" wire:model="time_order" value="{{$time_order}}">
                        @error('time_order')
                        <div class="text-danger">
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-4">
                    <h3>
                        Montant :<strong class=""> {{$cmdcount}} FCFA</strong>
                    </h3>
                </div>
            </div>
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
