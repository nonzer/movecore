<?php

namespace App\Http\Livewire\Stromae\Arrondissement;

use App\Arrondissement;
use App\City;
use Livewire\Component;

class Edit extends Component
{
    public $slug;
    public $name;
    public $city_id;
    public $cities;

    public function mount($id){

        $arrondissement = Arrondissement::find($id);
        $this->cities = City::all();

        $this->name = $arrondissement->name;
        $this->slug = $arrondissement->slug;
        $this->id_arrondissement = $arrondissement->id;
    }

    public function render()
    {
        return view('livewire.stromae.arrondissement.edit');
    }
}
