@section('title','Liste rôle')

<div>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Privilège</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('country') }}
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
                            <h3 class="card-title font-weight-bold">Liste des rôles</h3>
                            <a href="{{ route('role.create') }}" class="float-right btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> Ajouter un rôle</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(count($roles) > 0)
                                <table id="" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td></td>
                                            <td>{{ ucfirst($role->name) }}</td>
                                            <td>{{ $role->description }}</td>
                                            <td>
                                                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-default"><i class="fas fa-edit"></i> modifier</a>
                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-{{ $role->id }}"><i class="fas fa-trash"></i> Supprimer</a>

                                                <div class="modal fade" id="modal-{{ $role->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Suppression {{ $role->name }}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oh Oh !</h3>
                                                                @if($role->users->count() > 0)
                                                                    <p>Le privilège que vous vous apprêtez à supprimer, est utilisé par exactement
                                                                        <span class="text-danger font-weight-bold">{{ $role->users->count() }} client(s).</span>
                                                                        En acceptant cette suppression, vous admettez supprimer également toutes descendances.
                                                                    </p>
                                                                @endif
                                                                <p>Souhaitez-vous véritablement supprimer ce rôle ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fas fa-times"></i> Non</button>
                                                                <form action="{{ route('role.destroy', $role->id) }}" method="post">
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
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="error-content text-center">
                                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Donnée non disponible.</h3>

                                    <p>
                                        Vous ne disposez pas d'information dans votre tableau.
                                        Pour en ajouter cliquez ici <i class="ml-2 mr-2 fas fa-arrow-right"></i> <a href="{{ route('role.create') }}">ajouter un rôle</a>.
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
