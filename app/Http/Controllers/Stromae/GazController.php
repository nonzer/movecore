<?php

namespace App\Http\Controllers\Stromae;

use App\Http\Controllers\Controller;
use App\service\stromae\GazService;
use Illuminate\Http\Request;

class GazController extends Controller
{
    public function destroy(int $id)
    {
        GazService::destroy($id);

        connectify('success', 'Opération Réussie', 'Suppression de la marque de gaz effectué');
        return redirect()->route('gaz.index');
    }
}
