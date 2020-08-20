<?php

namespace App\Http\Controllers\Stromae;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function printInvoice(int $id){

        $order = Order::findOrFail($id);

        return view('stromae.invoices.invoice', compact('order', 'id'));
    }
}
