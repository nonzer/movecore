


@section('title','Charger un fichier Excel')

<div>
    {{-- The Master doesn't talk, he acts. --}}

    <div class="container p-4">
        <div class="card card-success">
            <div class="card-header">
                <div class="card-title">
                    <i class="fas fa-file-excel">

                    </i>
                    Enregistrer un fichier excel
                </div>
            </div>
            <div class="card-body ">
                <form class="" enctype="multipart/form-data" wire:submit.prevent="save">
                    <div class="form-group " >
                        <label for="type_importation"> Type d'importation Excel</label>
                        <select name="type" wire:model="type_importation" id="" class="form-control ">
                            <option value="">Choirir un type ...</option>
                            <option value="client">Importation des Clients</option>
                            <option value="order">Importation des Commandes</option>
                            <option value="quater">Importation des Quartiers</option>
                        </select>

                        <br>
                        <label for="type_importation"> Type d'importation Excel
                            <input type="file" wire:model="file_excel" name="file" id="" class="col-md-12 form-control @error('file_excel') is-invalid  @enderror " placeholder="entrer un fichier excel" accept=".xls, .xlsx">
                        </label>
                        @error('file_excel')
                            <span class="text-danger">{{$message}}</span>
                            <br>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary mt-3 col-md-6"><i wire:loading wire:target="save" class="ml-2 fas fa-spinner fa-spin"></i>  Charger</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
