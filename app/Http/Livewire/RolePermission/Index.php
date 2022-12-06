<?php

namespace App\Http\Livewire\RolePermission;

use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{

    public $role_id,$modules,$permission,$role_permissions=[];

    public function render()
    {
        $roles = Role::whereActive(true)->get();
        return view('livewire.role-permission.index', compact('roles'))->extends('layouts.main');
    }

    public function updateRolePermissions($permission){

   
        if(!$permission['activerm'] || $permission['activerm'] == 0):
            //Permission is activated
           $rolePermission = RolePermission::firstOrNew(['role_id' => $this->role_id , 'permission_id' => $permission['id']]);
                //Already there Ignore
            if(!$rolePermission->exists):
                $rolePermission->save();
                $this->getRolePermissions();
            endif;

            else:

                //Inactive Permission
                $rolePermission = RolePermission::where(['role_id' => $this->role_id , 'permission_id' => $permission['id']]);

            if($rolePermission):
                $rolePermission->delete();
                $this->getRolePermissions();
            endif;

        endif;

    }

    public function getRolePermissions(){

        // $this->role_permissions = RolePermission::with('permissions')->whereRoleId($this->role_id)->get();
        
        $this->modules = Module::whereActive(true)->get();

        foreach($this->modules as $module):

            foreach($module->activePermissions as &$perm ):

                if(RolePermission::where('permission_id' , $perm->id)->where('role_id' , $this->role_id)->count()):
                    $perm->activerm = 1;
                else:
                    $perm->activerm = 0;
                endif;

            endforeach;

        endforeach;

        // $this->role_permissions = RolePermission::whereRoleId($this->role_id)->get();

       


    }

    public function save(){
        dd($this->role_permissions);
    }

  

}
