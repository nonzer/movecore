<?php

namespace App\Http\Livewire\Stromae\Country;

use App\Service\Stromae\CountryService;
use Livewire\Component;

class Create extends Component
{
    public $slug;
    public $name;

    public function store(){
        $data = $this->validate([
            'name' => 'required|string|min:3',
            'slug' => 'required|string|max:3'
        ]);

        //dd($data);
        CountryService::store($data);

        connectify('success', 'Opération Réussie', 'Votre pays a bien été enregistrer');
        return redirect()->route('country.index');
    }

    public function render()
    {
        return view('livewire.stromae.country.create');
    }
}
