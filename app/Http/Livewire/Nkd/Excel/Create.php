<?php

namespace App\Http\Livewire\Nkd\Excel;

use App\Imports\CustomerImport;
use App\Imports\OrderImport;
use App\Imports\QuarterImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Create extends Component
{
    use WithFileUploads;

    public $file_excel;
    public $type_importation;
    public function mount(){

    }

    public function save(){
        $data = $this->validate([
            'file_excel' => 'required|max:1024'
        ]);

        $path = $this->file_excel->getRealPath();

        if($this->type_importation === 'client'){

            $data = Excel::import(new CustomerImport, $path);
        }else if($this->type_importation === 'order'){

            $data = Excel::import(new OrderImport, $path);
        }else if($this->type_importation === 'quater'){

            $data = Excel::import(new QuarterImport, $path);
        }

        connectify('success','Importation','Importation du fichier Excel éffectué avec succès !!');
        return redirect()->route('excel.client');
    }

    public function render()
    {
        return view('livewire.nkd.excel.create');
    }
}
