<?php

namespace App\Http\Controllers\Stromae;

use App\Http\Controllers\Controller;
use App\service\stromae\PersonalService;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function destroy(int $id)
    {
        PersonalService::destroy($id);

        connectify('success', 'Opération Réussie', 'Personnel supprimé avec succès');
        return redirect()->route('personal.index');
    }
}
