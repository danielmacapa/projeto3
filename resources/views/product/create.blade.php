<html>
@extends('template.master')

@section('title')
    Cadastro de Produtos
@endsection

@section('content')
    <div class='container-fluid'>
        <form class='form-control' method="post" action="{{ route('product.store') }}">
            @csrf
            <div>
                <label class="form_label">Nome</label>
                <input type="text" name="name" placeholder="Nome" required><br>
                <label class="form_label">Categoria</label>
                <select name="category_id">
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option><br>
                    @empty
                    @endforelse
                </select>
                <label class="form_label">Slug</label>
                <input type="text" name="slug" placeholder="Slug" required><br>
                <label class="form_label">Preço</label>
                <input type="text" name="price" placeholder="Preço" required><br>
                <label class="form_label">Quantidade</label>
                <input type="text" name="amount" placeholder="Qde" required><br>
            </div>
            <div class="submit">
                <input type="hidden" name="action" value="Enviar">
                <button type="submit" name="Enviar" class="submit_btn">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection

</html>
