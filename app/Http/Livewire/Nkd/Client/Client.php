<?php

namespace App\Http\Livewire\Nkd\Client;
use App\Arrondissement;
use App\Category;
use App\Gaz;
use App\Quarter;
use App\City;
use App\service\nkd\ClientService;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Customer;

class Client extends Component
{

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

    public function mount()
    {
        $this->list_quater = Quarter::all();
        $this->list_cities = City::all();
        $this->list_gaz = Gaz::all();
        $this->list_arrond = Arrondissement::all();
        $this->type_client = Category::all();
    }


    public function updatedCity($value){
        $this->list_arrond = Arrondissement::where('cities_id', $value)->get();
    }

    public function generate()
    {
        if($this->quater_id!==null){
            $quat= Quarter::find($this->quater_id);
            $this->code = ClientService::generateCode($quat->slug, $this->quater_id);
        }
    }

    public function updatedArrond($value)
    {
        $this->list_quater = Quarter::where('arrondissements_id', $value)->get();
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

    public function save(){

        $data = $this->validate(ClientService::ClientValidate());

        $client = new Customer();

        $client->name = $this->name;
        $client->code = $this->code;
        $client->tel = $this->tel;
//        $client->quantity = $this->quantity;
        $client->birthday = $this->birthday;
        $client->type_gaz = $this->type_gaz;
        $client->sex = !empty($this->sexf)? 'F' : "H";
        $client->quaters_id = $this->quater_id;
        $client->sector = $this->sector;
        $client->landmark = $this->landmark;
        $client->particular_landmark = $this->particular_landmark;
        $client->category_customers_id = $this->category;
        $client->save();

        return redirect()->route('client.index');
    }

    public function render()
    {
        return view('livewire.nkd.client.client');
    }
}
