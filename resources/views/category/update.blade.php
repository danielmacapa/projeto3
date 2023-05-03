<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Categorias</title>
</head>

<body>
    <h1>Formulário de Alteração</h1>
    <form class="form" method="post" action="{{ route('category.put') }}">
        @csrf
        <!-- expira sessão-->
        @method('PUT')
        <!-- habilita PUT como método -->
        <div class="form_grupo">
            <input type="hidden" name="uuid" value="{{ $category->uuid }}">
            <label class="form_label">Nome</label>
            <input type="text" name="name" value="{{ $category->name }}"><br>
            <label class="form_label">Slug</label>
            <input type="text" name="slug" value="{{ $category->slug }}"><br>
        </div>
        <div class="submit">
            <input type="hidden" name="action" value="Enviar">
            <button type="submit" name="Enviar" class="submit_btn">Salvar</button>
        </div>
    </form>

</body>

</html>
