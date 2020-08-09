<?php

namespace App\Http\Livewire\Stromae\Personal;

use App\Role;
use App\service\stromae\PersonalService;
use App\User;
use Livewire\Component;

class EditPersonal extends Component
{
    public $name;
    public $birth_date;
    public $role_id;
    public $id_personal;
    public $roles;

    public $personal_role_id;

    public $tel;

    public function mount($id){
        $this->roles = Role::all();

        $personal = User::find($id);

        $this->name = $personal->name;
        $this->tel = $personal->tel;
        $this->birth_date = $personal->birth_date;
        $this->id_personal = $personal->id;

        $this->personal_role_id = $personal->role->id;

    }

    public function update(){
        $data = $this->validate([
            'name' => 'required|string|max:255',
            'tel' => 'required|numeric',
            'birth_date' => 'required|date',
            'role_id' => 'required|numeric'
        ]);

        //dd($data);
        PersonalService::update($this->id_personal, $data);

        connectify('success', 'Opération Réussie', 'Mise à jour du personnel reussie');
        return redirect()->route('personal.index');
    }

    public function render()
    {
        return view('livewire.stromae.personal.edit-personal');
    }
}
