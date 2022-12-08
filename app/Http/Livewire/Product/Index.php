<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $products = Product::with('category')->paginate(10);
        return view('livewire.product.index', compact('products'))->extends('layouts.main');
    }
}
