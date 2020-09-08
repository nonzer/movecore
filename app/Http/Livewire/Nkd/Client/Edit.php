<?php

namespace App\Http\Livewire\Nkd\Client;

use App\Arrondissement;
use App\Category;
use App\City;
use App\Customer;
use App\Gaz;
use App\Quarter;
use App\service\nkd\ClientService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Edit extends Component
{
    public $client;

// DB datas
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
    public $category;
    public $sector;
    public $landmark;
    public $particular_landmark;

//    tempon datas
    public $list_quater=[];
    public $list_cities=[];
    public $list_arrond=[];
    public $list_gaz=[];
    public $type_client=[];

    public function mount($id)
    {
        $this->list_gaz = Gaz::all();
        $this->list_quater = Quarter::all();
        $this->list_cities = City::all();
        $this->list_arrond = Arrondissement::all();
        $this->type_client = Category::all();

        $this->client  = Customer::find($id) ;

        $this->name = $this->client->name;
        $this->code = $this->client->code;
        $this->tel = $this->client->tel;
        $this->birthday = $this->client->birthday;
        $this->type_gaz = $this->client->type_gaz;
        $this->sex = ($this->client->sex === 'F')? $this->sexf='on' : $this->sexm='on' ;
        $this->quater_id = $this->client->quaters_id;
        $this->city = $this->client->city;
        $this->arrond = $this->client->arrondissement;
        $this->category = $this->client->category_customers_id;
        $this->sector = $this->client->sector;
        $this->landmark = $this->client->landmark;
        $this->particular_landmark = $this->client->particular_landmark;
    }


    public function refreshClientUpdate($client): object {
        $client->name = $this->name;
        $client->code = $this->code;
        $client->tel = $this->tel;
        $client->birthday = $this->birthday;
        $client->type_gaz = $this->type_gaz;
        $client->sex = !empty($this->sexf)? 'F' : "H";
        $client->quaters_id = $this->quater_id;
        $client->sector = $this->sector;
        $client->landmark = $this->landmark;
        $client->particular_landmark = $this->particular_landmark;
        $client->category_customers_id = $this->category;
        return $client;
    }


    public function updatedSexm(){
        if($this->sexm=="on"){
            $this->sexf =null;
        }
    }
    public function updatedSexf(){
        if($this->sexf=="on"){
            $this->sexm =null;
        }
    }

    public function updatedCity($value){
        $this->list_arrond = Arrondissement::where('cities_id', $value)->get();
    }

    public function updatedArrond($value)
    {
        $this->list_quater = Quarter::where('arrondissements_id', $value)->get();
    }


    public function generate()
    {
        if($this->quater_id!==null){
            $quat= Quarter::find($this->quater_id);
            $this->code = ClientService::generateCode($quat->slug, $this->quater_id);
        }
    }

    public function update()
    {
        $data = $this->validate(ClientService::ClientValidateUpdate());
        try{
            $_client = $this->refreshClientUpdate($this->client);
            $_client->update();
        }catch (\Exception $e){

            session()->flash('error','Erreur lors de l\'enregistrement');
            return redirect()->back();
        }

        if(!Auth()->user()->hasRole('Admin'))
        return redirect()->route('client.index');

    }

    public function render()
    {
        return view('livewire.nkd.client.edit');
    }
}
