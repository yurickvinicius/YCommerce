@extends('app')
@section('content')

    <div class="container">
        <h2>Update Product</h2>

        @if($errors->any())

            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        {!! Form::model($product, ['route'=>['products.update', $product->id, 'method'=>'put']]) !!}
        <input type="hidden" name="_method" value="PUT">

        @include('products._form')

        <br>
        {!! Form::submit('Update Product', ['class'=>'btn btn-primary']) !!}
        <a href="{{ route('products') }}" class="btn btn-default">Voltar</a>

        {!! Form::close() !!}


    </div>

@stop