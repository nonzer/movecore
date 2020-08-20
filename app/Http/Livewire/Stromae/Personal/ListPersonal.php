<?php

namespace App\Http\Livewire\Stromae\Personal;

use App\service\stromae\PersonalService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListPersonal extends Component
{
    public $personals;
    public $personal = "active";

    public function mount(){
        $this->personals = PersonalService::list();
    }

    public function delete(int $id)
    {
        if (Auth::id() === $id){
            smilify('error', 'Impossible de vous supprimez vous même !');
        }else{
            PersonalService::destroy($id);
            connectify('success', 'Opération Réussie', 'Personnel supprimé avec succès');
        }

        return redirect()->route('personal.index');
    }

    public function render()
    {
        return view('livewire.stromae.personal.list-personal');
    }
}
