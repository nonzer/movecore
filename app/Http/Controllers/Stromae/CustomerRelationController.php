<?php

namespace App\Http\Controllers\Stromae;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class CustomerRelationController extends Controller
{
    public function index(){
        $orders = Order::whereIn('status_order', ['validated', 'declined'])->get();

        return view('stromae.customer_relation.index', compact('orders'));
    }
}
