<?php

namespace App\Http\Livewire\Modules;

use App\Models\Module;
use Livewire\Component;

class Create extends Component
{

    public $name, $active, $module_id;

    protected $rules = [
        'name'=>'required',
        'active'=>'required'
    ];

    public function render()
    {
        return view('livewire.modules.create')->extends('layouts.main');
    }

    public function resetFields(){
        $this->name = '';
        $this->active = '';
    }

    public function mount(){
        $this->module_id = request()->id;

        if($this->module_id){
            $module = Module::findOrFail($this->module_id);
            $this->name = $module->name;
            $this->active = $module->active;
        }
    }

    public function saveModule(){
        $this->validate();

        try {
            $module = new Module();
            $module->name = $this->name;
            $module->active = $this->active;
            $module->save();
            

            if($module){
                flash()->addSuccess('Module Created Successfully', 'Success');
                $this->resetFields();
            }
        } catch (\Exception $th) {
            throw $th;
        }

    }

    public function updateModule(){
        try {
            $module = Module::whereId($this->module_id)->update([
                'name'=> $this->name,
                'active'=>$this->active
            ]);

            if ($module) {
                flash()->option('timer', 500);
                flash()->addSuccess('Module Updated Successfully', 'Success');
                return redirect()->back();
            }


        } catch (\Exception $th) {
            throw $th;
        }
    }
}
