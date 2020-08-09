<?php

namespace App\Http\Livewire\Stromae\Role;

use App\service\stromae\RoleService;
use Livewire\Component;

class ListRole extends Component
{
    public $roles;

    public function mount(){
        $this->roles = RoleService::list();
    }

    public function render()
    {
        return view('livewire.stromae.role.list-role');
    }
}
