<?php

namespace App\Http\Livewire\Invoice;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $customer_id, $customer;

    public $listeners = [
        'getCustomerInfo'
    ];

    public function render()
    {
        $customers = Customer::all();
        return view('livewire.invoice.create', compact('customers'))->extends('layouts.main');
    }

    public function getCustomer()
    {

        $term = request()->search;

        $data = Customer::select('id as id', DB::raw('CONCAT(first_name, " ", last_name) AS text'))
            ->where('first_name', 'LIKE', $term . '%')
            ->orWhere('last_name', 'LIKE', $term . '%')
            ->get()
            ->toArray();

        return response()->json(['results' => $data]);
    }

    public function getCustomerInfo($id)
    {
        $this->customer = Customer::findOrFail($id);
    }
}
