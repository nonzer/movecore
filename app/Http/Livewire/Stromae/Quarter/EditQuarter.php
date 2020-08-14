<?php

namespace App\Http\Livewire\Stromae\Quarter;

use App\Arrondissement;
use App\Quarter;
use App\service\stromae\QuarterService;
use Livewire\Component;

class EditQuarter extends Component
{
    public $name;
    public $slug;
    public $arrondissement_id;
    public $id_quarter;
    public $quarter_arrondissement_id;
    public $arrondissements;

    public function mount($id){

        $this->arrondissements = Arrondissement::all();

        $quarter = Quarter::find($id);

        $this->name = $quarter->name;
        $this->slug = $quarter->slug;
        $this->id_quarter = $quarter->id;

        $this->quarter_arrondissement_id = $quarter->arrondissement->id;
    }

    public function update(){
        $data = $this->validate([
            'name' => 'required|string|min:3',
            'slug' => 'required|string|max:5',
            'arrondissement_id' => 'required|numeric'
        ]);

        //dd($data);
        QuarterService::update($this->id_quarter, $data);

        connectify('success', 'Opération Réussie', 'Votre quartier a bien été modifier');
        return redirect()->route('quarter.index');
    }

    public function render()
    {
        return view('livewire.stromae.quarter.edit-quarter');
    }
}
