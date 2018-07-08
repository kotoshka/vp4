<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Post;
use App\Category;
use App\Product;
use View;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
    }
}
