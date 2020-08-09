<?php

namespace App\Http\Controllers\Stromae;

use App\Http\Controllers\Controller;
use App\service\stromae\ArrondissementService;
use Illuminate\Http\Request;

class ArrondissementController extends Controller
{

    public function destroy(int $id)
    {
        ArrondissementService::destroy($id);

        connectify('success', 'Opération Réussie', 'Suppression de l\'arrondissement effectué');
        return redirect()->route('arrondissement.index');
    }
}
