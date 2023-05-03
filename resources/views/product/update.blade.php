<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Produtos</title>
</head>

<body>
    <h1>Formulário de Alteração</h1>
    <form class="form" method="post" action="{{ route('product.put') }}">
        @csrf
        @method('PUT')
        <div class="form_grupo">
            <input type="hidden" name="uuid" value="{{ $product->uuid }}">
            <label class="form_label">Nome</label>
            <input type="text" name="name" value="{{ $product->name }}"><br>
            <label class="form_label">Categoria</label>
            <select name="category_id">
                @forelse ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>
                        {{ $category->name }}</option><br>
                @empty
                @endforelse
            </select>
            <label class="form_label">Slug</label>
            <input type="text" name="slug" value="{{ $product->slug }}"><br>
            <label class="form_label">Preço</label>
            <input type="text" name="price" value="{{ $product->price }}"><br>
            <label class="form_label">Quantidade</label>
            <input type="text" name="amount" value="{{ $product->amount }}"><br>
        </div>
        <div class="submit">
            <input type="hidden" name="action" value="Enviar">
            <button type="submit" name="Enviar" class="submit_btn">Alterar</button>
        </div>
    </form>

</body>

</html>
