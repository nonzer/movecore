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
    function total_benefit($date=null):string
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
        return number_format($benefits,0, ','," ");
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



if(!function_exists('calculate_delay')){
    function calculate_delay( \App\Order $order)
    {
        if((isset($order->time_order) && isset($order->time_deliver)) && $order->time_order!==null && $order->time_deliver!== null){
            $delay = strtotime($order->time_deliver) - strtotime($order->time_order);
            $delay = ($delay)/60;
            if($delay<0)
                return false;
        }else{
            return  false;
        }

        return $delay;
    }
}


if(!function_exists('delayAvg')){
    /**
     * @param \App\User|null $personal
     * @return string
     */
    function delayAvg(\App\User $personal = null):string
    {
        $order= \App\Order::all();
        $delay= 0;
        $count_valid_orders= 0;

        if($personal !==null):
            foreach($order as $or):
                if($or->deliver_delay !== null && $personal->id === $or->personals_id):
                    $delay += ($or->deliver_delay);
                    $count_valid_orders++;
                endif;
            endforeach;
        else:
            foreach($order as $or):
                if($or->deliver_delay !==null):
                    $delay += ($or->deliver_delay);
                    $count_valid_orders++;
                endif;
            endforeach;
        endif;

        $delay = ($delay/$count_valid_orders);
        return number_format($delay);
    }
}


if(!function_exists('getStatusOrder')){
    function getStatusOrder(\App\Order $order)
    {

        if($order !== null  && $order->status_order !==null){
            $status = '';
            if($order->status_order  === 'passed'){
                $status = '<span class="text-secondary text-xs"> passée</span>';
            }else if($order->status_order  === 'in pending'){
                $status = '<span class="text-secondary text-xs"> En cours</span>';

            }else if($order->status_order  === 'validated'){
                $status = ' <span class="text-success text-xs"> Validée</span>';

            }else if($order->status_order  === 'declined'){
                $status = '<span class="text-danger text-xs"> Annulée</span>';
            }
            return $status;
        }
        return null;
    }
}

if(!function_exists('mapModelBy')){
    function mapModelBy(string $model, array $tab_maper)
    {

        $maped = null;

        if($model === 'client'){

            if(!empty($tab_maper['slug']) && $tab_maper['tel'] !== null){
                $maped = \App\Customer::where('name',$tab_maper['name'])
                    ->where('tel', $tab_maper['tel'])
                    ->first();
            }else
                $maped = \App\Customer::where('name',$tab_maper['name'])
                    ->first();
        }else if($model === 'quater'){

            if(!empty($tab_maper['slug']) && $tab_maper['slug'] !== null){
                $maped = \App\Quarter::where('name', $tab_maper['name'])
                    ->where('slug', $tab_maper['slug'])
                    ->first();
            }else
                $maped = \App\Quarter::where('name', $tab_maper['name'])
                    ->first();

        }else if( $model === 'category'){

            $maped = \App\Category::where('name',$tab_maper['name'])->first();

        }else if( $model === 'arrondissement'){

            if( !empty($tab_maper['slug']) && $tab_maper['slug'] !== null){
                $maped = \App\Arrondissement::where('name',$tab_maper['name'])
                    ->where('slug', $tab_maper['slug'])
                    ->first();
            }else
                $maped = \App\Arrondissement::where('name',$tab_maper['name'])
                    ->first();

        }else if( $model === 'gaz'){

            if( !empty($tab_maper['slug']) && $tab_maper['weight'] !== null){
                $maped = \App\Gaz::where('name',$tab_maper['name'])
                    ->where('weight', $tab_maper['weight'])
                    ->first();
            }else
                $maped = \App\Gaz::where('name',$tab_maper['name'])
                    ->first();

        }else if( $model === 'personal'){

            if( !empty($tab_maper['login']) && $tab_maper['login'] !== null){
                $maped = \App\User::where('name',$tab_maper['name'])
                    ->where('login', $tab_maper['login'])
                    ->first();
            }else
                $maped = \App\User::where('name',$tab_maper['name'])
                    ->first();

        }
        return $maped;

    }
}


