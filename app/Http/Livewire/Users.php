<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Controller;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Flasher\SweetAlert\Prime\SweetAlertFactory;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'remove'
    ];

   public $email = 'test';

    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.users.users', compact('users'))->extends('layouts.main');
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
            $user = User::findOrFail($id);
            $user->delete();
            
            flash()->addSuccess('User Deleted Successfully', 'Success');

            return redirect()->back();

        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
}
