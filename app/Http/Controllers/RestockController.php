<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Stock;
use Carbon\Carbon;


class RestockController extends Controller
{

    public function index()
    {
        $groups = Stock::where('status', 1)
                    ->select('order_group_id', 'created_at', 'arrival_date')
                    ->groupBy('order_group_id', 'created_at', 'arrival_date')
                    ->orderByDesc('created_at')
                    ->get();

        return view('restocks.index', compact('groups'));
    }


    public function create()
    {
        $items = Stock::distinct()->pluck('name'); // get unique stock names
        $orderList = session()->get('orderList', []);
        return view('restocks.create', compact('items', 'orderList'));
    }

    public function addItem(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        $orderList = session()->get('orderList', []);
        $orderList[] = [
            'name' => $request->name,
            'quantity' => $request->quantity,
        ];
        session()->put('orderList', $orderList);

        return redirect()->route('restocks.create')->with('success', 'Item added!');
    }

    public function removeItem($index)
    {
        $orderList = session()->get('orderList', []);
        unset($orderList[$index]);
        session()->put('orderList', array_values($orderList)); // Reindex
        return redirect()->route('restocks.create')->with('success', 'Item removed!');
    }

    public function submitOrder(Request $request)
    {
        $orderItems = session('orderList', []);
        $arrivalDate = Carbon::parse($request->input('arrival_date'));
        
        // Generate meaningful order ID
        $today = now();
        $latestOrder = Stock::whereDate('created_at', $today)
            ->orderByDesc('created_at')
            ->first();
        
        $increment = 1;
        if ($latestOrder) {
            // Extract increment from existing order ID
            $lastIncrement = (int) substr($latestOrder->order_group_id, -2);
            $increment = $lastIncrement + 1;
        }
        
        $orderGroupId = 'ORD' . $today->format('md') . str_pad($increment, 2, '0', STR_PAD_LEFT);
        
        foreach ($orderItems as $item) {
            $stock = Stock::where('name', $item['name'])->first();
    
            if ($stock) {
                Stock::create([
                    'name' => $stock->name,
                    'quantity' => $item['quantity'],
                    'arrival_date' => $arrivalDate,
                    'order_group_id' => $orderGroupId,
                    'status' => 1,
                    'created_at' => $today,
                    'updated_at' => $today,
                    'category_id' => $stock->category_id,
                    'barcode' => $stock->barcode,
                    'brand' => $stock->brand,
                    'capacity' => $stock->capacity,
                    'cost' => $stock->cost,
                    'sell_price' => $stock->sell_price,
                ]);
            }
        }
    
        session()->forget('orderList');
        return redirect()->route('restocks.index')->with('success', 'Order submitted successfully!');
    }

public function destroyGroup($order_group_id)
{
    Stock::where('order_group_id', $order_group_id)
        ->where('status', 1)
        ->delete();

        return redirect()->route('restocks.index')->with('success', 'Restock group deleted successfully.');
    
}

public function show($id)
{
    $stocks = Stock::where('order_group_id', $id)->get();

    $totalPrice = 0;

    // Convert to array format for use in Blade (optional)
    $stocksArray = $stocks->map(function ($stock) {
        return [
            'name' => $stock->name,
            'quantity' => $stock->quantity,
            'price_per_unit' => $stock->price,
        ];
    })->toArray();

    return view('restocks.show', compact('stocksArray', 'stocks', 'id'));
}

public function verify($order_group_id)
{
    // Get all stocks with the same group ID
    $stocks = Stock::where('order_group_id', $order_group_id)->get();

    if ($stocks->isEmpty()) {
        return redirect()->route('restocks.index')->with('error', 'No stocks found for this group.');
    }

    // Update status to 2 (stock)
    foreach ($stocks as $stock) {
        $stock->status = 2;
        $stock->save();
    }

    return redirect()->route('restocks.index', $order_group_id)->with('success', 'Stock has been successfully verified.');
}



}

