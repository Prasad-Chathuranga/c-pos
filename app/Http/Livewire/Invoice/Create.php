<?php

namespace App\Http\Livewire\Invoice;

use App\Models\Customer;
use Livewire\Component;

class Create extends Component
{
    public $customer_id;
    public function render()
    {
        $customers = Customer::all();
        return view('livewire.invoice.create',compact('customers'))->extends('layouts.main');
    }

    public function getCustomer(){
        dd($this->customer_id);
    }
}
