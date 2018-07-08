<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Order;
use App\User;
use View;

class CartController extends BaseController
{
    public function order(Request $request)
    {
        $productsIds = $request->session()->get('products');
        if ($request->session()->get('totalSum')) {
            $totalCartSum = array_sum($request->session()->get('totalSum'));
        }
        $user = Auth::user();
        $data['email'] = ($user) ? $user->email : '';
        if (!empty($productsIds)) {
            $products = Product::whereIn('id', $productsIds)->get();
            $data['products'] = $products;
            $data['products_ids'] = json_encode(array_unique($productsIds));
            $data['totalCartSum'] = $totalCartSum;
            $data['empty_cart'] = '';
        } else {
            $data['products'] = '';
            $data['products_ids'] = '';
            $data['totalCartSum'] = '';
            $data['empty_cart'] = 'Ваша корзина пуста!';
        }
        return view('cart.order', $data);
    }

    public function index(Request $request)
    {
        if (!empty($request->id)) {
            $request->session()->push('products', $request->id);
            $product = Product::find($request->id);
            $request->session()->push('totalSum', $product->price);
        }
        return redirect()->route('cart.order');
    }

    public function ordermake(Request $request)
    {
        $this->validate($request, [
            'products' => 'required',
            'email' => 'required',
            'sum' => 'required',
        ]);
        $admins = User::where('role', '=', 1)->get();
        $arEmails = [];
        foreach($admins as $admin) {
            $arEmails[] = $admin->email;
        }
        Order::storeOrder($request->get('products'), $request->get('email'), $request->get('sum'), $arEmails);

        $request->session()->pull('products');
        $request->session()->pull('totalSum');
        return redirect()->route('cart.order');
    }
}
