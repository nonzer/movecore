@section('title','Ajout marque de gaz')

<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Gaz</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('add-gaz') }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter une marque de gaz</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form wire:submit.prevent="store">
                                <!-- input states -->
                                <div class="form-group">
                                    <label class="col-form-label" for="nom">Nom</label>
                                    <input wire:model.lazy="name" type="text" class="form-control @error('name')is-invalid @enderror" id="nom" placeholder="Entrer nom marque...">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="weight">Poids</label>
                                    <input wire:model.lazy="weight" type="text" class="form-control @error('weight')is-invalid @enderror" id="weight" placeholder="Entrer un poids ...">
                                    @error('weight')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-4 form-group">
                                        <label class="col-form-label" for="price_buy">Prix d'achât</label>
                                        <input wire:model.lazy="price_buy" type="text" class="form-control @error('price_buy')is-invalid @enderror" id="price_buy" placeholder="Entrer prix d'achât...">
                                        @error('price_buy')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-4 form-group">
                                        <label class="col-form-label" for="price">Prix de vente</label>
                                        <input wire:model.lazy="price" type="text" class="form-control @error('price')is-invalid @enderror" id="price" placeholder="Entrer prix de vente...">
                                        @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-4 form-group">
                                        <label class="col-form-label" for="qty_stock">Quantité stock</label>
                                        <input wire:model.lazy="qty_stock" type="text" class="form-control @error('qty_stock')is-invalid @enderror" id="price" placeholder="Entrer la quantité stock...">
                                        @error('qty_stock')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary">Sauvegarder <i wire:loading wire:target="store" class="ml-2 fas fa-spinner fa-spin"></i></button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
