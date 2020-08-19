<?php

namespace App\Http\Controllers\Stromae;

use App\Http\Controllers\Controller;
use App\service\stromae\PersonalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    public function destroy(int $id)
    {
        if (Auth::id() === $id){
            smilify('error', 'Impossible de vous supprimez vous même !');
        }else{
            PersonalService::destroy($id);
            connectify('success', 'Opération Réussie', 'Personnel supprimé avec succès');
        }

        return redirect()->route('personal.index');
    }
}
