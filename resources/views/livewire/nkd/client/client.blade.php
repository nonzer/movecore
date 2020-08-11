



@section('title','Ajouter un Client',['client'=>'active'])

<div class="container-fluid ">

    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Ajouter un Client</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{ Breadcrumbs::render('client_create') }}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content m-3">

            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"> <i class="fas fa-user-plus"></i> </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form wire:submit.prevent="save">
                    <div class="card-body">

                        <div class="row ">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nom et Prenom</label>
                                    <input type="text" wire:model.lazy="name"  class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nom complet" value="{{old('name')}}">
                                    @error('name')
                                        <div class="">
                                            <p class="text-sm text-danger">{{$message}}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-4">
                                <div class="form-group">
                                    <label for="type_gaz">Gaz</label>

                                    <select name="type_gaz" id="" wire:model.lazy="type_gaz" class="form-control">
                                        <option>Choisir...</option>
                                        @forelse($list_gaz as $t)
                                            <option value="{{$t->name}}">{{$t->name ." - ". $t->weight}} Kg</option>
                                        @empty
                                            <option class="text-secondary">Aucun type de Gaz disponible</option>
                                        @endforelse
                                    </select>

                                    @error('type_gaz')
                                    <div class="">
                                        <p class="text-sm text-danger">{{$message}}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-6">
                                <label for="datenaiss">Date de Naissance</label>
                                <input type="date" wire:model.lazy="birthday" class="form-control  @error('birthday') is-invalid @enderror" name="datenaiss" placeholder="" value="{{old('birthday')}}">
                                @error('birthday')
                                <div class="">
                                    <p class="text-sm text-danger">{{$message}}</p>
                                </div>
                                @enderror
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label>Categorie du client</label>
                                    <select class="form-control  @error('category') is-invalid @enderror" name="category" style="width: 100%;" wire:model.lazy="category">
                                        <option >choisir...</option>

                                        @forelse($type_client as $t)
                                            <option value="{{$t->id}}">{{$t->name}}</option>
                                        @empty
                                            <option class="text-secondary">Vide !</option>
                                        @endforelse
                                    </select>
                                    @error('category')
                                    <div class="">
                                        <p class="text-sm text-danger">{{$message}}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-3">
                                <label for="">Sexe</label>
                                <!-- radio -->
                                <div class="row ml-1">
                                    <div class="form-check col-md-3">
                                        <input class="form-check-input" type="radio" id="woman" name="sex"  wire:model.lazy="sexf">
                                        <label class="form-check-label" for="woman">Mme</label>
                                    </div>
                                    <div class="form-check col-md-3">
                                        <input class="form-check-input" type="radio" id="man" name="sex" wire:model.lazy="sexm">
                                        <label class="form-check-label" for="man">Mr</label>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row">

                            <div class="col-md-8 col-xl-8">
                                <div class="form-group">
                                    <label for="tel">Téléphone</label>
                                    <input type="number" class="form-control  @error('tel') is-invalid @enderror" id="tel" placeholder="+237 ..." wire:model.lazy="tel">
                                    @error('tel')
                                    <div class="">
                                        <p class="text-sm text-danger">{{$message}}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-12 col-lg-4">
                                <div class="form-group">
                                    <label>Ville</label>
                                    <select class="form-control  @error('city') is-invalid @enderror" name="city" style="width: 100%;" wire:model.lazy="city">
                                        <option >choisir...</option>

                                        @forelse($list_cities as $l)
                                            <option value="{{$l->id}}">{{$l->name}}</option>
                                        @empty
                                            <option class="text-secondary">Aucune Ville disponible</option>
                                        @endforelse
                                    </select>
                                    @error('city')
                                    <div class="">
                                        <p class="text-sm text-danger">{{$message}}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-lg-4">
                                <div class="form-group">
                                    <label>Arrondissement</label>
                                    <select class="form-control @error('arrond') is-invalid @enderror" name="city" style="width: 100%;" wire:model.lazy="arrond">
                                        <option >choisir...</option>

                                        @forelse($list_arrond as $l)
                                            <option value="{{$l->id}}">{{$l->name}}</option>
                                        @empty
                                            <option class="text-secondary">Aucun arrondissement disponible</option>
                                        @endforelse
                                    </select>
                                    @error('arrond')
                                    <div class="">
                                        <p class="text-sm text-danger">{{$message}}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-lg-4">
                                <div class="form-group">
                                    <label>Quartier</label>
                                    <select class="form-control  @error('quater_id') is-invalid @enderror" name="quater" style="width: 100%;" wire:model.lazy="quater_id">
                                        <option >choisir...</option>
                                        @forelse($list_quater as $l)
                                            <option value="{{$l->id}}">{{$l->name}}</option>
                                        @empty
                                            <option class="text-secondary">Aucun Quartier disponible</option>
                                        @endforelse

                                    </select>
                                    @error('quater_id')
                                    <div class="">
                                        <p class="text-sm text-danger">{{$message}}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="sector">Secteur</label>
                                    <input type="text" class="form-control  @error('sector') is-invalid @enderror" name="sector" id="sector" placeholder="Secteur du quartier" wire:model.lazy="sector" value="{{old('sector')}}">
                                    @error('sector')
                                    <div class="">
                                        <p class="text-sm text-danger">{{$message}}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-8">
                                <div class="form-group">
                                    <label for="reperte">Repere</label>
                                    <input type="text" class="form-control  @error('landmark') is-invalid @enderror" id="reperte" name="reperte" placeholder="Reperte dans le quartier" wire:model.lazy="landmark">
                                    @error('landmark')
                                    <div class="">
                                        <p class="text-sm text-danger">{{$message}}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="reperepart">Repere Particulier</label>
                                    <textarea name="reperepart" id="reperepart" cols="30" rows="4" placeholder="Donner plus d'indications sur la localisation" class="form-control  @error('particular_landmark') is-invalid @enderror"  wire:model.lazy="particular_landmark"></textarea>
                                    @error('particular_landmark')
                                    <div class="">
                                        <p class="text-sm text-danger">{{$message}}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">CODE Maison</label>
                                    <input type="text" wire:model.lazy="code"  class="form-control @error('code') is-invalid @else is-warning @enderror" id="exampleInputEmail1" placeholder="Code" value="{{old('code')}}">
                                    @error('code')
                                    <div class="">
                                        <p class="text-sm text-danger">{{$message}}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success ">
                            <i class="fas fa-spinner fa-spin" wire:loading wire:target="name"></i>
                            <i class="fas fa-plus" wire:loading.remove wire:target="name"></i>
                            Enregistrer
                        </button>
                        <button type="reset" class="btn btn-secondary "><i class="fas fa-recycle"></i> Reinitialiser </button>
                    </div>
                </form>

            </div>
            <!-- /.card -->

        </section>

@push('css')
    <!-- Select2 -->
        <link rel="stylesheet" href="/master/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="/master/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush

@push('js')
    <!-- Select2 -->
        <script src="/master/plugins/select2/js/select2.full.min.js"></script>
        <script>
            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })
            })
        </script>
@endpush



</div>


