
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    <h2>Categorias</h2>
    @foreach($categories as $category)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="{{route('category.products',$category->id)}}" >{{$category->name}}</a></h4>
            </div>
        </div>
    @endforeach
</div><!--/category-products-->
