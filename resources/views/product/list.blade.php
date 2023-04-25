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

    <body>
        <h1>Aqui será a lista de produtos</h1>

        <table>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->slug }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan=4>Não encontramos registros.</td>
                </tr>
            @endforelse
        </table>

    </body>

</html>
