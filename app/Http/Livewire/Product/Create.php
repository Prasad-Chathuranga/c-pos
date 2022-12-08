<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Create extends Component
{
    public $product_id, $name,
    $description, $quantity, $price, $category_id,
    $active;

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'quantity' => 'required|numeric',
        'price' => 'required|numeric',
        'category_id' => 'required',
        'active' => 'required',
    ];

    public function render()
    {
        $categories = Category::all();
        return view('livewire.product.create', compact('categories'))->extends('layouts.main');
    }

    public function mount()
    {
        $this->product_id = request()->id;


        if ($this->product_id) {
            $product = Product::findOrFail($this->product_id);
            $this->name = $product->name;
            $this->description = $product->description;
            $this->price = $product->price;
            $this->quantity = $product->quantity;
            $this->active = $product->active;
            $this->category_id = $product->category_id;
        }
    }


    public function resetFields()
    {
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->quantity = '';
        $this->active = '';
        $this->category_id = '';
    }
    public function saveProduct()
    {
        $this->validate();

        try {
            $product = Product::create([
                'name' => $this->name,
                'category_id' => $this->category_id,
                'description' => $this->description,
                'price' => $this->price,
                'quantity' => $this->quantity,
                'active' => $this->active ?? 0 
            ]);

            if ($product) {
                flash()->addSuccess('Product Created Successfully', 'Success');
                $this->resetFields();
            }
        } catch (\Exception $th) {
            throw $th;
        }
    }

    public function updated($propoertyName)
    {
        $this->validateOnly($propoertyName);
    }

    public function updateProduct()
    {

        try {
            $product = Product::whereId($this->product_id)->update([
                'name' => $this->name,
                'category_id' => $this->category_id,
                'description' => $this->description,
                'price' => $this->price,
                'quantity' => $this->quantity,
                'active' => $this->active ?? 0 
            ]);

            if ($product) {
                flash()->addSuccess('Product Updated Successfully', 'Success');
                return redirect()->back();
            }
        } catch (\Exception $th) {
            throw $th;
        }
    }
}
