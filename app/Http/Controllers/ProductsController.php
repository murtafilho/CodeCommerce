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

class ProductsController extends Controller
{
    protected $products;
    protected $relatedTagsIds;

    public function __construct(Product $products)
    {
        $this->products = $products;
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

    public function store(Request $request,Tag $tagModel)
    {
        $input = $request->all();
        $product = $this->products->fill($input);
        $product->save();
        $tags = explode(',',$request['tags']);
        $ids = $tagModel->listTagsIds($tags);
        $product->tags()->attach($ids);
        return redirect(route('products'));
    }

    public function edit($id, Category $category)
    {
        $product = $this->products->find($id);
        $categories = $category->lists('name', 'id');
        return view('products.edit', compact('product', 'categories'));

    }

    public function update(Requests\ProductRequest $request, $id,Tag $tagModel)
    {
        $input = $request->all();
        isset($input['featured']) ? $input['featured'] = 1 : $input['featured'] = 0;
        isset($input['recommended']) ? $input['recommended'] = 1 : $input['recommended'] = 0;
        $this->products->find($id)->update($input);
        $tags = explode(',',$input['tags']);
        $ids = $tagModel->listTagsIds($tags);
        $this->products->find($id)->tags()->sync($ids);
        return redirect(route('products'));
    }

    public function destroy($id)
    {
        $this->products->find($id)->delete();
        return redirect(route('products'));
    }

    public function images($id)
    {
        $product = $this->products->find($id);
        //$baseurl = 'https://s3.amazonaws.com/code-commerce';
        return view('products.images', compact('product', 'baseurl'));

    }

    public function createImage($id)
    {
        $product = $this->products->find($id);
        return view('products.create_image', compact('product'));
    }



    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);
        $strFile = $image->id . '.' . $image->extension;
        $disk = Storage::disk('public_local');
        if(file_exists(public_path().'downloads/'.$strFile)) {
            $disk->delete($strFile);//apaga o arquivo
        }
        $image->delete();//apaga o registro no banco
        return redirect(route('products.images', ['id' => $image->product_id]));

    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image = $productImage::create(['product_id' => $id, 'extension' => $extension]);
        $contents = File::get($file);
        $disk = Storage::disk('public_local');
        $disk->put($image->id . '.' . $extension, $contents);
        return redirect(route('products.images', ['id' => $id]));
    }
}
