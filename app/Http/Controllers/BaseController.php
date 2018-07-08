<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Product;
use View;

class BaseController extends Controller
{
    public function __construct()
    {
        $lastPosts = Post::orderBy('id', 'desc')->take(3)->get();
        View::share('lastPosts', $lastPosts);
        $categories = Category::all();
        View::share('categories', $categories);
        $randProduct = Product::orderByRaw("RAND()")->first();
        View::share('randProduct', $randProduct);
        $lastProducts = Product::orderBy('id', 'desc')->take(3)->get();
        View::share('lastProducts', $lastProducts);
    }
}
