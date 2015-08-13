@extends('app')
@section('content')

<div class="container">
    <h2>Categories</h2>

    <a href="{{ route('categories.create') }}" class="btn btn-default">New Category</a>
    <br><br>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>

        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td></td>
        </tr>
        @endforeach
    </table>
</div>

@stop