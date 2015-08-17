@extends('app')
@section('content')

    <div class="container">
        <h2>Update Tag</h2>

        @if($errors->any())

            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        {!! Form::model($tag,['route'=>['tags.update', $tag->id,'method'=>'put']]) !!}
        <input type="hidden" name="_method" value="PUT">

        {!! Form::label('name','Name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}

        <br>
        {!! Form::submit('Upate Tag', ['class'=>'btn btn-primary']) !!}
        <a href="{{ route('tags') }}" class="btn btn-default">Voltar</a>

        {!! Form::close() !!}


    </div>

@stop