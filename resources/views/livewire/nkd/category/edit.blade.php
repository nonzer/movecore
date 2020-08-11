



@section('title','Editer une Categorie',['client'=>'active'])

<div class="container-fluid ">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Editer une Catégorie de Client</h1>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('category.edit',$cat) }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content m-3">

        <!-- general form elements -->
        <div class="card ">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form wire:submit.prevent="update">
                <div class="card-body">

                    @if(session()->get('error'))

                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Echec !</h5>
                            Echec lors de l'enregistrement, une erreur est survenue.
                        </div>

                    @endif

                    <div class="row ">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom de la Catégorie</label>
                                <input type="text" wire:model.lazy="name"  class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="...1mois" value="{{old('name') ?? $cat->name}}">
                                @error('name')
                                <div class="">
                                    <p class="text-sm text-danger">{{$message}}</p>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="period">Période</label>
                            <span class="text-sm">L'évaluation de la periode est en terme de mois.</span>
                            <input type="number" wire:model.lazy="period" class="form-control  @error('period') is-invalid @enderror" name="period" placeholder="" value="{{old('period') ?? $cat->period}}">
                            @error('period')
                            <div class="">
                                <p class="text-sm text-danger">{{$message}}</p>
                            </div>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <input type="text" wire:model.lazy="description"  class="form-control @error('description') is-invalid @enderror" id="exampleInputEmail1" placeholder="description..." value="{{old('description')??$cat->description}}">
                                @error('description')
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
                    <button type="submit" class="btn btn-primary ">
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
    {{--        <link rel="stylesheet" href="/master/plugins/select2/css/select2.min.css">--}}
    {{--        <link rel="stylesheet" href="/master/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">--}}
@endpush

@push('js')
    <!-- Select2 -->
        {{--        <script src="/master/plugins/select2/js/select2.full.min.js"></script>--}}
        {{--        <script>--}}
        {{--            $(function () {--}}
        {{--                //Initialize Select2 Elements--}}
        {{--                $('.select2').select2()--}}

        {{--                //Initialize Select2 Elements--}}
        {{--                $('.select2bs4').select2({--}}
        {{--                    theme: 'bootstrap4'--}}
        {{--                })--}}
        {{--            })--}}
        {{--        </script>--}}
    @endpush

</div>


