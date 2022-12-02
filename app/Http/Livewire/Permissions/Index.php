<?php

namespace App\Http\Livewire\Permissions;

use App\Models\Module;
use App\Models\Permission;
use Livewire\Component;

class Index extends Component
{

    protected $listeners =[ 
        'openPermissionModal','closePermissionModal','enableTextField'
    ];

    public $name, $module_id, $permissions,$active;
    public $updated_permissions = [];

    protected $rules = [
        'name'=>'required'
    ];

    public function render()
    {
        $modules = Module::whereActive(true)->get();
        return view('livewire.permissions.index', compact('modules'))->extends('layouts.main');
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function updatedItems(){
        dd('sds');
    }

    public function getPermissionsForModule($id){
     
        $this->module_id = $id;
        $this->dispatchBrowserEvent('openPermissionModal');
        $this->permissions = Permission::with('module')->whereModuleId($id)->get();

        foreach ($this->permissions as $key => $value) {
             $this->updated_permissions[$key] = $value;
        }

    }

    public function enableThisPermission($id){
        $this->dispatchBrowserEvent('enableTextField',[
            'id'=>$id
        ]);
    }

    public function updatePermissions(){
        dd($this->permissions);
    }


    public function resetFields(){
        $this->name = '';
    }

    public function createPermission(){
    
        $this->validate();

        try {
            $permission = new Permission();
            $permission->name = $this->name;
            $permission->module_id = $this->module_id;
            $permission->active = 1;
            $permission->save();

            if($permission){
                flash()->addSuccess('Permission Created Successfully', 'Success');
                $this->resetFields();
                $this->permissions = Permission::with('module')->whereModuleId($this->module_id)->get();
            }
        } catch (\Exception $th) {
            throw $th;
        }

      

        $this->dispatchBrowserEvent('closePermissionModal');

    }


}
