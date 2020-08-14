<?php

namespace App\Http\Livewire\Stromae\Gaz;

use App\Gaz;
use App\service\stromae\GazService;
use Livewire\Component;

class ListGaz extends Component
{
    public $all_gaz;
    public $visible;
    public $id_gaz;
    public $qty_stock;

    public function mount(){
        $this->all_gaz = GazService::list();
    }

    public function showInput($id, $qtystock){
        $this->visible = true;
        $this->id_gaz = $id;
        $this->qty_stock = $qtystock;
    }

    public function update_qty(){
        $qty = (int) $this->qty_stock;
        if($qty !== 0){
            $gaz = Gaz::find($this->id_gaz);
            $gaz->qty_stock = $qty;
            $gaz->save();
        }

        return redirect()->route('gaz.index');
    }

    public function render()
    {
        return view('livewire.stromae.gaz.list-gaz');
    }
}
