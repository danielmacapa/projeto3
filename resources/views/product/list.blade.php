    <html>
    @extends('template.master')

    @section('title')
        Lista de Produtos
    @endsection

    @section('content')
        <div class='container-fluid'>
            <a class='btn btn-primary btn-sm' href="{{ route('product.create') }}"><i class='fa fa-plus'></i> Cadastrar Novo
            </a>
            <div class="card">
                <table class="table table-lg">
                    <tr class="table-primary">
                        <th>Nome</th>
                        <th>slug</th>
                        <th>Preço</th>
                        <th colspan="4">Categoria</th>
                    </tr>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->slug }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td><a href="{{ route('product.show', $product->uuid) }}"><i class='fa fa-eye'></i></a></td>
                            <td><a href="{{ route('product.update', $product->uuid) }}"><i class='fa fa-edit'></a></td>
                            <td><a href="{{ route('product.delete', $product->uuid) }}"><i class='fa fa-trash'></a></td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan=7>Não encontramos registros.</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    @endsection

    </html>
