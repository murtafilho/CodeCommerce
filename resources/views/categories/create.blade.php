@extends('app')

@section('content')

    <div class="container">
        <h1>Categories Create</h1>

        {!! Form::open(['url'=>route('categories')]) !!}
        <div class="form-group">
            {!! Form::label('name','Name: ') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('desctiption','Description: ') !!}
            {!! Form::textarea('description',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add Category',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

    </div>
@endsection

