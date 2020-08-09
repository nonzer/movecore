<?php

namespace App\Http\Livewire\Stromae\Gaz;

use App\service\stromae\GazService;
use Livewire\Component;

class ListGaz extends Component
{
    public $all_gaz;

    public function mount(){
        $this->all_gaz = GazService::list();
    }

    public function render()
    {
        return view('livewire.stromae.gaz.list-gaz');
    }
}
