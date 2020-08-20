<?php

namespace App\Http\Livewire\Stromae\Quarter;

use App\service\stromae\QuarterService;
use Livewire\Component;

class ListQuarter extends Component
{
    public $quarters;

    public function mount(){
        $this->quarters = QuarterService::list();
    }

    public function delete(int $id)
    {
        QuarterService::destroy($id);

        connectify('success', 'Opération Réussie', 'Suppression du quartier effectué');
        return redirect()->route('quarter.index');
    }

    public function render()
    {
        return view('livewire.stromae.quarter.list-quarter');
    }
}
