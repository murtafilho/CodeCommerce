@extends('app')

@section('content')
    <div class="container">
        <h1>Images of {{$product->name.' Categoria: '.$product->category->name}}</h1>
        <a href="{{route('products.images.create',$product->id)}}" class="btn btn-default">New Image</a>
        <br><br>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Extension</th>
                <th>Action</th>
            </tr>
            @foreach($product->images as $image)
                <tr>
                    <td>{{$image->id}}</td>
                    <td><img src="{{ url($baseurl.'/'.$image->id.'.'.$image->extension)}}" width="200"></td>
                    <td>{{$image->extension}}</td>
                    <td><a href="{{route('products.images.destroy',['id'=>$image->id])}}">Delete</a></td>
                </tr>
            @endforeach
        </table>
        <a href="{{route('products')}}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span>Back</a>
    </div>
@endsection




