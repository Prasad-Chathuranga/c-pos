<?php

namespace App\Http\Livewire\Invoice;

use App\Models\Invoice;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $invoices = Invoice::paginate(10);
        return view('livewire.invoice.index', compact('invoices'))->extends('layouts.main');
    }
}
