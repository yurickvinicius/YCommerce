@extends('app')
@section('content')

    <div class="container">
        <h1>Add Tag for product: {{ $product->name }}</h1>

        @if($errors->any())

            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        {!! Form::open(['route'=>['products.tags_store', 'id'=>$product->id], 'method'=>'post']) !!}

        {!! Form::label('tag','Tag:') !!}
        {!! Form::select('tag_id', $tags, null, ['class'=>'form-control']) !!}

        <br>
        {!! Form::submit('New Tag', ['class'=>'btn btn-primary']) !!}
        <a href="{{ route('products.tags', ['id'=>$product->id]) }}" class="btn btn-default">Voltar</a>

        {!! Form::close() !!}

    </div>

@stop