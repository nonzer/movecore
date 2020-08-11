<?php


namespace App\service\nkd;


use App\Customer;
use Illuminate\Support\Str;

class SearchService
{

    public static function searchByCode(string $value):array{
        $data= Customer::limit(7)->get();

        return collect($data)->filter(function($resource) use ($value) {
            return Str::contains(strtolower($resource['code']), strtolower($value));
        })->all();
    }

    public static function searchByTel(string $value):array{
        $data= Customer::limit(7)->get();

        return collect($data)->filter(function($resource) use ($value) {
            return Str::contains(strtolower($resource['tel']), strtolower($value));
        })->all();
    }
}