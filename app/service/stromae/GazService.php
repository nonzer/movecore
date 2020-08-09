<?php
/**
 * Created by PhpStorm.
 * User: Simon.S
 * Date: 09/08/2020
 * Time: 00:40
 */

namespace App\service\stromae;


use App\Gaz;

class GazService
{
    public static function list(){
        return Gaz::all();
    }

    public static function store(array $data)
    {
        $country = new Gaz();
        $country->name = ucfirst($data['name']);
        $country->weight = $data['weight'];
        $country->save();

        return true;
    }

    public static function update(int $id, array $data)
    {
        $country = Gaz::find($id);
        $country->name = ucfirst($data['name']);
        $country->weight = $data['weight'];
        $country->save();

        return true;
    }

    public static function destroy(int $id)
    {
        $country = Gaz::find($id);
        $country->delete();

        return true;
    }
}