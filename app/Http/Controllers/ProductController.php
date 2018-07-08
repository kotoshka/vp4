<?php

namespace App\Http\Controllers;

use App\Classes\ImageHandler;
use App\Events\PostPostedEvent;
use App\Product;
use App\Category;
use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends BaseController
{
    public function index(Request $request)
    {
        if($request->id) {
            $product = Product::find($request->id);
        } else {
            abort(404);
        }
        $title = $product->name;
        $data['product'] = $product;
        View::share('title', $title);
        return view('product.index', $data);
    }

    public function admin()
    {
        $products = Product::all();
        $data['products'] = $products;
        $title = 'Товары';
        View::share('title', $title);
        return view('product.admin', $data);
    }

    public function create()
    {
        $title = 'Добавление товара';
        View::share('title', $title);
        return view('product.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        if (!empty($_FILES)) {
            $file = Product::uploadFile($_FILES['image']);
        }
        $prod_id = Product::storeProduct($request->name, $request->get('description'), $file, (int)$request->get('price'), (int)$request->get('category'));
        return redirect()->route('product.index', ['id' => $prod_id]);
    }

    public function delete(Request $request)
    {
        Product::destroy($request->id);
        return redirect()->route('product.admin');
    }

    public function edit(Request $request)
    {
        $data['product'] = Product::find($request->id);
        return view('product.edit', $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        $newdata = [
            'name' => $request->name,
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'category_id' => $request->get('category')
        ];
        if (!empty($_FILES)) {
            $file = Product::uploadFile($_FILES['photo']);
            $newdata['photo'] = $file;
        }
        Product::find($request->id)->update($newdata);
        return redirect()->route('product.index', ['id' => $request->id]);
    }

    public function search(Request $request)
    {
        $searchData = $request->searchData;
        $data = Product::where('products.name', 'like', '%' . $searchData . '%')
            ->paginate(6);
        $title = 'Поиск';
        View::share('title', $title);
        return view('product.search', [
            'findProducts' => $data,
            'searchString' => $searchData
        ]);
    }
}
