<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = session('cart', []);
        $message = session('message');
        return view('cart', compact('cart', 'message'));
    }

    public function add(Request $request)
    {
        $cart = session('cart', []);

        $cart[] = [
            'name' => $request->bike_name,
            'price' => $request->bike_price,
            'quantity' => 1
        ];

        session(['cart' => $cart]);

        return redirect()->route('cart.index');
    }

    public function remove(Request $request)
    {
        $cart = session('cart', []);
        unset($cart[$request->remove]);
        $cart = array_values($cart);
        session(['cart' => $cart]);

        return redirect()->route('cart.index');
    }

    public function update(Request $request)
    {
        $cart = session('cart', []);
        $index = $request->index;
        $quantity = max(1, (int)$request->quantity);

        if(isset($cart[$index])) {
            $cart[$index]['quantity'] = $quantity;
        }

        session(['cart' => $cart]);
        return redirect()->route('cart.index');
    }

    public function checkout(Request $request)
    {
        session()->forget('cart');
        session(['message' => '✅ Checkout complete! Your order has been processed.']);
        return redirect()->route('cart.index');
    }
}
