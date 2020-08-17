@section('title','Liste du personnel')

<div>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Personnels</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('personal') }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">
        <div class="container-fluid">
            <div class="card card-solid">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Liste du personnel</h3>
                            <a href="{{ route('personal.create') }}" class="float-right btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> Ajouter un personnel</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(count($personals) > 0)
                                <div class="row d-flex align-items-stretch">
                                    @foreach($personals as $personal)
                                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                            <div class="card bg-light">
                                                <div class="card-header text-muted border-bottom-0">
                                                    {{ $personal->role->name }}
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <h2 class="lead"><b>{{ ucfirst($personal->name) }}</b></h2>
                                                            <p class="text-muted text-sm"><b>Identifiant : {{ $personal->login }}</b> </p>
                                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Anniversaire :
                                                                    <br>{{ $personal->birth_date }}</li>
                                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Téléphone :
                                                                    <br>+237 {{ $personal->tel }}</li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-5 text-center">
                                                            <img src="{{ !empty($personal->avatar) ? $personal->avatar : '/master/dist/img/user1-128x128.jpg' }}" alt="user-avatar" class="img-circle img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="text-right">
                                                        <a href="{{ route('personal.edit', $personal->id) }}" class="btn btn-sm bg-teal">
                                                            <i class="fas fa-edit"></i> Modifier
                                                        </a>
                                                        <a href="#" data-toggle="modal" data-target="#modal-{{ $personal->id }}" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i> Supprimer
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modal-{{ $personal->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Suppression {{ $personal->name }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oh Oh !</h3>
                                                        <p>Etes certain de vouloir supprimer ce personnel ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fas fa-times"></i> Non</button>
                                                        <form action="{{ route('personal.destroy', $personal->id) }}" method="post">
                                                            @method('DELETE')

                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Oui <i class="fas fa-check"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    @endforeach
                                </div>
                            @else
                                <div class="error-content text-center">
                                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Donnée non disponible.</h3>

                                    <p>
                                        Vous ne disposez pas d'information dans votre tableau.
                                        Pour en ajouter cliquez ici <i class="ml-2 mr-2 fas fa-arrow-right"></i> <a href="{{ route('personal.create') }}">ajouter un personnel</a>.
                                    </p>
                                </div>
                            @endif
                        </div>
        </div>
        </div>
    </section>
</div>
