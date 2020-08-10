<?php

namespace App\Http\Livewire\Stromae\Personal;

use App\service\stromae\PersonalService;
use Livewire\Component;

class ListPersonal extends Component
{
    public $personals;

    public function mount(){
        $this->personals = PersonalService::list();
    }

    public function render()
    {
        return view('livewire.stromae.personal.list-personal');
    }
}
