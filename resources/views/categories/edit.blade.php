@extends('app')

@section('content')
    <div class="alert-danger">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <ul>
                <li>{{$error}}</li>
            </ul>
        @endforeach
    @endif
    </div>
    <div class="container">
        <h1>Editing Category {{$category->name}}</h1>
        {!! Form::open(['route'=>['categories.update',$category->id],'method'=>'put'])!!}
        <div class="form-group">
            {!! Form::label('name','Name: ') !!}
            {!! Form::text('name',$category->name,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('desctiption','Description: ') !!}
            {!! Form::textarea('description',$category->description,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Save Category',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection

