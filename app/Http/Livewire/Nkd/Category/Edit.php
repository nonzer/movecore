<?php

namespace App\Http\Livewire\Nkd\Category;

use App\Category;
use Livewire\Component;

class Edit extends Component
{
    public $name;
    public $period;
    public $description;
    public $cat;

    public function mount($id)
    {
        $cat = Category::find($id);
        $this->cat = $cat;
        $this->name = $cat->name;
        $this->period = $cat->period;
        $this->description = $cat->description;
    }

    public function update(){
        $this->validate([
            'name'=>'required|min:3',
            'description'=>'required',
            'period'=>'required|numeric',
        ]);

        try{
            $cat = $this->cat;
            $cat->name=$this->name;
            $cat->description=$this->description;
            $cat->period=$this->period;
            $cat->update();
            session()->flash('success',true);

        }catch (\Exception $e){

            session()->flash('error',true);
            return redirect()->back();
        }

        return redirect()->route('category.index');
    }
    public function render()
    {
        return view('livewire.nkd.category.edit');
    }
}
