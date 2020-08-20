<?php

use App\Customer;
use App\Order;

if(!function_exists('generatePassword')){
    /**
     * Genere un mot de passe aléatoirement
     * @param int $lenght
     * @return string
     */
    function generatePassword(int $lenght = 8):string {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $count = mb_strlen($chars);

        for ($i=0, $result=""; $i < $lenght; $i++){
            $index = rand(0, $count-1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }
}

if(!function_exists('date_relance')){
    /**
     * Détermine la date de relance d'un client
     * @param $date : date de commande du gaz
     * @param int $nbrMois : nombre de mois d'expiration de gaz
     * @return false|string
     */
    function date_relance($date, int $nbrMois){
        $unJour = 3600*24;

        $nbrJr = number_days($nbrMois) - 3; //on relance 3 jours avant la date d'expiration de gaz

        $ts = strtotime($date);
        $ts += $nbrJr*$unJour;

        return date('Y-m-d', $ts);
    }
}

if (!function_exists('delai_livraison')){
    function delai_livraison($order_hour, $delivery_hour):string {
        $result = '';

        if (!is_null($delivery_hour)){
            $order_hour = date_create_from_format('H:i:s', $order_hour);
            $delivery_hour = date_create_from_format('H:i:s', $delivery_hour);
            $result = date_diff($delivery_hour, $order_hour)->format('%h:%i').' min';
        }

        return $result;
    }
}

if(!function_exists('number_days')){
    /**
     * Détermine le nombre de jours en fonction du nombre de mois
     * @param int $number_months
     * @return int
     */
    function number_days(int $number_months):int {
        return 30*$number_months;
    }
}

if (!function_exists('civilite')){
    /**
     * @param Customer $customer
     * @return string
     */
    function civilite(Customer $customer):string {
        return ($customer->sexe === 'F') ? 'Mme' : 'Mr';
    }
}

if (!function_exists('timing')){
    /**
     * détermine si la date de relance prévue est proche de celle actuelle
     * @param $date_relance
     * @return string
     */
    function timing($date_relance):string {
        $status = '';
        if ($date_relance > date('Y-m-d')){
            $status = 'success';
        }else {
            $status = 'danger';
        }

        return $status;
    }
}

if (!function_exists('birthday_status')){
    function birthday_status($birthday):string{
        $result = false;

        if (DateTime::createFromFormat('Y-m-d', $birthday)->format('M:d') === date('M:d'))
            $result = true;

        return $result;
    }
}

if (!function_exists('exist_relauch')){
    function exist_relauch(int $gaz_id){
        return \App\Relauch::where('customer_gaz_id', $gaz_id)->first();
    }
}

if(!function_exists('subtotal')){
    function subtotal(Order $order):int {
        return $order->quantity * $order->gaz->price;
    }
}

if (!function_exists('total')){
    function total(Order $order):int {
        return $total = subtotal($order) + 500;
    }
}