@extends('app')
@section('content')

    <div class="container">
        <h2>Edit Category</h2>

        @if($errors->any())

            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        {!! Form::model($category, ['route'=>['categories.update', $category->id, 'method'=>'put']]) !!}
        <input type="hidden" name="_method" value="PUT">

        @include('categories._form')

        <br>
        {!! Form::submit('Update Categoy', ['class'=>'btn btn-primary']) !!}
        <a href="{{ route('categories') }}" class="btn btn-default">Voltar</a>

        {!! Form::close() !!}


    </div>

@stop