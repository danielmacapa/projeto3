<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalhes do Produto</title>
</head>

<body>
    <h1>Detalhes</h1>
    Nome: {{ $product->name }}<br>
    Slug: {{ $product->slug }}<br>
    UUID: {{ $product->uuid }}<br>
    Descrição: {{ $product->description }}<br>
    Criado em: {{ $product->created_at }}<br>
    Atualizado em: {{ $product->updated_at }}<br>
    <a href="{{ route('product.update', $product->uuid) }}">Editar</a>
    <a href="{{ route('product.delete', $product->uuid) }}">Excluir</a>


</body>

</html>
