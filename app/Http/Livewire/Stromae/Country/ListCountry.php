<?php

namespace App\Http\Livewire\Stromae\Country;


use App\Service\Stromae\CountryService;
use Livewire\Component;

class ListCountry extends Component
{
    public $countries;

    public function mount(){
        $this->countries = CountryService::list();
    }

    public function render()
    {
        return view('livewire.stromae.country.list-country');
    }
}
