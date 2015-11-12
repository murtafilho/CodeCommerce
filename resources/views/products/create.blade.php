@extends('app')

@section('content')
    <div class="container">
        <h1>Products Create</h1>
        {!! Form::open(['url'=>route('products')]) !!}
        <div class="form-group">
            {!! Form::label('id_category','Category: ') !!}
            {!! Form::select('id_category',$categories,null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name','Name: ') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('desctiption','Description: ') !!}
            {!! Form::textarea('description',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('price','Price: ') !!}
            {!! Form::text('price',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('featured','Featured: ') !!}
            {!! Form::checkbox('featured',false) !!}
        </div>
        <div class="form-group">
            {!! Form::label('recommended','Recommended: ') !!}
            {!! Form::checkbox('recommended',false) !!}
        </div>
        <div class="form-group">
            {!! Form::label('tags','Tags: ') !!}
            {!! Form::textarea('tags',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add Products',['class'=>'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection

