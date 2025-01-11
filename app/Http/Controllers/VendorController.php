<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $vendors = Vendor::all(); // Fetch all vendors
        return view('vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('vendors.create'); // Return the vendor creation form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'vendor_name' => 'required|string|max:255',
            'company_id' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'phone_no' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
        ]);

        Vendor::create($request->all()); // Store the validated data in the database

        return redirect()->route('vendors.index')->with('success', 'Vendor added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor): View
    {
        return view('vendors.show', compact('vendor')); // Return the view with the vendor data
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor): View
    {
        return view('vendors.edit', compact('vendor')); // Return the vendor edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor): RedirectResponse
    {
        $request->validate([
            'vendor_name' => 'required|string|max:255',
            'company_id' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'phone_no' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
        ]);

        $vendor->update($request->all()); // Update the vendor with validated data

        return redirect()->route('vendors.index')->with('success', 'Vendor updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor): RedirectResponse
    {
        $vendor->delete(); // Delete the vendor

        return redirect()->route('vendors.index')->with('success', 'Vendor deleted successfully!');
    }
}
