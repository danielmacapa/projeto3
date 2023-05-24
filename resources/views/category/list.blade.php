@extends('template.master')

@section('title')
    Cadastro de Categorias
@endsection

@section('content')
    <table class="table">
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
    @endsection