<?php

namespace App\Imports;

use App\Order;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrderImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new order([
            'customer_id'=>       mapModelBy('client',[ 'name'=> $row['name'], 'tel'=> $row['tel'] ]),
            'gaz_id'=>            mapModelBy('gaz',['name'=> $row['gaz']]),

            'time_order'=>        $row['time_order'] ?? '',
            'date_order'=>        $row['date_order'] ?? '',
            'ime_deliver'=>       $row['time_deliver'],
            'status_order'=>      $row['status_order'],
            'deliver_delay'=>     $row['deliver_delay'],
            'quantity'=>          $row['quantity'],
            'type_order'=>        $row['type_order'],

            'personals_id'=>      mapModelBy('personal', [ 'name'=> $row['gaz'], 'login'=> $row['login'] ]),
        ]);
    }

    public function ruler(){
        return [
            'customer_id' => 'required',
        ];
    }
}
