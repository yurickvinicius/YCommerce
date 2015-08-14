@extends('app')
@section('content')

    <div class="container">
        <h2>New Images</h2>

        <a href="{{ route('products.images.create',['id'=>$product->id]) }}" class="btn btn-default">New Image</a>
        <br><br>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Extension</th>
                <th>Action</th>
            </tr>

            @foreach($product->images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td>
                        <img src="{{ url('uploads/'.$image->id.'.'.$image->extension) }}" width="80">
                    </td>
                    <td>{{ $image->extension }}</td>
                    <td>
                        <a href="{{ route('products.images.destroy', ['id'=>$image->id]) }}">Deletar</a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>

@stop