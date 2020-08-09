<?php

namespace App\Http\Livewire\Stromae\Arrondissement;

use App\City;
use App\service\stromae\ArrondissementService;
use Livewire\Component;

class Create extends Component
{
    public $slug;
    public $name;
    public $city_id;
    public $cities;

    public function mount(){
        $this->cities = City::all();
    }

    public function store(){
        $data = $this->validate([
            'name' => 'required|string|min:3',
            'slug' => 'required|string|max:3',
            'city_id' => 'required|numeric'
        ]);

        //dd($data);
        ArrondissementService::store($data);

        connectify('success', 'Opération Réussie', 'Votre pays a bien été enregistrer');
        return redirect()->route('arrondissement.index');
    }

    public function render()
    {
        return view('livewire.stromae.arrondissement.create');
    }
}
