@extends('app')
@section('content')

    <div class="container">
        <h2>Create Image</h2>

        @if($errors->any())

            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        {!! Form::open(['route'=>['products.images.store', 'id'=>$product->id], 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}

        {!! Form::label('image','Image:') !!}
        {!! Form::file('image', null, ['class'=>'form-control']) !!}

        <br>
        {!! Form::submit('Upload Image', ['class'=>'btn btn-primary']) !!}
        <a href="{{ route('products.images', ['id'=>$product->id]) }}" class="btn btn-default">Voltar</a>

        {!! Form::close() !!}


    </div>

@stop