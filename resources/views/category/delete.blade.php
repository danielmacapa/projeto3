<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excluir Categoria</title>
</head>

<body>
    Deseja realmente excluir a categoria: {{ $category->name }} ?<br><br>

    @if (count($category->products) > 0)
        Esta categoria possui {{ count($category->products) }} produto(s).<br>
        Você não pode excluí-la!<br><br>
    @else
        <form method="POST" action="{{ route('category.destroy') }}">
            @csrf
            <input type="hidden" name="uuid" value="{{ $category->uuid }}">
            <button type="submit">Confirmar exclusão</button>
        </form>
    @endif

</body>

</html>
