<?php

namespace App\Http\Livewire\Stromae\Gaz;

use App\service\stromae\GazService;
use Livewire\Component;

class CreateGaz extends Component
{
    public $weight;
    public $name;
    public $price;
    public $price_buy;
    public $qty_stock;

    public function store(){
        $data = $this->validate([
            'name' => 'required|string|min:3',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'price_buy' => 'required|numeric',
            'qty_stock' => 'required|numeric'
        ]);

        //dd($data);
        GazService::store($data);

        connectify('success', 'Opération Réussie', 'Votre gaz a bien été enregistrer');
        return redirect()->route('gaz.index');
    }

    public function render()
    {
        return view('livewire.stromae.gaz.create-gaz');
    }
}
