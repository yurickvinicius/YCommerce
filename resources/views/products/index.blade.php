@extends('app')
@section('content')

    <div class="container">
        <h2>Products</h2>

        <a href="{{ route('products.create') }}" class="btn btn-default">New Product</a>
        <br><br>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Action</th>
            </tr>

            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ str_limit($product->description, $limit = 60, $end = '...') }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a href="{{ route('products.edit', ['id'=>$product->id]) }}">Editar</a>|
                        <a href="{{ route('products.images', ['id'=>$product->id]) }}">Images</a>|
                        <a href="{{ route('products.tags', ['id'=>$product->id]) }}">Tags</a>|
                        <a href="{{ route('products.destroy', ['id'=>$product->id]) }}">Deletar</a>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $products->render() !!}

    </div>

@stop