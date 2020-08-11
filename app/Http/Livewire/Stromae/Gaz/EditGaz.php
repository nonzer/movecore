<?php

namespace App\Http\Livewire\Stromae\Gaz;

use App\Gaz;
use App\service\stromae\GazService;
use Livewire\Component;

class EditGaz extends Component
{
    public $name;
    public $weight;
    public $price;
    public $id_gaz;

    public function mount($id){

        $gaz = Gaz::find($id);

        $this->name = $gaz->name;
        $this->weight = $gaz->weight;
        $this->price = $gaz->price;
        $this->id_gaz = $gaz->id;
    }

    public function update(){
        $data = $this->validate([
            'name' => 'required|string|min:3',
            'weight' => 'required|numeric',
            'price' => 'required|numeric'
        ]);

        GazService::update($this->id_gaz, $data);

        connectify('success', 'Opération Réussie', 'Votre gaz a bien été modifier');
        return redirect()->route('gaz.index');
    }

    public function render()
    {
        return view('livewire.stromae.gaz.edit-gaz');
    }
}
