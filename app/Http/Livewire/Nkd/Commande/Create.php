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
    public $time_deliver; //
    public $date_order;
    public $gaz;
    public $quantity=1;
    public $cmdcount=0;

    public $status_order='passed';
    public $type_order='L';

    public function mount($id){
        $this->client = Customer::find($id);
        $this->gaz = Gaz::all();
    }

    /**
     *  give order Price
     */
    private function calculatePriceOrder()
    {
        if(!empty($this->typegaz)){
            $_gaz = Gaz::find($this->typegaz);
            $this->cmdcount= (!empty($_gaz->price ))?$_gaz->price*$this->quantity:0;
        }
    }

    public function updatedTypegaz(){
        $this->calculatePriceOrder();
    }

    public function updatedQuantity(){
        $this->calculatePriceOrder();

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(){
        $this->validate([
            'time_order'=>'required|string',
            'date_order'=>'required|string',
            'quantity'=>'required|numeric',
            'type_order'=>'required|in:L,AAU',
            'status_order'=>'required|in:validated,passed,declined,in pending',
            'typegaz'=>'required',
        ]);

        $id = $this->client->id;
        $cmd = new Order();
        $cmd->customer_id= $id;
        $cmd->quantity= $this->quantity;
        $cmd->gaz_id= $this->typegaz;
        $cmd->date_order= $this->date_order;

        $cmd->time_order= $this->time_order;
        $cmd->time_deliver= $this->time_deliver;

        $cmd->status_order= $this->status_order;
        $cmd->type_order= $this->type_order;

        $cmd->save();

        return redirect()->route('order.index');
    }

    public function render()
    {
        return view('livewire.nkd.commande.create');
    }
}
