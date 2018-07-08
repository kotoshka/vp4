<?php

namespace App\Http\Controllers;

use App\Classes\ImageHandler;
use App\Events\PostPostedEvent;
use App\Product;
use App\Category;
use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends BaseController
{
    public function index(Request $request)
    {
        $data = [];
        $categories = Category::all();
        $title = 'Категории';
        $data['categories'] = $categories;
        View::share('title', $title);
        return view('category.index', $data);
    }
    public function admin()
    {
        $products = Category::all();
        $data['categories'] = $products;
        $title = 'Категории товаров';
        View::share('title', $title);
        return view('category.admin', $data);
    }
    public function detail(Request $request)
    {
        $products = Product::where('category_id', '=', $request->id)->paginate(6);
        $category = Category::find($request->id);
        $title = $category->name;
        $data['products'] = $products;
        $data['category'] = $category;
        View::share('title', $title);
        return view('category.detail', $data);
    }
    public function create()
    {
        $title = 'Добавление категории';
        View::share('title', $title);
        return view('category.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        if (!empty($_FILES)) {
            $file = Category::uploadFile($_FILES['image']);
        }
        Category::storeCategory($request->name, $request->get('description'), $file);
        return redirect()->route('category.index');
    }
    public function delete(Request $request)
    {
        Category::destroy($request->id);
        return redirect()->route('category.admin');
    }
    public function edit(Request $request)
    {
        $data['category'] = Category::find($request->id);
        return view('category.edit', $data);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        $newdata = ['name' => $request->name, 'description' => $request->get('description')];
        if (!empty($_FILES)) {
            $file = Category::uploadFile($_FILES['photo']);
            $newdata['photo'] = $file;
        }
        Category::find($request->id)->update($newdata);
        return redirect()->route('category.index');
    }
}
