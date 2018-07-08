<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class IndexController extends BaseController
{
    public function index()
    {
        $data['products'] = Product::paginate(6);
        return view('welcome', $data);
    }
}
