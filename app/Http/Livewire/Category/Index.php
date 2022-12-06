<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'remove'
    ];
    public function render()
    {
        $categories = Category::paginate(20);
        return view('livewire.category.index',compact('categories'))->extends('layouts.main');
    }

    public function delete($id){

        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',  
            'message' => 'Are you sure?', 
            'text' => 'If deleted, you will not be able to recover this imaginary file!',
            'id'=>$id
        ]);
      
       
        
    }

    public function remove($id){
        
         try {
            $category = Category::findOrFail($id);
            $category->delete();
            
            flash()->addSuccess('Module Deleted Successfully', 'Success');

            return redirect()->back();

        } catch (\Exception $th) {
            throw $th;
        }
    }
}
