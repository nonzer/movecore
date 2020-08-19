<?php

namespace App\Http\Livewire\Nkd\Commande;

use App\Gaz;
use App\Order;
use Livewire\Component;

class Edit extends Component
{
    public $name;

    public $client;
    public $cmd;
    public $typegaz;

    public $gaz;
    public $cmdcount=0;

    public $status_order;
    public $quantity;
    public $type_order;



    public function mount($id){
        $this->cmd = Order::find($id);
        $this->gaz = Gaz::all();
        $this->client = $this->cmd->customer;

        $this->typegaz = $this->cmd->gaz_id;
        $this->time_order = $this->cmd->time_order;
        $this->time_deliver = $this->cmd->time_deliver;
        $this->date_order = $this->cmd->date_order;
        $this->quantity = $this->cmd->quantity;
        $this->type_order = $this->cmd->type_order;

    }

    public function updatedTypegaz(){
        if(!empty($this->typegaz)){
            $_gaz = Gaz::find($this->typegaz);
            $this->cmdcount= (!empty($_gaz->price ))?$_gaz->price*$this->cmd->quantity:0;
        }
    }

    public function update(){

        $this->validate([
           'typegaz'=>'required|numeric',
            'quantity'=>'required|numeric',
            'type_order'=>'required|in:L,AAU,A/L',
        ]);

        $order = $this->cmd;
        $order->gaz_id = $this->typegaz;

        $order->quantity= $this->quantity;
        $order->status_order= $this->status_order;
        $order->type_order= $this->type_order;
        $order->update();
        return redirect()->route('order.index');
    }
    public function render()
    {
        $_gaz = Gaz::find($this->typegaz);
        $this->cmdcount= $_gaz->price +500 ?? 0;
        return view('livewire.nkd.commande.edit');
    }
}
