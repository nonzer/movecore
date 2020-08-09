<?php

namespace App\Http\Livewire\Stromae\City;

use App\City;
use App\Country;
use App\service\stromae\CityService;
use Livewire\Component;

class EditCity extends Component
{
    public $slug;
    public $name;
    public $country_id;
    public $id_city;
    public $city_country_id;
    public $countries;

    public function mount($id){
        $this->countries = Country::all();

        $city = City::find($id);

        $this->name = $city->name;
        $this->slug = $city->slug;
        $this->id_city = $city->id;

        $this->city_country_id = $city->country->id;
    }

    public function update(){
        $data = $this->validate([
            'name' => 'required|string|min:3',
            'slug' => 'required|string|max:3',
            'country_id' => 'required|numeric'
        ]);

        //dd($data);
        CityService::update($this->id_city, $data);

        connectify('success', 'Opération Réussie', 'Votre ville a bien été modifier');
        return redirect()->route('city.index');
    }

    public function render()
    {
        return view('livewire.stromae.city.edit-city');
    }
}
