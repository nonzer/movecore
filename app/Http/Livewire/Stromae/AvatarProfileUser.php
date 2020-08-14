<?php

namespace App\Http\Livewire\Stromae;

use Livewire\Component;
use Livewire\WithFileUploads;

class AvatarProfileUser extends Component
{
    use WithFileUploads;

    public $avatar;

    public function updatedAvatar()
    {
        $this->validate([
            'avatar' => 'image|max:1024', // 1MB Max
        ]);
    }

    public function render()
    {
        return view('livewire.stromae.avatar-profile-user');
    }
}
