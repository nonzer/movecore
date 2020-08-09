<?php

namespace App\Http\Livewire\Stromae\Role;

use App\service\stromae\RoleService;
use Livewire\Component;

class CreateRole extends Component
{
    public $description;
    public $name;

    public function store(){
        $data = $this->validate([
            'name' => 'required|string|min:3',
        ]);

        $data['description'] = $this->description;

        //dd($data);
        RoleService::store($data);

        connectify('success', 'Opération Réussie', 'Votre rôle a bien été enregistrer');
        return redirect()->route('role.index');
    }

    public function render()
    {
        return view('livewire.stromae.role.create-role');
    }
}
