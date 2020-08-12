<?php


namespace App\service\nkd;
use App\Customer;

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

}