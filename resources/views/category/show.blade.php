<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalhes da Categoria</title>
</head>

<body>
    <h1>Detalhes</h1>
    Nome: {{ $category->name }}<br>
    Slug: {{ $category->slug }}<br>
    UUID: {{ $category->uuid }}<br>
    Descrição: {{ $category->description }}<br>
    Criado em: {{ $category->created_at }}<br>
    Atualizado em: {{ $category->updated_at }}<br>

    <h1>Produtos de {{ $category->name }} </h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>slug</th>
            <th>Preço</th>
            <th>Qde</th>
            <th>Descrição</th>
        </tr>
        @forelse ($category->products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->slug }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->amount }}</td>
                <td>{{ $product->description }}</td>
                <!-- As duas views abaixo requerem uuid do registro, conforme rota -->
                <td><a href="{{ route('product.update', $product->uuid) }}">Editar</a></td>
                <td><a href="{{ route('product.delete', $product->uuid) }}">Excluir</a></td>

            </tr>
        @empty
            <tr>
                <td colspan=2>Não encontramos registros.</td>
            </tr>
        @endforelse
    </table>
    {{ auth()->user()->id }}

</body>

</html>
