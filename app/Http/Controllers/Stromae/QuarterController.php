<?php

namespace App\Http\Controllers\Stromae;

use App\Http\Controllers\Controller;
use App\service\stromae\QuarterService;
use Illuminate\Http\Request;

class QuarterController extends Controller
{
    public function destroy(int $id)
    {
        QuarterService::destroy($id);

        connectify('success', 'Opération Réussie', 'Suppression du quartier effectué');
        return redirect()->route('arrondissement.index');
    }
}
