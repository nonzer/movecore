<?php

namespace App\Http\Livewire\Nkd\Client;

use App\Arrondissement;
use App\City;
use App\Customer;
use App\Gaz;
use App\Quarter;
use Livewire\Component;

class Edit extends Component
{
    public $client;

    public $name;
    public $code;
    public $tel;
    public $birthday;
    public $type_gaz;
    public $sex;
    public $sexm;
    public $sexf;
    public $quater_id;

    public $city;
    public $arrond;

    public $list_quater=[];
    public $list_cities=[];
    public $list_arrond=[];
    public $list_gaz=[];
    public $type_client=[];


    public $category;
    public $sector;
    public $landmark;
    public $particular_landmark;

    public function mount($id)
    {
        $this->list_quater = Quarter::all();
        $this->list_cities = City::all();
        $this->list_gaz = Gaz::all();
        $this->list_arrond = Arrondissement::all();

        $this->client = Customer::find($id);
    }

    public function render()
    {
        return view('livewire.nkd.client.edit');
    }
}
