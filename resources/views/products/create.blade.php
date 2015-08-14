@extends('app')
@section('content')

    <div class="container">
        <h2>Create Product</h2>

        @if($errors->any())

            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        {!! Form::open(['route'=>'products']) !!}

        @include('products._form')

        <br>
        {!! Form::submit('Add Product', ['class'=>'btn btn-primary']) !!}
        <a href="{{ route('products') }}" class="btn btn-default">Voltar</a>

        {!! Form::close() !!}


    </div>

@stop