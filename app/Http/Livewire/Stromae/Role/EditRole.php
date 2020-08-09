<?php

namespace App\Http\Livewire\Stromae\Role;

use App\Role;
use App\service\stromae\RoleService;
use Livewire\Component;

class EditRole extends Component
{
    public $name;
    public $description;
    public $id_role;

    public function mount($id){

        $role = Role::find($id);

        $this->name = $role->name;
        $this->description = $role->description;
        $this->id_role = $role->id;
    }

    public function update(){
        $data = $this->validate([
            'name' => 'required|string|min:3',
        ]);

        $data['description'] = $this->description;

        RoleService::update($this->id_role, $data);

        connectify('success', 'Opération Réussie', 'Votre role a bien été modifier');
        return redirect()->route('role.index');
    }

    public function render()
    {
        return view('livewire.stromae.role.edit-role');
    }
}
