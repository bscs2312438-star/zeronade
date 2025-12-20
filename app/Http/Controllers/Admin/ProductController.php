<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display all products with simple search
    public function index(Request $request)
    {
        $search = $request->search;

        $products = Product::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%$search%")
                ->orWhere('slug', 'like', "%$search%");
        })->get();

        if ($request->ajax()) {
            return view('admin.products.partials.product_rows', compact('products'))->render();
        }

        return view('admin.products.index', compact('products', 'search'));
    }

    // Show create form
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'nullable|exists:categories,id',
            'new_category' => 'nullable|string|unique:categories,name',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->filled('new_category')) {
            $category = Category::create([
                'name' => $request->new_category,
                'slug' => Str::slug($request->new_category)
            ]);
            $categoryId = $category->id;
        } else {
            $categoryId = $request->category_id;
        }

        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $categoryId;

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $filename);
            $product->image = $filename;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Update product
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'nullable|exists:categories,id',
            'new_category' => 'nullable|string|unique:categories,name',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->filled('new_category')) {
            $category = Category::create([
                'name' => $request->new_category,
                'slug' => Str::slug($request->new_category)
            ]);
            $categoryId = $category->id;
        } else {
            $categoryId = $request->category_id;
        }

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $categoryId;

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $filename);
            $product->image = $filename;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // Delete product
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

