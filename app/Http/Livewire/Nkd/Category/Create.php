<?php

namespace App\Http\Livewire\Nkd\Category;

use App\Category;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $period;
    public $description;

    public function save(){
        $this->validate([
            'name'=>'required|min:3',
            'description'=>'required',
            'period'=>'required|numeric',
        ]);

        try{
            $cat = new Category();
            $cat->name=$this->name;
            $cat->description=$this->description;
            $cat->period=$this->period;
            $cat->save();
            session()->flash('success',true);

        }catch (\Exception $e){

            session()->flash('error',true);
            return redirect()->back();
        }

        return redirect()->route('category.index');
    }

    public function render()
    {
        return view('livewire.nkd.category.create');
    }
}
