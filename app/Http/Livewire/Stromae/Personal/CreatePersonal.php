<?php

namespace App\Http\Livewire\Stromae\Personal;

use App\Role;
use App\service\stromae\PersonalService;
use Livewire\Component;

class CreatePersonal extends Component
{
    public $name;
    public $birth_date;
    public $role_id;
    public $login;
    public $password;
    public $tel;

    public $roles;

    public function mount(){
        $this->roles = Role::all();
    }

    public function store(){
        $data = $this->validate([
            'name' => 'required|string|max:255',
            'login' => 'required|string|unique:personals|max:255',
            'password' => 'required|string',
            'tel' => 'required|string',
            'birth_date' => 'required|date',
            'role_id' => 'required|numeric'
        ]);

        //dd($data);
        PersonalService::store($data);

        connectify('success', 'Opération Réussie', 'Enregistrement du personnel reussi');
        return redirect()->route('personal.index');
    }

    public function password_key(){
        $this->password = generatePassword(16);
    }


    public function render()
    {
        return view('livewire.stromae.personal.create-personal');
    }
}
