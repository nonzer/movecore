<?php

namespace App\Http\Livewire\Nkd\Commande;

use App\Customer;
use App\Gaz;
use App\Order;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $client;
    public $typegaz;
    public $time_order;
    public $date_order;
    public $gaz;
    public $cmdcount=0;

    public function mount($id){
        $this->client = Customer::find($id);
        $this->gaz = Gaz::all();
    }

    public function updatedTypegaz(){
        if(!empty($this->typegaz)){
            $_gaz = Gaz::find($this->typegaz);
            $this->cmdcount= (!empty($_gaz->price ))?$_gaz->price +500:0;
        }
    }

    public function save(){

        $this->validate([
            'time_order'=>'required|string',
            'date_order'=>'required|string',
            'typegaz'=>'required',
        ]);

        $id = $this->client->id;
        $cmd = new Order();
        $cmd->customer_id= $id;
        $cmd->gaz_id= $this->typegaz;

        $cmd->date_order= $this->date_order;

        $cmd->time_order= $this->time_order;
        $cmd->status_order= 'passed';
        $cmd->save();
        return redirect()->route('order.index');
    }

    public function render()
    {
        return view('livewire.nkd.commande.create');
    }
}
