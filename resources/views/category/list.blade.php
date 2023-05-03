<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de categorias</title>
</head>

<body>
    <h1>Lista de categorias</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>slug</th>
        </tr>
        @forelse ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ count($category->products) }} Produtos</td>
                <!-- As três views abaixo requerem uuid do registro, conforme rota -->
                <td><a href="{{ route('category.show', $category->uuid) }}">Detalhes</a></td>
                <td><a href="{{ route('category.update', $category->uuid) }}">Editar</a></td>
                <td><a href="{{ route('category.delete', $category->uuid) }}">Excluir</a></td>
            </tr>
        @empty
            <tr>
                <td colspan=2>Não encontramos registros.</td>
            </tr>
        @endforelse
    </table>
</body>

</html>
