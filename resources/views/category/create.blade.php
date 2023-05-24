@extends('template.master')

@section('title')
    Cadastro de Categorias
@endsection

@section('content')
    <div class='container-fluid'>
    <form class="form" method="post" action="{{ route('category.store') }}">
        @csrf
        <div class="form_grupo">
            <label class="form_label">Nome</label>
            <input type="text" name="name" placeholder="Nome" required><br>
            <label class="form_label">Slug</label>
            <input type="text" name="slug" placeholder="Slug" required><br>
        </div>
        <div class="submit">
            <input type="hidden" name="action" value="Enviar">
            <button type="submit" name="Enviar" class="submit_btn">Cadastrar</button>
        </div>
    </form>
    </div>
@endsection
