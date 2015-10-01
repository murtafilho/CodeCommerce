@extends('app')

@section('content')
    <div class="container">
        <h1>Editing Product {{$product->name}}</h1>
        {!! Form::open(['route'=>['products.update',$product->id],'method'=>'put'])!!}
        <div class="form-group">
            {!! Form::label('name','Name: ') !!}
            {!! Form::text('name',$product->name,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('desctiption','Description: ') !!}
            {!! Form::textarea('description',$product->description,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('price','Price: ') !!}
            {!! Form::text('price',$product->price,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('featured','Featured: ') !!}
            {!! Form::checkbox('featured',$product->featured,$product->featured) !!}
        </div>
        <div class="form-group">
            {!! Form::label('recommend','Recommend: ') !!}
            {!! Form::checkbox('recommend',$product->recommend,$product->recommend) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Save Product',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
