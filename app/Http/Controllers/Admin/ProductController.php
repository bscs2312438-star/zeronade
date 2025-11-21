<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index()
{
    $products = Product::all();
    return view('admin.products.index', compact('products'));
}

public function create()
{
    return view('admin.products.create');
}



public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'image' => 'nullable|image|max:2048',
    ]);

    $product = new Product();
    $product->name = $request->name;
    $product->slug = Str::slug($request->name, '-');
    $product->description = $request->description;
    $product->price = $request->price;

    if ($request->hasFile('image')) {
        $filename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $filename);
        $product->image = $filename;
    }

    $product->save();

    return redirect()->route('products.index')->with('success', 'Product added successfully!');
}

public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('admin.products.edit', compact('product'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'image' => 'nullable|image|max:2048',
    ]);

    $product = Product::findOrFail($id);
    $product->name = $request->name;
    $product->slug = Str::slug($request->name, '-');
    $product->description = $request->description;
    $product->price = $request->price;

    if ($request->hasFile('image')) {
        $filename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $filename);
        $product->image = $filename;
    }

    $product->save();

    return redirect()->route('products.index')->with('success', 'Product updated successfully!');
}


public function destroy($id)
{
    $product = Product::findOrFail($id);

    if ($product->image && file_exists(public_path('images/' . $product->image))) {
        unlink(public_path('images/' . $product->image));
    }

    $product->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
}

}
