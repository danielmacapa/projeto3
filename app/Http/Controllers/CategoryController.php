<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //criando os controllers do CRUD
    public function list()
    {
        $categories = Category::all();
        return view('category/list', compact('categories'));
    }
    public function show($uuid)
    {
        $category = Category::where('uuid', $uuid)->first();
        return view('category/show', compact('category'));
    }
    public function create()
    {
        return view('category/create');
    }
    public function store(Request $request)
    {
        $category = Category::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description
        ]);
        return redirect()->route('category.list');
    }

    public function update($uuid)
    {
        $category = Category::where('uuid', $uuid)->first();
        return view('category/update', compact('category'));
    }

    public function put(Request $request)
    {
        $category = Category::where('uuid', $request->uuid)->first();

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description
        ]);
        return redirect()->route('category.list');
    }

    public function delete($uuid)
    {
        $category = Category::where('uuid', $uuid)->first();
        return view('category/delete', compact('category'));
    }

    public function destroy(Request $request)
    {
        //utiliza-se a função first porque $request virá em forma de array
        $category = Category::where('uuid', $request->uuid)->first();
        $category->delete();
        return redirect()->route('category.list');
    }
}
