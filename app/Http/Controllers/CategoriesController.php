<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;

class CategoriesController extends Controller
{
    protected $category;
    public function __construct(Category $category){
        $this->category = $category;
    }
    public function index(){
        $categories = $this->category->paginate(5);
        return view('categories.index',compact('categories'));
    }
    public  function create(){
        return view('categories.create');
    }
    public  function store(Requests\CategoryRequest $request){

        $input = $request->all();
        $category = $this->category->fill($input);
        $category->save();
        return redirect(route('categories'));
    }
    public function edit($id){
        $category = $this->category->find($id);
        return view('categories.edit',compact('category'));

    }
    public function update(Requests\CategoryRequest $request, $id){
        $this->category->find($id)->update($request->all());
        return redirect(route('categories'));
    }
    public function destroy($id){
        $this->category->find($id)->delete();
        return redirect(route('categories'));
    }

}
