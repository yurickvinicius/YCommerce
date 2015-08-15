@extends('app')
@section('content')

    <div class="container">
        <h1>Tags of {{ $product->name }}</h1>

        @if($errors->any())

            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        <a href="{{ route('products.tags_create', ['id'=>$product->id]) }}" class="btn btn-default">New Tag</a>

        <br><br>

        <table class="table">

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>

            @foreach($product->tags as $tag)
                <tr>
                    <td>{{ @$tag->id }}</td>
                    <td>
                        {{ @$tag->name }}
                    </td>
                    <td>
                        <a href="{{ route('products.tags_destroy', ['product_id'=>$product->id, 'tag_id'=>$tag->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach

        </table>

        <a href="{{ route('products') }}" class="btn btn-default">Voltar</a>

    </div>

@stop