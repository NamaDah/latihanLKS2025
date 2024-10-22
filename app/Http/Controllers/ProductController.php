<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $product = Product::all();
        $categories = Category::all();



        return view('admin.product.index', compact('product', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();


        //
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $fileName = $request->file('image')->hashName();
        $file = $request->file('image')->storeAs('public', $fileName);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $fileName;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect()->route('product.index')->with('success', 'product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // Validate the request
        $request->validate([
            'name' => 'required'
        ]);

        // Find the category by ID
        $product = Product::findOrFail($id);

        // Update the category's name
        $product->name = $request->name;
        $product->save();

        // Redirect to the category index with a success message
        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
