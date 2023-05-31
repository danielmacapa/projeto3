<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

// as funções comentadas não são usadas pela API
    //criando os controllers do CRUD
    public function list()
    {
        $categories = Category::all();
        return $categories;
        // retorna a variável e não mais uma view
    }
    public function show($uuid)
    {
        $category = Category::where('uuid', $uuid)->first();
        return $category;
    }
    // public function create()
    // {
    //     return view('category/create');
    // }
    public function store(Request $request)
    {
        // regras de validação (precisa pedir para mostrar o erro, está no master template)
        $request->validate([
            'name' => 'required|string|min:5|max:10',
            'slug' => 'required|string'
        ]);

        $logged = auth()->user();

        $category = Category::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description
        ]);
        return redirect()->route('category.list')
        ->with('success', 'Categoria cadastrada com sucesso!');
        // with: mensagem

    }

    // public function update($uuid)
    // {
    //     $category = Category::where('uuid', $uuid)->first();
    //     return view('category/update', compact('category'));
    // }

    public function put(Request $request)
    {
        $category = Category::where('uuid', $request->uuid)->first();

        $request->validate([
            'name' => 'required|string|min:5|max:10',
            'slug' => 'required|string'
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description
        ]);
        return redirect()->route('category.list');
    }

    // public function delete($uuid)
    // {
    //     $category = Category::where('uuid', $uuid)->first();
    //     return view('category/delete', compact('category'));
    // }

    public function destroy(Request $request)
    {
        //utiliza-se a função first porque $request virá em forma de array
        $category = Category::where('uuid', $request->uuid)->first();
        $category->delete();
        return redirect()->route('category.list');
    }
}
