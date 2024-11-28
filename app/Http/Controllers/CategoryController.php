<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Fetch all categories from the database
        return view('category.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create(['name' => $request->name]); 

        return redirect()->route('categories')->with('success', 'Category added successfully!');
    }

    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();

        return redirect()->route('categories')->with('success', 'Category deleted successfully!');
    }
}


