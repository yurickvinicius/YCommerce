@extends('app')
@section('content')

    <div class="container">
        <h2>Tags</h2>

        <a href="#" class="btn btn-default">New Tag</a>
        <br><br>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>

            @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a href="#">Editar</a>|
                        <a href="#">Deletar</a>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $tags->render() !!}

    </div>

@stop