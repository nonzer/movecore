<?php

namespace App\Http\Livewire\Stromae;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AvatarProfileUser extends Component
{
    use WithFileUploads;

    public $avatar;

    public function update_avatar_user(){
        $this->validate([
            'avatar' => 'image|mimes:jpg,jpeg,png|max:1024', // 1MB Max
        ]);

        dd($this->avatar);
        $filename = 'avatar-'.rand(0, 10000).'-'.date('Y-m-d');
        Storage::putFile('avatars', new File('/images/avatars/'.$filename), $filename);

        $user = Auth::user();
        $user->avatar = 'images/avatar/'.$filename;
        $user->save();

        //unset($this->avatar);

        return redirect()->route('profile');
    }

    public function render()
    {
        return view('livewire.stromae.avatar-profile-user');
    }
}
