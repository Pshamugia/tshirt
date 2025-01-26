<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        return view('cart.index', compact('cartItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = new Cart();
        $cart->user_id = auth()->id();
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;
        $cart->total_price = Product::find($request->product_id)->price * $request->quantity;
        $cart->save();

        return back()->with('success', 'Item added to cart successfully!');
    }
}
