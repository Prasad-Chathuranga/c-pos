<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Create extends Component
{

    public $name,
        $description,
        $active;

    public $category_id;

    protected $rules = [
        'name' => 'required'
    ];

    public function render()
    {
        return view('livewire.category.create')->extends('layouts.main');
    }

    public function mount()
    {
        $this->category_id = request()->id;


        if ($this->category_id) {
            $category = Category::findOrFail($this->category_id);
            $this->name = $category->name;
            $this->description = $category->description;
            $this->active = $category->active;
        }
    }


    public function resetFields()
    {
        $this->name = '';
        $this->description = '';
        $this->active = '';
    }
    public function saveCategory()
    {
      
        $this->validate();

        try {
            $category = Category::create([
                'name' => $this->name,
                'description' => $this->description,
                'active' => $this->active ?? 0 
            ]);

            if ($category) {
                flash()->addSuccess('Category Created Successfully', 'Success');
                $this->resetFields();
            }
        } catch (\Exception $th) {
            throw $th;
        }
    }

    public function updated($propoertyName)
    {
        $this->validateOnly($propoertyName);
    }

    public function updateCategory()
    {

        try {
            $category = Category::whereId($this->category_id)->update([
                'name' => $this->name,
                'description' => $this->description,
                'active' => $this->active
            ]);

            if ($category) {
                flash()->addSuccess('Category Updated Successfully', 'Success');
                return redirect()->back();
            }
        } catch (\Exception $th) {
            throw $th;
        }
    }
}
