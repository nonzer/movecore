<?php

namespace App\Http\Controllers\Stromae;

use App\Http\Controllers\Controller;
use App\service\stromae\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function destroy(int $id)
    {
        RoleService::destroy($id);

        connectify('success', 'Opération Réussie', 'Suppression de rôle effectué');
        return redirect()->route('arrondissement.index');
    }
}
