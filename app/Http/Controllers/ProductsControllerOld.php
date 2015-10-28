<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use CodeCommerce\MyS3;


class ProductsController extends Controller
{
    private $products;
    private $tipo_servidor;

    public function __construct(Product $products)
    {
        $this->products = $products;
        $this->tipo_servidor = 'public_local';
    }

    public function index()
    {
        $products = $this->products->paginate(5);
        return view('products.index', compact('products'));
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $products = $this->products->fill($input);
        $products->save();
        return redirect(route('products'));

    }

    public function edit($id, Category $category)
    {
        $product = $this->products->find($id);
        $categories = $category->lists('name', 'id');
        return view('products.edit', compact('product', 'categories'));

    }

    public function update(Requests\ProductRequest $request, $id)
    {
        $input = $request->all();
        isset($input['featured']) ? $input['featured'] = 1 : $input['featured'] = 0;
        isset($input['recommended']) ? $input['recommended'] = 1 : $input['recommended'] = 0;
        $this->products->find($id)->update($input);
        return redirect(route('products'));

    }

    public function destroy($id)
    {
        $this->products->find($id)->delete();
        return redirect(route('products'));
    }

    public function images($id, MyS3 $myS3)
    {
        $product = $this->products->find($id);
        $baseurl = 'https://s3.amazonaws.com/' . $myS3->bucket;
        return view('products.images', compact('product', 'baseurl'));

    }

    public function createImage($id)
    {
        $product = $this->products->find($id);
        return view('products.create_image', compact('product'));
    }


    public function destroyImage(ProductImage $productImage, $id, MyS3 $myS3)
    {
        $client = $myS3->client;
        $bucket = $myS3->bucket;
        $image = $productImage->find($id);
        $key = $image->id . '.' . $image->extension;
        $product = $image->product;
        $image->delete();
       if($client->doesObjectExist($bucket,$key)) {
           $client->deleteObject([
               'Bucket' => $bucket,
               'Key' => $key
           ]);
           return redirect(route('products.images', ['id' => $product->id]));
       }else{
           return view('products.image_error')->with('key',$key);
       }
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    public function storeImage(MyS3 $myS3, Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image = $productImage::create(['product_id' => $id, 'extension' => $extension]);
        $path = $file->getPath() . '\\' . $file->getBasename();
        $client = $myS3->client;
        $client->putObject([
            'Bucket' => $myS3->bucket,
            'Key' => $image->id . '.' . $extension,
            'SourceFile' => $path,
            'Region' => 'sa-east-1',
            'ACL' => 'public-read'
        ]);

        return redirect()->route('products.images', ['id' => $id]);

    }


}
