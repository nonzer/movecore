<?php

namespace App\Http\Livewire\Stromae;

use App\Order;
use Illuminate\Support\Carbon;
use Livewire\Component;

class StartDelivery extends Component
{
    public $order;
/*    public $signature;*/
    public $error;
    public $status = false;

    public function mount($id_order){
        $this->order = Order::findOrFail($id_order);
    }

    public function start_delivery(){
        $this->order->status_order = "in pending";
        $this->order->save();

        return redirect()->route('delivery.order_summary');
    }

    public function decline_order(){
        $this->order->status_order = "declined";
        $this->order->save();

        return redirect()->route('delivery.order_summary');
    }

    public function validate_order(){

        /*$this->validate([
            'signature' => 'required'
        ]);*/

        $this->order->time_deliver = Carbon::now()->isoFormat('H:mm:s');
        $this->order->deliver_delay = calculate_delay($this->order);
        $this->order->status_order = "validated";
        $this->order->save();

        return redirect()->route('delivery.order_summary');
    }

    public function render()
    {
        return view('livewire.stromae.start-delivery');
    }
}
