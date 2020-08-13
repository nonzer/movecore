<?php

namespace App\Http\Livewire\Stromae;

use App\Relauch;
use Livewire\Component;

class ObservationRelance extends Component
{
    public $id_order;
    public $visible = false;
    public $observation;

    public function mount($id){
        $this->id_order = $id;
    }

    public function showObservation(){
        if ($this->visible === true){
            $relauch = Relauch::where('customer_gaz_id', $this->id_order)->first();
            $relauch->observation = $this->observation;
            $relauch->status = $this->observation;
            $relauch->save();

            return redirect()->route('customer_relation');
        }else{
            $this->visible = true;
        }
    }
    public function hiddenObservation(){
        $this->visible = false;
    }

    public function render()
    {
        return view('livewire.stromae.observation-relance');
    }
}
