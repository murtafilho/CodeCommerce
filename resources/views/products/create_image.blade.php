@extends('app')

@section('content')
    <div class="container">
        <h1>{{$product->name}} - Image Create</h1>
        {!! Form::open(['route'=>['products.images.store',$product->id],'method'=>'post','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {!! Form::label('image','Image: ') !!}
            {!! Form::file('image',null,['class'=>'form_controll']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Upload Image',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection

