<?php

namespace App\Http\Controllers\Stromae;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LockAccountController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function lockscreen(){
        session(['locked' => 'true']);

        return view('auth.lockscreen');
    }

    /**
     * @param Request $request
     * @return $this|RedirectResponse
     * @throws ValidationException
     */
    public function unlock(Request $request){
        $this->validate($request, [
            'password' => 'required|string'
        ]);

        if (Hash::check($request->password, Auth::user()->password)) {
            $request->session()->forget('locked');

            return redirect()->route('home');
        }

        connectify('error', 'Erreur Mot de passe', 'Mot de passe non correspondant. Veuillez réessayer.');

        return back();
    }
}
