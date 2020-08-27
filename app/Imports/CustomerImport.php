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

        if(empty($row['code']) || empty($row['name']) || $row == null || $row['name'] == null || $row['code'] == null)
            return null;

        if($this->checkRowExcelDouble($row))
            return null;

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

    /**
     * this function check a double
     * return true if $row is a double of  DB row
     * @param array $row
     * @return bool
     */
    public function checkRowExcelDouble(array $row){
        $customers = Customer::all();
//        dd($customers);
        foreach($customers as $c){
            if(
                (
                    $this->compareTo($c->name, $row['name']) &&
                    $this->compareTo($c->tel, $row['tel']) &&
                    $this->compareTo($c->type_gaz, $row['type_gaz']) &&
                    $this->compareTo($c->sector, $row['sector']) &&
                    $this->compareTo($c->landmark, $row['landmark']) &&
                    $this->compareTo($c->code, $row['code']) &&
                    $this->compareTo($c->particular_landmark, $row['particular_landmark']) &&
                    $this->compareTo($c->quaters_id, mapModelBy('quater', ['name'=>$row['name_quarter']])->id) &&
                    $this->compareTo($c->category_customers_id, mapModelBy('category', ['name'=>$row['name_category']])->id)
                )
                ||
                (
                    $this->compareTo($c->name, $row['name']) &&
                    $this->compareTo($c->tel, $row['tel']) &&
                    $this->compareTo($c->type_gaz, $row['type_gaz']) &&
                    $this->compareTo($c->sector, $row['sector']) &&
                    $this->compareTo($c->landmark, $row['landmark']) &&
                    $this->compareTo($c->particular_landmark, $row['particular_landmark']) &&
                    $this->compareTo($c->quaters_id, mapModelBy('quater', ['name'=>$row['name_quarter']])->id) &&
                    $this->compareTo($c->category_customers_id, mapModelBy('category', ['name'=>$row['name_category']])->id)
                )
            )
                return true;
        }
        return false;
    }

    /**
     * compare 2 var
     * @param $value1
     * @param $value2
     * @return bool
     */
    public function compareTo($value1, $value2){

        if($value1 == $value2){
            return true;
        }else
            return false;
    }
}
