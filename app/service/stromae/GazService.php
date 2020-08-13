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
        $gaz = new Gaz();
        $gaz->name = ucfirst($data['name']);
        $gaz->weight = $data['weight'];
        $gaz->price = $data['price'];
        $gaz->price_buy = $data['price_buy'];
        $gaz->qty_stock = $data['qty_stock'];
        $gaz->save();

        return true;
    }

    public static function update(int $id, array $data)
    {
        $gaz = Gaz::find($id);
        $gaz->name = ucfirst($data['name']);
        $gaz->weight = $data['weight'];
        $gaz->price = $data['price'];
        $gaz->price_buy = $data['price_buy'];
        $gaz->qty_stock = $data['qty_stock'];
        $gaz->save();

        return true;
    }

    public static function destroy(int $id)
    {
        $gaz = Gaz::find($id);
        $gaz->delete();

        return true;
    }
}