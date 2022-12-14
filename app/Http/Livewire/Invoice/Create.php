<?php

namespace App\Http\Livewire\Invoice;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $customer_id, $customer, $category, $product_id, $products,$productsArray=[], $category_idx;
    private $category_id;
    public $company;

    public $listeners = [
        'getCustomerInfo','getCategoryInfo','getProductInfo','getProducts','selectedCompanyItem'
    ];

    public function render()
    {
        $customers = Customer::all();
        $categories = Category::whereActive(1)->get();
        return view('livewire.invoice.create', compact('customers','categories'))->extends('layouts.main');
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

    public function getCategory()
    {
        $term = request()->search;

        $data = Category::select('id as id','name AS text')
            ->where('name', 'LIKE', $term . '%')
            ->whereActive(1)
            ->get()
            ->toArray();

        return response()->json(['results' => $data]);
    }

    public function getProducts($id)
    {
        $this->products = Product::whereCategoryId($id)
            ->whereActive(1)
            ->get();

        return $this->products;
    }

    public function getCustomerInfo($id)
    {
        $this->customer = Customer::findOrFail($id);
    }

    // public function getProductInfo($id)
    // {
    //     $this->product_id = $id;
    //     $this->product = Product::findOrFail($id);
    //     $this->productsArray[$id] = $this->product;
    // }


    public function getCategoryInfo($id)
    {
        
        $this->category_id = $id;
        $this->category = Category::findOrFail($id);

    }

    public function selectedCompanyItem($item)
    {
        if ($item) {
            $this->company = Category::find($item);
            // $this->emit('selectedCompanyId', $this->company->id);
            $this->products = Product::whereActive(1)->whereCategoryId($item)->get();
        }
        else
            $this->company = null;
    }

 
    public function hydrate()
    {
        $this->emit('select2');
    }
    
}
