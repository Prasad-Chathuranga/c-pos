<?php

namespace App\Http\Livewire\Roles;

use App\Models\Role;
use Livewire\Component;

class Create extends Component
{

    public $name, $active, $role_id;

    protected $rules = [
        'name'=>'required',
        'active'=>'required'
    ];

    public function render()
    {
        return view('livewire.roles.create')->extends('layouts.main');
    }

    public function resetFields(){
        $this->name = '';
        $this->active = '';
    }

    public function mount(){
        $this->role_id = request()->id;

        if($this->role_id){
            $role = Role::findOrFail($this->role_id);
            $this->name = $role->name;
            $this->active = $role->active;
        }
    }

    public function saveUserRole(){
        $this->validate();

        try {
            $role = new Role();
            $role->name = $this->name;
            $role->active = $this->active;
            $role->save();
            

            if($role){
                flash()->addSuccess('Role Created Successfully', 'Success');
                $this->resetFields();
            }
        } catch (\Exception $th) {
            throw $th;
        }

    }

    public function updateUserRole(){
        try {
            $role = Role::whereId($this->role_id)->update([
                'name'=> $this->name,
                'active'=>$this->active
            ]);

            if ($role) {
                flash()->option('timer', 500);
                flash()->addSuccess('Role Updated Successfully', 'Success');
                return redirect()->back();
            }


        } catch (\Exception $th) {
            throw $th;
        }
    }
}
