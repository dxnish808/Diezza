<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestockController extends Controller
{
    // Show the list of restocks
    public function index()
    {
        // Example: Fetch all restock records (replace with your logic)
        // $restocks = Restock::all();

        return view('restock.index', [

        ]);
    }

    // Show the form to add a new restock
    public function create()
    {
        return view('restock.create');
    }

    // Store the new restock
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'supplier' => 'required|string|max:255',
        ]);

        // Example: Save the restock record (replace with your logic)
        // Restock::create($request->all());

        return redirect()->route('restocks.index')->with('success', 'Restock added successfully!');
    }

    public function show($id)
    {
        // Example data for demonstration
        $restock = [
            'id' => $id,
            'stocks' => [
                ['name' => 'Widget A', 'quantity' => 50, 'cost' => 200.00],
                ['name' => 'Widget B', 'quantity' => 30, 'cost' => 150.00],
            ],
            'vendor' => [
                'name' => 'Supplier X',
                'location' => '123 Supplier St, Cityville',
                'phone' => '123-456-7890',
                'email' => 'supplierx@example.com',
            ],
        ];

        return view('restock.show', compact('restock'));
    }

    // In RestockController.php

public function showReturnPage()
{
    return view('restocks.return');
}

public function processReturn(Request $request)
{
    $request->validate([
        'stock_quantity' => 'required|integer|min:1',
        'reason' => 'required|string|max:255',
    ]);

    return redirect()->route('restocks.index')->with('success', 'Return processed successfully.');
}

}

