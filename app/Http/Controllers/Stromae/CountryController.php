<?php

namespace App\Http\Controllers\Stromae;

use App\Country;
use App\Http\Controllers\Controller;
use App\Service\Stromae\CountryService;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function destroy(int $id)
    {
        CountryService::destroy($id);
        connectify('success', 'Opération Réussie', 'Suppression de pays effectuée');

        return redirect()->route('country.index');
    }
}
