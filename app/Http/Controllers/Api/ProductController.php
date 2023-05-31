<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;

class ProductController extends Controller
{

    // as funções comentadas não são usadas pela API

    //criando os controllers do CRUD
    public function list()
    {
        $products = Product::all();
        return $products;
        // retorna a variável e não mais uma view

    }

    public function show($uuid)
    {
        $product = Product::where('uuid', $uuid)->first();
        return $product;
    }

    // public function create()
    // {
    //     $categories = Category::all();
    //     return view('product/create');
    // }

    public function store(Request $request)
    {
        $validacao = FacadesValidator::make( $request->all(),
        [
            'category_id' => 'required',
            'name' => 'required|string',
            'slug' => 'required|string',
            'price' => 'numeric',
            'amount' => 'numeric'
        ]);

        if ($validacao->fails()) {
            return $validacao->errors();
        }


        $product = Product::create([
            'uuid' => Str::uuid(),
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'amount' => $request->amount,
            'description' => $request->description
        ]);
        return $product;
    }

    // public function update($uuid)
    // {
    //     $categories = Category::all();
    //     $product = Product::where('uuid', $uuid)->first();
    //     return view('product/update', compact('product', 'categories'));
    // }

    public function put(Request $request)
    {
        $product = Product::where('uuid', $request->uuid)->first();

        $validacao = FacadesValidator::make( $request->all(),
        [
            'category_id' => 'required',
            'name' => 'required|string',
            'slug' => 'required|string',
            'price' => 'numeric',
            'amount' => 'numeric'
        ]);

        if ($validacao->fails()) {
            return $validacao->errors();
        }

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'amount' => $request->amount,
            'description' => $request->description
        ]);
        return $product;
    }

    // public function delete($uuid)
    // {
    //     $product = Product::where('uuid', $uuid)->first();
    //     return view('product/delete', compact('product'));
    // }

    public function destroy(Request $request){
        $product = Product::where('uuid', $request->uuid)->first();
        $product->delete();
        return redirect()->route('product.list');
    }
}
