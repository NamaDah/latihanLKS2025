<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category = Category::all();

        return view('admin.category.index', compact('category'));
        // return response()->json([
        //     'status' => '200',
        //     'message' => 'success',
        //     'data' => $category,
        // ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required'
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index')->with('success', 'Category created successfully');



        // $category = Category::create($request->all());

        // return view('admin.category.create');

        // return response()->json([
        //     'status' => '201',
        //     'message' => 'Category created successfully',
        //     'data' => $category,
        // ], 201);
    }

    public function suki()
    {
        return view('admin.category.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required'
        ]);

        // Find the category by ID
        $category = Category::findOrFail($id);

        // Update the category's name
        $category->name = $request->name;
        $category->save();

        // Redirect to the category index with a success message
        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully');

    }
}
