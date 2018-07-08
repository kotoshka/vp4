<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\User;

class OrderController extends BaseController
{
    public function index()
    {
        $email = Auth::user()->email;
        $orders = Order::where('user_email', '=', $email)->paginate(3);
        $data['orders'] = $orders;
        return view('order.index', $data);
    }

    public function admin()
    {
        $data['admin_email'] = Auth::user()->email;
        $orders = Order::all();
        $data['orders'] = $orders;
        return view('order.admin', $data);
    }

    public function email(Request $request)
    {
        $adminId = Auth::user()->id;
        User::where('id', $adminId)->update(array('email' => $request->email));
        return redirect()->route('order.admin');
    }
}
