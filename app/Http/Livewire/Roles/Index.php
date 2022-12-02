<?php

namespace App\Http\Livewire\Roles;

use App\Models\Role;
use Livewire\Component;

class Index extends Component
{

    protected $listeners = [
        'remove'
    ];

    public function render()
    {
        $roles = Role::all();
        return view('livewire.roles.index', compact('roles'))->extends('layouts.main');
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
            $user = Role::findOrFail($id);
            $user->delete();
            
            flash()->addSuccess('Role Deleted Successfully', 'Success');

            return redirect()->back();

        } catch (\Exception $th) {
            throw $th;
        }
    }
}
