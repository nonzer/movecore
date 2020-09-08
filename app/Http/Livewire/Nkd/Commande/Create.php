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

    public $gaz;
    public $quantity=1;
    public $cmdcount=0;

    public $type_order='A/L';
    public $delivery_man;
    public $deliver_id;

    public function mount($id){
        $this->client = Customer::find($id);
        $this->gaz = Gaz::all();
        $this->delivery_man = User::where('roles_id', get_role_id('Livreur')->id)->get();
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

    public function updatedTypegaz(){
        $this->calculatePriceOrder();
    }

    public function updatedQuantity(){
        $this->calculatePriceOrder();
    }
    public function updatedTypeOrder(){
        $this->calculatePriceOrder();
    }


    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(){
        $this->validate([
            'quantity'=>'required|numeric',
            'type_order'=>'required|in:L,AAU,A/L',
            'typegaz'=>'required'
        ]);

        $cmd = new Order();
        $cmd->customer_id= $this->client->id;
        $cmd->quantity= $this->quantity;
        $cmd->gaz_id= $this->typegaz;

        if(is_numeric($this->deliver_id))
            $cmd->personals_id= $this->deliver_id;

        $cmd->date_order= date('Y-m-d');
        $cmd->time_order= date('H:i:s');
        $cmd->time_deliver= null;
        $cmd->status_order= 'passed';

        $cmd->type_order= $this->type_order;
        $cmd->save();
        ClientService::initRelauche($cmd);

        return redirect()->route('invoice-print', $cmd->id);
    }

    public function render()
    {
        return view('livewire.nkd.commande.create');
    }
}
