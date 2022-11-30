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
    
        public $user_id, $err;

    protected $rules = [
        'username' => 'required|min:8',
        'email' => 'required|email',
        'password' => 'required|min:6',
        'confirm_password' => 'required|min:6|required_with:password|same:password',
        'role' => 'required',
        'active' => 'required'
    ];

    public function render()
    {
        $roles = Role::all();
        return view('livewire.users.create', compact('roles'))->extends('layouts.main');
    }

    public function mount(){
        $this->user_id = request()->id;
       
        
        if($this->user_id){
            $user = User::findOrFail($this->user_id);
            $this->username = $user->username;
            $this->email = $user->email;
            $this->role = $user->role_id;
            $this->active = $user->active;
        }
    }


    public function resetFields()
    {
        $this->username = '';
        $this->email = '';
        $this->password = '';
        $this->confirm_password = '';
        $this->role = '';
        $this->active = '';
    }
    public function saveUser()
    {

        $this->validate();

        try {
            $user = User::create([
                'username' => $this->username,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'role_id' => $this->role,
                'active' => $this->active = 1
            ]);

            if ($user) {
                flash()->addSuccess('User Created Successfully', 'Success');
                $this->resetFields();
            }
        } catch (\Exception $th) {
            throw $th;
        }
    }

    public function updateUser(){
    
        try {
            $user = User::whereId($this->user_id)->update([
                'username' => $this->username,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'role_id' => $this->role,
                'active' => $this->active 
            ]);

            if ($user) {
                flash()->option('timer', 500);
                flash()->addSuccess('User Updated Successfully', 'Success');
                return redirect()->back();
            }
        } catch (\Exception $th) {
            throw $th;
        }
    }
}
