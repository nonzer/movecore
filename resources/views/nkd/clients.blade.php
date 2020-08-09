@extends('layouts.master',['client'=>'active'])


@section('title','Clients')

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Gestion des Clients</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        {{ Breadcrumbs::render('client') }}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Actions</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">


                <a class="btn btn-primary btn-sm" href="{{route('client.create')}}">Ajouter un client</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Liste des cLients</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-responsive">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Nom</th>
                        <th>Gaz</th>
                        <th>Sexe</th>
                        <th>Tel</th>
                        <th>Secteur</th>
                        <th>Quartier</th>
                        <th>Repère </th>
                        <th>Repère part</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>


                    <tr class="">
                        <form action="" method="POST">
                            <td>
                                <input type="number" name="code" id="" placeholder="Entrer un code">
                            </td>
                            <td>
                                <input type="text" name="code" id="" placeholder="Entrer un code">
                            </td>
                            <td>
                                <select name="gaz" id="">
                                    <option value="sctm">SCTM</option>
                                    <option value="Camgaz">CAMGAZ</option>
                                </select>
                            </td>
                            <td>
                                <select name="sex" id="">
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="code" id="" placeholder="Entrer un code">
                            </td>
                            <td>
                                <input type="text" name="code" id="" placeholder="Entrer un code">
                            </td>
                            <td>
                                <input type="text" name="code" id="" placeholder="Entrer un code">
                            </td>
                            <td>
                                <input type="text" name="code" id="" placeholder="Entrer un code">
                            </td>
                            <td>
                                <input type="text" name="code" id="" placeholder="Entrer un code">
                            </td>
                            <td>
                                <button class="btn btn-success btn-xs" type="submit"><i class="fas fa-check"></i> save</button>
                            </td>

                        </form>

                    </tr>
                    <tr>
                        <td>#DOU122</td>
                        <td>NKONDO kong</td>
                        <td>SCTM</td>
                        <td>M</td>
                        <td>6 55 32 18 29</td>
                        <td>Internet Lorem ipsum dolor sit amet? Asperiores</td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                        <td>
                            <button class="btn btn-primary btn-xs"><i class="fas fa-user-edit"></i></button>
                            <button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>#DOU122</td>
                        <td>MBIANG </td>
                        <td>SCTM</td>
                        <td>M</td>
                        <td>6 55 32 18 29</td>
                        <td>Internet, consectetur adipisicing elit. Dicta est magnam quasi? Asperiores</td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                        <td>
                            <button class="btn btn-primary btn-xs"><i class="fas fa-user-edit"></i></button>
                            <button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>#DOU122</td>
                        <td> MOL</td>
                        <td>SCTM</td>
                        <td>F</td>
                        <td>6 55 32 18 29</td>
                        <td>Internet Lorem ipsum dolor sit amet, uasi? Asperiores</td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                        <td>
                            <button class="btn btn-primary btn-xs"><i class="fas fa-user-edit"></i></button>
                            <button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>#DOU122</td>
                        <td>FONO kong</td>
                        <td>SCTM</td>
                        <td>M</td>
                        <td>6 55 32 18 29</td>
                        <td>Internet Lorem ipsum dolor sit amet, Asperiores</td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                        <td>
                            <button class="btn btn-primary btn-xs"><i class="fas fa-user-edit"></i></button>
                            <button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>#DOU122</td>
                        <td>NKONDO kong</td>
                        <td>SCTM</td>
                        <td>M</td>
                        <td>6 55 32 18 29</td>
                        <td>Internet Lorem ipsum dolor sit amet, Asperiores</td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                        <td>
                            <button class="btn btn-primary btn-xs"><i class="fas fa-user-edit"></i></button>
                            <button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>#DOU122</td>
                        <td>Mono kong</td>
                        <td>SCTM</td>
                        <td>F</td>
                        <td>6 55 32 18 29</td>
                        <td>Internet Lorem ipsum dolor sit </td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                        <td>
                            <button class="btn btn-primary btn-xs"><i class="fas fa-user-edit"></i></button>
                            <button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>#DOU122</td>
                        <td>Dongo kong</td>
                        <td>SCTM</td>
                        <td>M</td>
                        <td>6 55 32 18 29</td>
                        <td>Internet Lorem adipisicing elit. Dicta est magnam quasi? Asperiores</td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                        <td>
                            <button class="btn btn-primary btn-xs"><i class="fas fa-user-edit"></i></button>
                            <button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>


                    <tr>
                        <td>#DOU122</td>
                        <td>ELENE kong</td>
                        <td>SCTM</td>
                        <td>M</td>
                        <td>6 55 32 18 29</td>
                        <td>Internet LoremAsperiores</td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                        <td>
                            <button class="btn btn-primary btn-xs"><i class="fas fa-user-edit"></i></button>
                            <button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>


                    <tr>
                        <td>#DOU122</td>
                        <td>Bijeck </td>
                        <td>SCTM</td>
                        <td>F</td>
                        <td>6 55 32 18 29</td>
                        <td>Internet Lorem ipsum dolor est magnam quasi? Asperiores</td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                        <td>
                            <button class="btn btn-primary btn-xs"><i class="fas fa-user-edit"></i></button>
                            <button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>


                    </tbody>
{{--                    <tfoot>--}}
{{--                    <tr>--}}
{{--                        <th>Code</th>--}}
{{--                        <th>Nom</th>--}}
{{--                        <th>Gaz</th>--}}
{{--                        <th>Sexe</th>--}}
{{--                        <th>Tel</th>--}}
{{--                        <th>Secteur</th>--}}
{{--                        <th>Quartier</th>--}}
{{--                        <th>Repère </th>--}}
{{--                        <th>Repère part</th>--}}
{{--                        <th>Action</th>--}}

{{--                    </tr>--}}
{{--                    </tfoot>--}}
                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </section>

@endsection

@push('css')
    <link rel="stylesheet" href="./master/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./master/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush

@push('js')
    <!-- DataTables -->
    <script src="./master/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="./master/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="./master/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="./master/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": false,
                "autoWidth": true,

            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush