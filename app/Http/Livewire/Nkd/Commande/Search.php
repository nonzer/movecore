<?php

namespace App\Http\Livewire\Nkd\Commande;

use App\service\nkd\SearchService;
use Livewire\Component;

class Search extends Component
{
    public $value;
    public $response;
    public $searchbytel;
    public $searchbycode='on';

    public function  find(string $val)
    {
        $this->updatedValue($val);
    }
    public function updatedSearchbycode()
    {
        $this->searchbytel= null;
    }

    public function updatedSearchbytel()
    {
        $this->searchbycode= null;
    }

    public function updatedValue($value)
    {
        if($value !== ''){
            if($this->searchbytel==='on')
                $this->response = SearchService::searchByTel($value);
            if($this->searchbycode==='on')
                $this->response = SearchService::searchByCode($value);
            if(empty($this->response)){
                session()->flash('sms',true);
            }
        }else{
            $this->response=null;
        }
    }

    public function render()
    {
        return view('livewire.nkd.commande.search', ['resources'=>$this->response]);
    }
}
