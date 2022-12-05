<?php

namespace App\Http\Livewire\Permissions;

use App\Models\Module;
use App\Models\Permission;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    protected $listeners =[ 
        'openPermissionModal','closePermissionModal','enableTextField'
    ];

    public $name, $module_id, $permissions,$active;
    public $a;
    public $updated_permissions = [], $permissionsArray = [];
    public $perPage= 5, $columns = ['*'], $pageName= 'page';

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

    public function getPermissionsForModule($id){
     
        $this->module_id = $id;
        $this->dispatchBrowserEvent('openPermissionModal');
        $this->a = Permission::with('module')->whereModuleId($id)->paginate(5);
       
        $this->permissions = Permission::with('module')->whereModuleId($id)->paginate($this->perPage, $this->columns, $this->pageName)->toArray();
       
        foreach ($this->permissions['data'] as $value) {
             $this->updated_permissions[$value['id']]['name'] = $value['name'];
             $this->updated_permissions[$value['id']]['active'] = $value['active'];
        }
      

    }

    public function enableThisPermission($id){
        $this->dispatchBrowserEvent('enableTextField',[
            'id'=>$id
        ]);
    }

    public function updatePermissions()
    {
        try {
       
            foreach ($this->updated_permissions as $key => $value) {

                $permission = Permission::whereId($key)->update([
                    'name' => $value['name'],
                    'active' => $value['active']
                ]);
            }
           

            if ($permission) {
                flash()->addSuccess('Permissions Updated Successfully', 'Success');
                $this->permissions = Permission::with('module')->whereModuleId(request()->serverMemo['data']['module_id'])->paginate( $this->perPage, $this->columns, $this->pageName)->toArray();


                foreach ($this->permissions['data'] as $value) {
                    $this->updated_permissions[$value['id']]['name'] = $value['name'];
                    $this->updated_permissions[$value['id']]['active'] = $value['active'];
                }

            }

        } catch (\Exception $th) {
            throw $th;
        }
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
                $this->permissions = Permission::with('module')->whereModuleId($this->module_id)->paginate( $this->perPage, $this->columns, $this->pageName)->toArray();
               
                foreach ($this->permissions['data'] as $value) {
                    $this->updated_permissions[$value['id']]['name'] = $value['name'];
                    $this->updated_permissions[$value['id']]['active'] = $value['active'];
                }

            }
        } catch (\Exception $th) {
            throw $th;
        }

      

      

    }


}
