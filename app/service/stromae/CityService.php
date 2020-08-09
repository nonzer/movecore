<?php
/**
 * Created by PhpStorm.
 * User: Simon.S
 * Date: 09/08/2020
 * Time: 00:38
 */

namespace App\service\stromae;


use App\City;

class CityService
{
    public static function list(){
        return City::all();
    }

    public static function store(array $data)
    {
        $city = new City();
        $city->name = ucfirst($data['name']);
        $city->slug = strtoupper($data['slug']);
        $city->countries_id = $data['country_id'];
        $city->save();

        return true;
    }

    public static function update(int $id, array $data)
    {
        $city = City::find($id);
        $city->name = ucfirst($data['name']);
        $city->slug = strtoupper($data['slug']);
        $city->countries_id = $data['country_id'];
        $city->save();

        return true;
    }

    public static function destroy(int $id)
    {
        $city = City::find($id);
        $city->delete();

        return true;
    }
}