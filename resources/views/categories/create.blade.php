@extends('app')
@section('content')

    <div class="container">
        <h2>Create Category</h2>

        @if($errors->any())

            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        {!! Form::open(['route'=>'categories']) !!}

        @include('categories._form')

        <br>
        {!! Form::submit('Add Categoy', ['class'=>'btn btn-primary']) !!}
        <a href="{{ route('categories') }}" class="btn btn-default">Voltar</a>

        {!! Form::close() !!}


    </div>

@stop