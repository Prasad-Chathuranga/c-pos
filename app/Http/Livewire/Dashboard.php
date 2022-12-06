<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $users = User::whereActive(true)->count();
        $categories = Category::whereActive(true)->count();
        return view('livewire.dashboard', compact('users','categories'))->extends('layouts.main');
    }
}
