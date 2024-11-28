<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Stock;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $stocks = Stock::with('category')->get(); // Eager load category data
        return view('stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $categories = Category::all(); // Retrieve all categories
        return view('stocks.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'in_stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        Stock::create($request->all());

        return redirect()->route('stocks.index')->with('success', 'Stock item added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id): View
    {
        $stock = Stock::with('category')->findOrFail($id);
        return view('stocks.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Stock  $stock
     * @return View
     */
    public function edit(Stock $stock): View
    {
        $categories = Category::all();
        return view('stocks.edit', compact('stock', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Stock  $stock
     * @return RedirectResponse
     */
    public function update(Request $request, Stock $stock): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'in_stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $stock->update($request->all());

        return redirect()->route('stocks.index')->with('success', 'Stock item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Stock  $stock
     * @return RedirectResponse
     */
    public function destroy(Stock $stock): RedirectResponse
    {
        $stock->delete();

        return redirect()->route('stocks.index')->with('success', 'Stock item deleted successfully!');
    }
}
