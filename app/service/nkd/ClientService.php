<?php


namespace App\service\nkd;
use App\Customer;
use App\Order;
use App\Relauch;
use Illuminate\Support\Facades\Date;

class ClientService
{


    /**
     * @return array
     */
    public static function ClientValidate():array
    {
        return
            [
                'name'=> 'required|string|min:3',
                'code'=> 'required|string',
                'tel'=> 'required|numeric|min:9',
                'birthday'=> 'string|min:3',

                'quater_id'=> 'required',
                'sector'=> 'required|string|min:3',
                'landmark'=> 'required|string|min:3',
                'particular_landmark'=> 'string|min:5',
            ];
    }

    /**
     * @param $slugCity
     * @param $quater_id
     * @return string
     */
    public static function generateCode($slugCity, $quater_id):string
    {
        if($slugCity!== null && $quater_id!== null){

            $lastClient= Customer::where('quaters_id', $quater_id)->get()->last();
            $lastClientId= !empty($lastClient)?$lastClient->id+1 : 1;
            $code= strtoupper($slugCity).$quater_id.$lastClientId;
        }else{
            return null;
        }

        return $code;
    }

    public static function initRelauche(Order $order){
        if($order!==null){
            $relauche =new Relauch();
            $relauche->customer_gaz_id = $order->id;
            $relauche->customer_gaz_gaz_id = (int)$order->gaz_id;
            $relauche->customer_gaz_customer_id = (int)$order->customer_id;

            $_c = Customer::find($order->customer_id);
            $period = $_c->category->period;
            $relauche->date = ClientService::addMounthToDate($order->date_order, $period,5);
            $relauche->date_reminder = ClientService::addMounthToDate($order->date_order, $period,3);
            $relauche->save();
//            $d =date('Y-m-d',( abs( strtotime($order->date_order) + $period*30*24*60*60 - 5*24*60*60) ));
//            dd($relauche);
        }
    }

    /**
     * @param $date
     * @param $mouth_add
     * @param int $dayToSoustract
     * @return false|string
     */
    public static function addMounthToDate($date, $mouth_add, $dayToSoustract=0){
        return date('Y-m-d',(
            abs(
                strtotime($date) + $mouth_add*30*24*60*60 - $dayToSoustract*24*60*60)
            )
        );
    }

}