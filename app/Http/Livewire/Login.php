<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email, $password;

    protected $rules = [
        'email'=>'required|email',
        'password'=>'required|min:6'
    ];

    protected $messages = [
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
        'password.required' => 'The Password cannot be empty.',
        'password.min' => 'Password must be at least 6 characters.'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.login');
    }

    public function login(){

        $credentials = $this->validate();

        if(Auth::attempt($credentials)){

           return redirect()->to('dashboard');

        }
        else
        {
            dd($credentials);
        }
       
    }
}
