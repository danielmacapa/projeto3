<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //criando os controllers do CRUD
    public function list()
    {
        $products = Product::all();
        return view('product/list', compact('products'));
    }

    public function show($uuid)
    {
        $product = Product::where('uuid', $uuid)->first();
        return view('product-show', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product-create', compact('categories'));
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'amount' => $request->amount,
            'description' => $request->description
        ]);
    }

    public function update($uuid)
    {
        $categories = Category::all();
        $product = Product::where('uuid', $uuid)->first();
        return view('product-update', compact('product', 'categories'));
    }

    public function put($uuid, Request $request)
    {
        $product = Product::where('uuid', $request->uuid)->first();

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'amount' => $request->amount,
            'description' => $request->description
        ]);
    }

    public function delete($uuid)
    {
        $product = Product::where('uuid', $uuid)->first();
        return view('product-delete', compact('product'));
    }

    public function deleteConfirm(Request $request){
        $product = Product::where('uuid', $request->uuid)->first();
        $product->delete();
    }
}