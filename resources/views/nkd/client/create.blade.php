@extends('layouts.master',['sample'=>'active'])


@section('title','Sample')

@section('content')


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


    <section class="content">


        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-user-plus"></i> </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">


                    <div class="row ">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom et Prenom</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nom complet">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="gaz">Gaz</label>
                                <select name="gaz" id="" class="form-control">
                                    <option value="sctm">SCTM</option>
                                    <option value="camgaz">CamGaz</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-6">
                            <label for="datenaiss">Date de Naissance</label>
                            <input type="date" class="form-control" name="datenaiss" placeholder="">
                        </div>

                        <div class="col-6 ">
                            <label for="sex">Sexe</label>
                                <!-- radio -->
                            <div class="row ml-1">
                                <div class="form-check col-md-3">
                                    <input class="form-check-input" type="radio" id="woman" name="sex" checked>
                                    <label class="form-check-label" for="woman">Mme</label>
                                </div>
                                <div class="form-check col-md-3">
                                    <input class="form-check-input" type="radio" id="man" name="sex" >
                                    <label class="form-check-label" for="man">Mr</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-8 col-xl-12">
                            <div class="form-group">
                                <label for="tel"> <i class="fas fa-phone-square-alt"></i> Telephone</label>
                                <input type="tel" class="form-control" id="tel" placeholder="+237 ...">
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label>Ville</label>
                                <select class="form-control select2bs4" name="quater" style="width: 100%;">
                                    <option selected="selected">Foumban</option>
                                    <option >Douala</option>
                                    <option >bertoi</option>
                                    <option>Edea</option>
                                    <option>Nkong</option>
                                    <option>Garoua</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label>Quartier</label>
                                <select class="form-control select2bs4" name="quater" style="width: 100%;">
                                    <option selected="selected">Sadi</option>
                                    <option >Kotti</option>
                                    <option >Beri</option>
                                    <option>Deido</option>
                                    <option>Tennessee</option>
                                    <option>Coaf</option>
                                    <option>Washington</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label for="sector">Secteur</label>
                                <input type="sector" class="form-control" id="sector" placeholder="Secteur du quartier">
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-8">
                            <div class="form-group">
                                <label for="reperte">Repere</label>
                                <input type="text" class="form-control" id="reperte" name="reperte" placeholder="Reperte dans le quartier">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="reperepart">Repere Particulier</label>
                                <textarea name="reperepart" id="reperepart" cols="30" rows="4" placeholder="Donner plus d'indications sur la localisation" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-success "><i class="fas fa-plus"></i> Enregistrer </button>
                    <button type="reset" class="btn btn-secondary "><i class="fas fa-recycle"></i> Reinitialiser </button>
                </div>
            </form>

        </div>
        <!-- /.card -->

    </section>

@endsection

@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="./master/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="./master/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush

@push('js')

    <!-- Select2 -->
    <script src="./master/plugins/select2/js/select2.full.min.js"></script>
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