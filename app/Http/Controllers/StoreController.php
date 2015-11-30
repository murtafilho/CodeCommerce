<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index(){
        $categories = Category::all();
        $pFeatureds = Product::featured()->get();
        $pRecommended = Product::recommended()->get();
        return view('store.index',compact('categories','pFeatureds','pRecommended'));
    }

    public function CategoryProducts($category_id){
        $p = new Product();
        $products = $p->CategoryProducts($category_id)->get();
        $c = new Category();
        $categories = $c->all();
        $category_name = $c->find($category_id)->name;
        return view('store.category',compact('products','categories','category_name'));
    }
}
