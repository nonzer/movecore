<?php

namespace App\Http\Controllers\Stromae;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function __construct()
    {
        $this->middleware('livreur');
    }

    public function index(){
        $orders = Auth::user()->orders->where('status_order', 'passed');
        if (count($orders) === 1){
            foreach($orders as $order) {
                $id = $order->id;
            }

            return redirect()->route('delivery.order_summary', $id);
        }

        return view('stromae.delivery.deliveries', compact('orders'));
    }

    public function order_summary($id){
        $order = Order::where('id', $id)->whereIn('status_order', ['passed', 'in pending'])->firstOrFail();
        return view('stromae.delivery.order_summary', compact('order'));
    }

    public function history_delivery(){
        $orders = Auth::user()->orders->whereIn('status_order', ['validated', 'declined']);
        return view('stromae.delivery.delivery_history', compact('orders'));
    }
}
