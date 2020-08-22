<?php


namespace App\service\nkd;


use App\Gaz;
use App\Order;

class GazServices
{

    /**
     * @param $gaz_id
     * @param int $new_stock
     * @param int|null $old_stock
     */
    public static function updateStock($gaz_id, int $new_stock, int $old_stock=null){

        $gaz = Gaz::find($gaz_id);
        if($old_stock==null && $new_stock!==null){
            $gaz->qty_stock -= $new_stock;
        }else if($old_stock!==null){

            $diff = $new_stock - $old_stock;

            if($diff>0){

                $gaz->qty_stock-= $diff;
            }else if($diff<0){

                $gaz->qty_stock+= abs($diff);
            }
        }
        $gaz->update();
    }

}