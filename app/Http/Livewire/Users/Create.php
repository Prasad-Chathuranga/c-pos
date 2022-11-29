<?php

namespace App\Http\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public $username,
    $email,
    $password,
    $confirm_password,
    $role,
    $active;
    protected $rules = [
        'username'=>'required|min:8',
        'email'=>'required|email',
        'password'=>'required|min:6',
        'confirm_password'=>'required|min:6|required_with:password|same:password',
        'role'=>'required',
        'active'=>'required'
    ];

    public function render()
    {
        $roles = Role::all();
        return view('livewire.users.create', compact('roles'))->extends('layouts.main');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveUser(){
        
        $this->validate();

        try {
            User::create([
                'username'=>$this->username, 
                'email'=>$this->email,
                'password'=>bcrypt($this->password),
                'role_id'=>$this->role,
                'active'=>$this->active = 1
            ]);
           
        } catch (\Exception $th) {
            throw $th;
        }
    }
}
