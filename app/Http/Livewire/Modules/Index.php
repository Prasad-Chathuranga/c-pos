<?php

namespace App\Http\Livewire\Modules;

use App\Models\Module;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'remove'
    ];

    public function render()
    {
        $modules = Module::all();
        return view('livewire.modules.index', compact('modules'))->extends('layouts.main');
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
            $module = Module::findOrFail($id);
            $module->delete();
            
            flash()->addSuccess('Module Deleted Successfully', 'Success');

            return redirect()->back();

        } catch (\Exception $th) {
            throw $th;
        }
    }
    
}
