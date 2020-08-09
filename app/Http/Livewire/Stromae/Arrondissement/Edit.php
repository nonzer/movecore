<?php

namespace App\Http\Livewire\Stromae\Arrondissement;

use App\Arrondissement;
use App\City;
use App\service\stromae\ArrondissementService;
use Livewire\Component;

class Edit extends Component
{
    public $slug;
    public $name;
    public $city_id;
    public $id_arrondissement;
    public $arrondissement_city_id;
    public $cities;

    public function mount($id){

        $this->cities = City::all();

        $arrondissement = Arrondissement::find($id);

        $this->name = $arrondissement->name;
        $this->slug = $arrondissement->slug;
        $this->id_arrondissement = $arrondissement->id;

        $this->arrondissement_city_id = $arrondissement->city->id;
    }

    public function update(){
        $data = $this->validate([
            'name' => 'required|string|min:3',
            'slug' => 'required|string|max:15',
            'city_id' => 'required|numeric'
        ]);

        //dd($data);
        ArrondissementService::update($this->id_arrondissement, $data);

        connectify('success', 'Opération Réussie', 'Votre arrondissement a bien été modifier');
        return redirect()->route('arrondissement.index');
    }

    public function render()
    {
        return view('livewire.stromae.arrondissement.edit');
    }
}
