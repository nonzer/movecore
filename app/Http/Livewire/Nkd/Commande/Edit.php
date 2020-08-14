<?php

namespace App\Http\Livewire\Nkd\Commande;

use App\Gaz;
use App\Order;
use Livewire\Component;

class Edit extends Component
{

    public $client;
    public $cmd;
    public $typegaz;
    public $time_order;
    public $date_order;
    public $gaz;
    public $cmdcount=0;

    public function mount($id){
        $this->cmd = Order::find($id);
        $this->gaz = Gaz::all();
        $this->client = $this->cmd->customer;

        $this->typegaz = $this->cmd->gaz_id;
        $this->time_order = $this->cmd->time_order;
        $this->date_order = $this->cmd->date_order;

    }

    public function updatedTypegaz(){
        if(!empty($this->typegaz)){
            $_gaz = Gaz::find($this->typegaz);
            $this->cmdcount= (!empty($_gaz->price ))?$_gaz->price +500:0;
        }
    }

    public function update(){

        $this->validate([
           'time_order'=>'required',
           'date_order'=>'required|date',
           'typegaz'=>'required|numeric',
        ]);

        $order = $this->cmd;
        $order->time_order = $this->time_order;
        $order->date_order = $this->date_order;
        $order->gaz_id = $this->typegaz;
        $order->deliver_delay= calculate_delay($order)? calculate_delay($order): $order->deliver_delay;

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
