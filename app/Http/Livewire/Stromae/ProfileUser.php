<?php

namespace App\Http\Livewire\Stromae;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ProfileUser extends Component
{
    public $name;
    public $login;
    public $birth_date;
    public $password;
    public $tel;

    public function mount(){
        $user = Auth::user();
        $this->name = $user->name;
        $this->login = $user->login;
        $this->tel = $user->tel;
        $this->birth_date = $user->birth_date;
    }

    public function update_profile(){
        $data = $this->validate([
            'name' => 'required|string|max:255',
            'login' => 'required|string|max:255',
            'tel' => 'required|string',
            'birth_date' => 'required|date',
        ]);

        $user = Auth::user();
        $user->name = ucfirst($data['name']);
        $user->login = $data['login'];
        $user->tel = $data['tel'];
        $user->birth_date = $data['birth_date'];

        if (!empty($this->password)){
            $user->password = Hash::make($this->password);
        }

        $user->save();

        connectify('success', 'Modification Réussie', 'profil mis à jour');

        return redirect()->route('profile');
    }

    public function render()
    {
        return view('livewire.stromae.profile-user');
    }
}
