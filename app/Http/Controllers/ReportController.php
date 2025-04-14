<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Page to filter reports
    public function index()
    {
        return view('reports.index');
    }

    // Display the report based on filters
    public function show(Request $request)
    {
        $request->validate([
            'type' => 'required|in:restock,sales',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $type = $request->type;
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // Static dummy data
        $dummyRestockData = [
            ['date' => '2025-01-10', 'details' => 'Restock Item A', 'quantity' => 50, 'total' => 250.00],
            ['date' => '2025-01-12', 'details' => 'Restock Item B', 'quantity' => 30, 'total' => 180.00],
            ['date' => '2025-01-14', 'details' => 'Restock Item C', 'quantity' => 20, 'total' => 100.00],
        ];

        $dummySalesData = [
            ['date' => '2025-01-11', 'details' => 'Sold Item A', 'quantity' => 10, 'total' => 50.00],
            ['date' => '2025-01-13', 'details' => 'Sold Item B', 'quantity' => 5, 'total' => 25.00],
            ['date' => '2025-01-15', 'details' => 'Sold Item C', 'quantity' => 15, 'total' => 75.00],
        ];

        // Filter dummy data based on date range
        if ($type == 'restock') {
            $data = collect($dummyRestockData)->filter(function ($item) use ($startDate, $endDate) {
                return $item['date'] >= $startDate && $item['date'] <= $endDate;
            });
        } else {
            $data = collect($dummySalesData)->filter(function ($item) use ($startDate, $endDate) {
                return $item['date'] >= $startDate && $item['date'] <= $endDate;
            });
        }

        return view('reports.show', compact('data', 'type', 'startDate', 'endDate'));
    }
}
