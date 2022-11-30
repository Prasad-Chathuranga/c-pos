<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Flasher\SweetAlert\Prime\SweetAlertFactory;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'addContact'=>'destroy'
    ];

   public $email = 'test';

    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.users.users', compact('users'))->extends('layouts.main');
    }


    public function delete($id, SweetAlertFactory $flasher){

        $flasher->addWarning('Are you sure want to delete this record ?');
        $flasher->showConfirmButton(
            true, 
            null, 
            null, 
            null
        );
        $flasher->showCancelButton(
            true,
            null,
            null,
            null
        );

        // $flasher->showConfirmButton(true);
        // $flasher->confirmButtonText('Yes');
        // $flasher->showCancelButton(true);

        // try {

        //     $user = User::findOrFail($id);
        //     $user->delete();
            
        //     return redirect()->back();

        // } catch (\Throwable $th) {
        //     throw $th;
        // }
        
    }
    
}
