<?php
/**
 * Created by PhpStorm.
 * User: Simon.S
 * Date: 09/08/2020
 * Time: 00:39
 */

namespace App\service\stromae;


use App\Quarter;

class QuarterService
{
    public static function list(){
        return Quarter::all();
    }

    public static function store(array $data)
    {
        $quarter = new Quarter();
        $quarter->name = ucfirst($data['name']);
        $quarter->slug = strtoupper($data['slug']);
        $quarter->arrondissements_id = $data['arrondissement_id'];
        $quarter->save();

        return true;
    }

    public static function update(int $id, array $data)
    {
        $quarter = Quarter::find($id);
        $quarter->name = ucfirst($data['name']);
        $quarter->slug = strtoupper($data['slug']);
        $quarter->arrondissements_id = $data['arrondissement_id'];
        $quarter->save();

        return true;
    }

    public static function destroy(int $id)
    {
        $quarter = Quarter::find($id);
        $quarter->delete();

        return true;
    }
}