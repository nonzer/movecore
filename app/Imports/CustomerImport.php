<?php

namespace App\Imports;

use App\customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new customer([
            'name'=>                    $row['name'],
            'tel'=>                     $row['tel'],
            'type_gaz'=>                $row['type_gaz'],
            'sector'=>                  $row['sector'],
            'landmark'=>                $row['landmark'],
            'particular_landmark'=>     $row['particular_landmark'],
            'code'=>                    $row['code'],
            'quaters_id'=>              mapModelBy('quater', ['name'=>$row['name_quarter']])->id,
            'category_customers_id'=>   mapModelBy('category', ['name'=>$row['name_category']])->id
        ]);
    }

    public function ruler(){
        return [
            'name' => 'unique:customers|min:3',
            'code' => 'unique:customers',
            'quaters_id' => 'required',
        ];
    }
}
