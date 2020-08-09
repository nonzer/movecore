<?php

namespace App\Http\Livewire\Stromae\City;

use App\service\stromae\CityService;
use Livewire\Component;

class ListCity extends Component
{
    public $cities;

    public function mount(){
        $this->cities = CityService::list();
    }
    public function render()
    {
        return view('livewire.stromae.city.list-city');
    }
}
