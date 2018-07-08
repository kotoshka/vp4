<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Post;
use App\Category;
use App\Product;
use View;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $this->middleware('guest');
    }
}
