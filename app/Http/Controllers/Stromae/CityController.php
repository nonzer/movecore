<?php

namespace App\Http\Controllers\Stromae;

use App\Http\Controllers\Controller;
use App\service\stromae\CityService;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function destroy(int $id)
    {
        CityService::destroy($id);

        connectify('success', 'Opération Réussie', 'Suppression de la ville effectué');
        return redirect()->route('city.index');
    }
}
