<?php

namespace App\Http\Livewire\Nkd\Commande;

use App\Customer;
use App\service\nkd\SearchService;
use Livewire\Component;

class SearchBar extends Component
{
    public $value;
    public $val;
    public $resp;
//    public $forsearch;

    public function updatedValue($value){
        if($value !== ''){
            $this->resp= SearchService::searchByCode($value);
        }else{
            $this->resp=null;
        }
    }

    public  function search(){
        if($this->value !== null){
            $code_client=$this->value;
            $client = Customer::whereCode($code_client)->first('id');
            if($client !== null)
                return redirect()->route('order.create', $client->id);
        }
    }

    public function render()
    {
        return view('livewire.nkd.commande.search-bar', ['resources'=>$this->resp]);
    }
}
