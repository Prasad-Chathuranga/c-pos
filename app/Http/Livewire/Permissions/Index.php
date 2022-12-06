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
        'openPermissionModal','closePermissionModal','enableTextField','remove'
    ];

    public $name, $module_id,$active;
    public $permissions;

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

        $this->permissions = Permission::with('module')->whereModuleId($id)->get();
       
        foreach ($this->permissions as $value) {
            $this->updated_permissions[$value->id]['name'] = $value->name;
                    $this->updated_permissions[$value->id]['active'] = $value->active;
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
                $this->permissions = Permission::with('module')->whereModuleId(request()->serverMemo['data']['module_id'])->get();


                foreach ($this->permissions as $value) {
                    $this->updated_permissions[$value->id]['name'] = $value->name;
                    $this->updated_permissions[$value->id]['active'] = $value->active;
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
                $this->permissions = Permission::with('module')->whereModuleId($this->module_id)->get();
               
                foreach ($this->permissions as $value) {
                    $this->updated_permissions[$value->id]['name'] = $value->name;
                    $this->updated_permissions[$value->id]['active'] = $value->active;
                }

            }
        } catch (\Exception $th) {
            throw $th;
        }

      

      

    }


    public function delete($id){

        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',  
            'message' => 'Are you sure?', 
            'text' => 'If deleted, you will not be able to recover this imaginary file!',
            'id'=>$id
        ]);
      
       
        
    }

    public function remove($id){
     
         try {
            $permission = Permission::findOrFail($id);
            $permission->delete();

            $this->permissions = Permission::with('module')->whereModuleId($this->module_id)->get();
               
            foreach ($this->permissions as $value) {
                $this->updated_permissions[$value->id]['name'] = $value->name;
                $this->updated_permissions[$value->id]['active'] = $value->active;
            }
            
            flash()->addSuccess('Permission Deleted Successfully', 'Success');

            return redirect()->back();

        } catch (\Exception $th) {
            throw $th;
        }
    }
}


