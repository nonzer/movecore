<?php

namespace App\Http\Livewire\Stromae\Country;

use App\Country;
use App\Service\Stromae\CountryService;
use Livewire\Component;

class Edit extends Component
{
    public $name;
    public $slug;
    public $id_country;

    public function mount($id){

        $country = Country::find($id);

        $this->name = $country->name;
        $this->slug = $country->slug;
        $this->id_country = $country->id;
    }

    public function update(){
        $data = $this->validate([
            'name' => 'required|string|min:3',
            'slug' => 'required|string|max:3'
        ]);

        CountryService::update($this->id_country, $data);

        connectify('success', 'Opération Réussie', 'Votre pays a bien été modifier');
        return redirect()->route('country.index');
    }

    public function render()
    {
        return view('livewire.stromae.country.edit');
    }
}
