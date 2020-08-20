<?php

namespace App\Http\Livewire\Stromae\Arrondissement;

use App\City;
use App\service\stromae\ArrondissementService;
use Livewire\Component;

class ListArrondissement extends Component
{
    public $slug;
    public $name;
    public $city_id;

    public $arrondissements;
    public $cities;

    public $show = false;

    public function mount(){
        $this->arrondissements = ArrondissementService::list();
        $this->cities = City::all();
    }

    public function delete(int $id)
    {
        ArrondissementService::destroy($id);

        connectify('success', 'Opération Réussie', 'Suppression de l\'arrondissement effectué');
        return redirect()->route('arrondissement.index');
    }

    public function show_add_form_arrondissement(){
        $this->show = true;
    }

    public function store(){
        $data = $this->validate([
            'name' => 'required|string|min:3',
            'slug' => 'required|string|max:15',
            'city_id' => 'required|numeric'
        ]);

        //dd($data);
        ArrondissementService::store($data);

        connectify('success', 'Opération Réussie', 'Votre arrondissement a bien été enregistrer');
        return redirect()->route('arrondissement.index');
    }

    public function render()
    {
        return view('livewire.stromae.arrondissement.list-arrondissement');
    }
}
