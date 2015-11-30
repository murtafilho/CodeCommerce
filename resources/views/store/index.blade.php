@extends('store.store')
@section('categories')
    <div class="col-sm-3">
        <div class="left-sidebar">
            <h2>Categorias</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                @foreach($categories as $category)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="{{route('category.products',$category->id)}}" >{{$category->name}}</a></h4>
                        </div>
                    </div>
                @endforeach
            </div><!--/category-products-->
        </div>
    </div>
@stop
@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Em destaque</h2>
            @foreach($pFeatureds as $featured)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">


                                @if(count($featured->images))
                                    <img src="{{url('uploads/'.$featured->images->first()->id.'.'.$featured->images->first()->extension)}}" alt="" width="200" />
                                @else
                                    <img src="{{url('uploads/no-img.jpg')}}" alt="" width="200" />
                                @endif

                                <h2>R$ {{$featured->price}}</h2>
                                <p>{{$featured->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>R$ {{$featured->price}}</h2>
                                    <p>{{$featured->name}}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div><!--features_items-->
        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>
            @foreach($pRecommended as $recommended)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                @if(count($recommended->images))
                                    <img src="{{url('uploads/'.$recommended->images->first()->id.'.'.$recommended->images->first()->extension)}}" alt="" width="200" />
                                @else
                                    <img src="{{url('uploads/no-img.jpg')}}" alt="" width="200" />
                                @endif
                                <h2>R$ {{$recommended->price}}</h2>
                                <p>{{$recommended->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>R$ {{$recommended->price}}</h2>
                                    <p>{{$recommended->name}}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach;
        </div><!--recommended-->
    </div>
@stop