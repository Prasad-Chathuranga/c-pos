<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Modules\Create as ModulesCreate;
use App\Http\Livewire\Modules\Index as ModulesIndex;
use App\Http\Livewire\Permissions\Index as PermissionsIndex;
use App\Http\Livewire\Roles\Create as RolesCreate;
use App\Http\Livewire\Roles\Index;
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

Route::get('dashboard', Dashboard::class)->name('dashboard');
Route::get('users', Users::class)->name('users');
Route::get('roles', Index::class)->name('roles');
Route::get('modules', ModulesIndex::class)->name('modules');
Route::get('permissions', PermissionsIndex::class)->name('permissions');

Route::get('user/{id?}', Create::class)->name('create_user');
Route::get('role/{id?}', RolesCreate::class)->name('create_role');
Route::get('module/{id?}', ModulesCreate::class)->name('create_module');
// Route::get('permission/{id?}', ModulesCreate::class)->name('create_module');




