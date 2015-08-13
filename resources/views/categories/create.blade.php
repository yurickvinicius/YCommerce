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

        {!! Form::label('name','Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}

        {!! Form::label('description', 'Description: ') !!}
        {!! Form::textarea('description', null, ['class'=>'form-control']) !!}

        <br>
        {!! Form::submit('Add Categoy', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}


    </div>

@stop