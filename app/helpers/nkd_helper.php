<?php



if(!function_exists('genre')){
    function genre($customer)
    {
        return ($customer->sex === 'F')? 'Mme': 'Mr';
    }
}

if(!function_exists('total_orders')){
    function total_orders($today=true)
    {
        return (!$today)?
            $o = \App\Order::count():
            $o = \App\Order::where('date_order', date('Y-m-d'))->count()
        ;
    }
}

if(!function_exists('sales_benefit')) {
    /**
     * find benefite for one order
     * @param $customer
     * @return string
     */
    function sales_benefit(App\Order $order): int
    {

        $type_gaz = \App\Gaz::find($order->gaz_id);

        if ($order->type_order === 'L') {
            $benefit = (500) * $order->quantity;
        } else if ($order->type_order === 'AAU') {
            $benefit = ($type_gaz->price - $type_gaz->price_buy) * $order->quantity;
        } else if ($order->type_order === 'A/L') {
            $benefit = ($type_gaz->price - $type_gaz->price_buy + 500) * $order->quantity;
        }

        return $benefit;
    }
}

if(!function_exists('total_benefit')){
    /**
     * @param null $date
     * @return int
     */
    function total_benefit($date=null):int
    {
        $benefits=0;
        if($date==null){
            $orders = \App\Order::all();
            foreach($orders as $o):
                $benefits += sales_benefit($o);
            endforeach;
        }else{
            $orders = \App\Order::where('date_order',$date)->get();
            foreach($orders as $o):
                $benefits += sales_benefit($o);
            endforeach;
        }
        return (int)$benefits;
    }
}


if(!function_exists('client_count')){
    function client_count($key=null, $value=null)
    {
        if($key!==null && $value!==null):
            $count = \App\Customer::where($key, $value)->count();
        else:
            $count = \App\Customer::count();
        endif;

        return $count;
    }
}
