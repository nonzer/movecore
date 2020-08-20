<?php

namespace App\Http\Controllers\Stromae;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function __construct()
    {
        $this->middleware('livreur');
    }

    public function order_summary(){
        $order = Auth::user()->orders->whereIn('status_order', ['passed', 'in pending'])->last();
        return view('stromae.delivery.order_summary', compact('order'));
    }

    public function history_delivery(){
        $orders = Auth::user()->orders->whereIn('status_order', ['validated', 'declined']);
        return view('stromae.delivery.delivery_history', compact('orders'));
    }
}
