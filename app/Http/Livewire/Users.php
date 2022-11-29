<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

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

    public function delete(){
        $this->email = 'test changed';
    }
}
