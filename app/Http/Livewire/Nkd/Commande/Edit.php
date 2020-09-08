<?php

namespace App\Http\Livewire\Nkd\Commande;

use App\Gaz;
use App\Order;
use App\service\nkd\GazServices;
use App\User;
use Livewire\Component;

class Edit extends Component
{
    public $name;

    public $client;
    public $cmd;
    public $typegaz;

    public $gaz;
    public $cmdcount=0;

    public $delivery_man;
    public $deliver_id;
    public $status_order;
    public $quantity;
    public $type_order;



    public function mount($id){
        $this->cmd = Order::find($id);
        $this->gaz = Gaz::all();
        $this->delivery_man = User::where('roles_id', get_role_id('Livreur')->id)->get();
        $this->client = $this->cmd->customer;

        $this->typegaz = $this->cmd->gaz_id;
        $this->time_order = $this->cmd->time_order;
        if(is_numeric($this->deliver_id))
            $this->time_order = $this->cmd->time_order;

        $this->time_deliver = $this->cmd->time_deliver;
        $this->date_order = $this->cmd->date_order;
        $this->quantity = $this->cmd->quantity;
        $this->type_order = $this->cmd->type_order;
        $this->status_order = $this->cmd->status_order;

    }

    public function updatedTypegaz(){
        $this->calculatePriceOrder();

        if(!empty($this->typegaz)){
            $_gaz = Gaz::find($this->typegaz);
            $this->cmdcount= (!empty($_gaz->price ))?$_gaz->price*$this->cmd->quantity:0;
        }
    }

    public function updatedQuantity(){
        $this->calculatePriceOrder();
    }

    public function updatedTypeOrder(){
        $this->calculatePriceOrder();
    }

    public function update(){

        $this->validate([
           'typegaz'=>'required|numeric',
            'quantity'=>'required|numeric',
            'type_order'=>'required|in:L,AAU,A/L',
        ]);

        $order = $this->cmd;
        $order->gaz_id= $this->typegaz;
        $order->personals_id= $this->deliver_id;
        $order->quantity= $this->quantity;
        $order->status_order= $this->status_order;
        $order->type_order= $this->type_order;
        $order->update();

        return redirect()->route('invoice-print', $order->id);
    }


    /**
     *  give total order Price
     */
    private function calculatePriceOrder()
    {
        if(!empty($this->typegaz)){
            $_gaz = Gaz::find($this->typegaz);
            $_order = new Order();


            $_order->quantity = $this->quantity;
            $_order->gaz_id = $this->typegaz;
            $_order->type_order = $this->type_order;
            ($this->type_order==='L')?
                ($this->cmdcount= (!empty($_gaz->price ))? $_gaz->price*$this->quantity + sales_benefit($_order):0) :
                ($this->cmdcount= (!empty($_gaz->price ))? $_gaz->price_buy*$this->quantity + sales_benefit($_order):0);

        }
    }

    public function render()
    {
        $_gaz = Gaz::find($this->typegaz);
        $this->cmdcount= $_gaz->price +500 ?? 0;
        return view('livewire.nkd.commande.edit');
    }
}
