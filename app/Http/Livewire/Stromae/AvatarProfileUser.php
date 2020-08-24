<?php

namespace App\Http\Livewire\Stromae;

use Carbon\Carbon;
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

        $image = $this->avatar;
        //dd($image);
        $currentDate = Carbon::now()->toDateString();
        $imagename =  'avatar-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
        $image->storeAs('public/images/avatars', $imagename);

        $user = Auth::user();
        $user->avatar = $imagename;
        $user->save();

        //unset($this->avatar);

        return redirect()->route('profile');
    }

    public function render()
    {
        return view('livewire.stromae.avatar-profile-user');
    }
}
