<?php

namespace App\Http\Livewire\Stromae\City;

use App\Country;
use App\service\stromae\CityService;
use Livewire\Component;

class CreateCity extends Component
{

    public $slug;
    public $name;
    public $country_id;
    public $countries;

    public function mount(){
        $this->countries = Country::all();
    }

    public function store(){
        $data = $this->validate([
            'name' => 'required|string|min:3',
            'slug' => 'required|string|max:3',
            'country_id' => 'required|numeric'
        ]);

        //dd($data);
        CityService::store($data);

        connectify('success', 'Opération Réussie', 'Votre ville a bien été enregistrer');
        return redirect()->route('city.index');
    }

    public function render()
    {
        return view('livewire.stromae.city.create-city');
    }
}
