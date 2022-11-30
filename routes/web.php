<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Users;
use App\Http\Livewire\Users\Create;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('dashboard', Dashboard::class);
Route::get('users', Users::class)->name('users');
Route::get('user/{id?}', Create::class)->name('create_user');
