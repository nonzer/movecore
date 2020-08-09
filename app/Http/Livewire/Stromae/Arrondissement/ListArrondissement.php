<?php

namespace App\Http\Livewire\Stromae\Arrondissement;

use App\service\stromae\ArrondissementService;
use Livewire\Component;

class ListArrondissement extends Component
{
    public $arrondissements;

    public function mount(){
        $this->arrondissements = ArrondissementService::list();
    }

    public function render()
    {
        return view('livewire.stromae.arrondissement.list-arrondissement');
    }
}
