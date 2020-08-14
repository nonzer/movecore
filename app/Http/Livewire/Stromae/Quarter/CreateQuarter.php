<?php

namespace App\Http\Livewire\Stromae\Quarter;

use App\Arrondissement;
use App\service\stromae\QuarterService;
use Livewire\Component;

class CreateQuarter extends Component
{

    public $name;
    public $slug;
    public $arrondissement_id;
    public $arrondissements;

    public function mount(){
        $this->arrondissements = Arrondissement::all();
    }

    public function store(){
        $data = $this->validate([
            'name' => 'required|string|min:3',
            'slug' => 'required|string|max:5',
            'arrondissement_id' => 'required|numeric'
        ]);

        //dd($data);
        QuarterService::store($data);

        connectify('success', 'Opération Réussie', 'Votre quartier a bien été enregistrer');
        return redirect()->route('quarter.index');
    }

    public function render()
    {
        return view('livewire.stromae.quarter.create-quarter');
    }
}
