<?php

namespace App\Http\Livewire\Stromae\Gaz;

use App\service\stromae\GazService;
use Livewire\Component;

class ListGaz extends Component
{
    public $gaz;

    public function mount(){
        $this->gaz = GazService::list();
    }

    public function render()
    {
        return view('livewire.stromae.gaz.list-gaz');
    }
}
