<?php

use App\Http\Livewire\Category\Create as CategoryCreate;
use App\Http\Livewire\Category\Index as CategoryIndex;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Invoice\Create as InvoiceCreate;
use App\Http\Livewire\Invoice\Index as InvoiceIndex;
use App\Http\Livewire\Modules\Create as ModulesCreate;
use App\Http\Livewire\Modules\Index as ModulesIndex;
use App\Http\Livewire\Permissions\Index as PermissionsIndex;
use App\Http\Livewire\Product\Create as ProductCreate;
use App\Http\Livewire\Product\Index as ProductIndex;
use App\Http\Livewire\RolePermission\Index as RolePermissionIndex;
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
Route::get('role-permissions', RolePermissionIndex::class)->name('role-permissions');
Route::get('categories', CategoryIndex::class)->name('product-categories');
Route::get('products', ProductIndex::class)->name('products');
Route::get('invoices', InvoiceIndex::class)->name('invoices');



Route::get('user/{id?}', Create::class)->name('create_user');
Route::get('role/{id?}', RolesCreate::class)->name('create_role');
Route::get('module/{id?}', ModulesCreate::class)->name('create_module');
Route::get('category/{id?}', CategoryCreate::class)->name('create_product_category');
Route::get('product/{id?}', ProductCreate::class)->name('create_product');
Route::get('invoice/{id?}', InvoiceCreate::class)->name('create_invoice');


// Route::get('permission/{id?}', ModulesCreate::class)->name('create_module');




