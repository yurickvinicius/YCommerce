{!! Form::label('category_id', 'Category') !!}
{!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}

{!! Form::label('name','Name:') !!}
{!! Form::text('name', null, ['class'=>'form-control']) !!}

{!! Form::label('description', 'Description: ') !!}
{!! Form::textarea('description', null, ['class'=>'form-control']) !!}

{!! Form::label('price','Price:') !!}
{!! Form::text('price', null, ['class'=>'form-control']) !!}

<br>

{!! Form::label('featured', 'Featured') !!}
{!! Form::checkbox('featured', '1') !!}

{!! Form::label('recomended', 'Recomended') !!}
{!! Form::checkbox('recomended', '1') !!}