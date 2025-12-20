<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

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
        $request->validate([
            'fullname' => 'required|string',
            'account' => 'required|string',
            'address' => 'required|string',
        ]);

        $cart = session('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('message', 'Cart is empty!');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * ($item['quantity'] ?? 1);
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'fullname' => $request->fullname,
            'account_number' => $request->account,
            'address' => $request->address,
            'total_amount' => $total,
            'status' => 'Pending',
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'] ?? 1,
            ]);
        }

        session()->forget('cart');
        session(['message' => '✅ Order placed successfully! ID: ' . $order->id]);
        return redirect()->route('cart.index');
    }
}
