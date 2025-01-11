<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Stock;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $stocks = Stock::all();
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
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'barcode' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'capacity' => 'nullable|string|max:255', 
            'sell_price' => 'nullable|numeric',
            'cost' => 'nullable|numeric',
            ]);

        $validated = $request->all();

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('stocks', 'public');
            $validated['picture'] = $path;
        }

        Stock::create($validated);

        return redirect()->route('stocks.index')->with('success', 'Stock added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
{
    $stock = Stock::with('category')->find($id); // Attempt to find the stock by ID

    return view('stocks.show', compact('stock')); // Return the view with the stock
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
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'barcode' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'capacity' => 'nullable|string|max:255', 
            'sell_price' => 'nullable|numeric',
            'cost' => 'nullable|numeric',
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
