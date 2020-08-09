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

    public function render()
    {
        return view('livewire.stromae.quarter.list-quarter');
    }
}
