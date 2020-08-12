<?php

namespace App\Http\Livewire\Nkd\Chart;

use App\City;
use App\Customer;
use Livewire\Component;

class ChartClient extends Component
{

    public $clients =[];
    public $cities =[];

    public function mount(){
        $this->clients = Customer::all();
        $this->cities = City::All();
        $this->clients = ($this->clients->filter()->all());
    }

    public function render()
    {
        return view('livewire.nkd.chart.chart-client');
    }
}
