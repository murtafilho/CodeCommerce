<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $products;
    public function __construct(Product $products){
        $this->products = $products;
    }
    public function index(){
        $products = $this->products->paginate(5);
        return view('products.index',compact('products'));
    }
    public function create(Category $category){
        $categories = $category->lists('name','id');
        return view('products.create',compact('categories'));
    }
    public function store(Request $request){
        $input = $request->all();
        $products = $this->products->fill($input);
        $products->save();
        return redirect(route('products'));

    }
    public function edit($id,Category $category){
        $product = $this->products->find($id);
        $categories = $category->lists('name','id');
        return view('products.edit',compact('product','categories'));

    }
    public function update(Requests\ProductRequest $request, $id){
        $input = $request->all();
        isset($input['featured']) ? $input['featured'] = 1 : $input['featured'] = 0;
        isset($input['recommended'])? $input['recommended'] = 1: $input['recommended'] = 0;
        $this->products->find($id)->update($input);
        return redirect(route('products'));

    }
    public function destroy($id){
        $this->products->find($id)->delete();
        return redirect(route('products'));
    }
}
