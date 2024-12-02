<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
{
    // Fetch all customers
    $customers = Customer::all();

    // Pass customers to the view
    return view('admin.customers.index', compact('customers'));
}

    // Show the form to create a new customer
    public function create()
    {
        return view('admin.customers.create');
    }

    // Store the newly created customer in the database
    public function store(Request $request)
    {
        // Validate the customer data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the customer
        $customer = Customer::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Redirect back to the customers list or another page with a success message
        return redirect()->route('admin.customers.index')->with('success', 'Customer created successfully.');
    }

    public function destroy($id)
    {
        // Find the customer by ID and delete it
        $customer = Customer::findOrFail($id);
        $customer->delete();

        // Redirect back with a success message
        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully!');
    }

}
