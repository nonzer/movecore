<?php

namespace App\Http\Livewire\Nkd\Commande;

use App\Customer;
use App\Gaz;
use App\Order;
use App\service\nkd\ClientService;
use App\User;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $client;
    public $typegaz;

//    public $time_order;
//    public $time_deliver; //
//    public $date_order;

    public $gaz;
    public $quantity=1;
    public $cmdcount=0;

    public $status_order='passed';
    public $type_order='A/L';
    public $delivery_man=null;

    public function mount($id){
        $this->client = Customer::find($id);
        $this->gaz = Gaz::all();
        $this->delivery_man = User::where('roles_id',9)->get();
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
//            'time_order'=>'required|string',
//            'date_order'=>'required|string',
//            'status_order'=>'required|in:validated,passed,declined,in pending',

            'quantity'=>'required|numeric',
            'type_order'=>'required|in:L,AAU,A/L',
            'typegaz'=>'required'
        ]);


        $cmd = new Order();
        $cmd->customer_id= $this->client->id;
        $cmd->quantity= $this->quantity;
        $cmd->gaz_id= $this->typegaz;

        if(is_numeric($this->delivery_man ))
            $cmd->personals_id= $this->delivery_man;

        $cmd->date_order= date('Y-m-d');
        $cmd->time_order= date('h:i:s');
        $cmd->time_deliver= null;
        $cmd->status_order= 'passed';

        $cmd->type_order= $this->type_order;
//        $cmd->deliver_delay= calculate_delay($cmd)? calculate_delay($cmd): null;
        $cmd->save();
        ClientService::initRelauche($cmd);

        return redirect()->route('order.index');
    }

    public function render()
    {
        return view('livewire.nkd.commande.create');
    }
}
