<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers;

use App\Post;
use App\Category;
use App\Product;
use View;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
        $this->middleware('guest')->except('logout');
    }
}
