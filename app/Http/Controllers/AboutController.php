<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class AboutController extends BaseController
{
    public function index()
    {
        $title = 'О компании';
        View::share('title', $title);
        return view('about');
    }
}
