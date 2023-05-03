<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excluir Produto</title>
</head>

<body>
    Deseja realmente excluir o produto: {{ $product->name }} ?<br><br>

    <form method="POST" action="{{ route('product.destroy') }}">
        @csrf
        <input type="hidden" name="uuid" value="{{ $product->uuid }}">
        <button type="submit">Confirmar exclusão</button>
    </form>

</body>

</html>
