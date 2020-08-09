<?php
/**
 * Created by PhpStorm.
 * User: Simon.S
 * Date: 09/08/2020
 * Time: 00:39
 */

namespace App\service\stromae;


use App\Arrondissement;

class ArrondissementService
{
    public static function list(){
        return Arrondissement::all();
    }

    public static function store(array $data)
    {
        $arrondissement = new Arrondissement();

        $arrondissement->name = ucfirst($data['name']);
        $arrondissement->slug = strtoupper($data['slug']);
        $arrondissement->cities_id = $data['city_id'];

        $arrondissement->save();

        return true;
    }

    public static function update(int $id, array $data)
    {
        $arrondissement = Arrondissement::find($id);

        $arrondissement->name = ucfirst($data['name']);
        $arrondissement->slug = strtoupper($data['slug']);
        $arrondissement->cities_id = $data['city_id'];

        $arrondissement->save();

        return true;
    }

    public static function destroy(int $id)
    {
        $arrondissement = Arrondissement::find($id);
        $arrondissement->delete();

        return true;
    }
}