<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\MyS3;

class StoreController extends Controller
{
    public function index(Category $category,Product $product, MyS3 $myS3){
        $categories = $category->all();
        $pFeatureds = Product::featured()->get();
        $baseurl = 'https://s3.amazonaws.com/' . $myS3->bucket;
        return view('store.index',compact('categories','pFeatureds','baseurl'));
    }
}
