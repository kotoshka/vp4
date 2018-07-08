<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Post;
use App\Category;
use App\Product;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
//    public function __construct()
//    {
//        $lastPosts = Post::orderBy('id', 'desc')->take(3)->get();
//        View::share('lastPosts', $lastPosts);
//        $categories = Category::all();
//        View::share('categories', $categories);
////        $randProduct = Product::orderByRaw("RAND()")->get();
////        View::share('randProduct', $randProduct);
//        $lastProducts = Product::orderBy('id', 'desc')->take(3)->get();
//        View::share('lastProducts', $lastProducts);
//    }
}
