<?php

namespace App\Service\Stromae;

use App\Country;

class CountryService{

    public static function list(){
        return Country::all();
    }

	public static function store(array $data)
    {
        $country = new Country();
        $country->name = ucfirst($data['name']);
        $country->slug = strtoupper($data['slug']);
        $country->save();

        return true;
    }

    public static function update(int $id, array $data)
    {
        $country = Country::find($id);
        $country->name = ucfirst($data['name']);
        $country->slug = strtoupper($data['slug']);
        $country->save();

        return true;
    }

    public static function destroy(int $id)
    {
        $country = Country::find($id);
        $country->delete();

        return true;
    }
}