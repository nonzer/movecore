<?php

namespace App\Imports;

use App\Quarter;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuarterImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new quarter([
            'name'=>                $row['name'],
            'slug'=>                $row['slug'],
            'arrondissements_id' => mapModelBy('arrondissement', ['name'=>$row['arrondissement']])->id,
        ]);
    }

    public function ruler(){
        return [
            'name' => 'unique:quaters|min:3',
        ];
    }

}
