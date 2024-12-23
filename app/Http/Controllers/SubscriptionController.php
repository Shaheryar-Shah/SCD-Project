<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Customer;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    // Display the list of subscriptions
    public function index()
    {
        $subscriptions = Subscription::with(['customer', 'subscriptionPlan'])->get();
        return view('subscriptions.index', compact('subscriptions'));
    }

    // Show the form for creating a new subscription
    public function create()
    {
        $customers = Customer::all();
        $subscriptionPlans = SubscriptionPlan::all();
        return view('subscriptions.create', compact('customers', 'subscriptionPlans'));
    }

    // Store a new subscription
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:customers,id',
            'subscription_plan_id' => 'required|exists:subscription_plans,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        Subscription::create($validated);

        return redirect()->route('subscriptions.index')->with('success', 'Subscription created successfully!');
    }

    // Show the form to edit a subscription
    public function edit(Subscription $subscription)
    {
        $customers = Customer::all();
        $subscriptionPlans = SubscriptionPlan::all();
        return view('subscriptions.edit', compact('subscription', 'customers', 'subscriptionPlans'));
    }

    // Update an existing subscription
    public function update(Request $request, Subscription $subscription)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:customers,id',
            'subscription_plan_id' => 'required|exists:subscription_plans,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $subscription->update($validated);

        return redirect()->route('subscriptions.index')->with('success', 'Subscription updated successfully!');
    }

    // Delete a subscription
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->route('subscriptions.index')->with('success', 'Subscription deleted successfully!');
    }

    public function search(Request $request)
{
    $query = $request->input('q');

    // Fetch subscriptions matching the query
    $results = DB::table('subscriptions')
        ->join('customers', 'subscriptions.user_id', '=', 'customers.id')
        ->join('subscription_plans', 'subscriptions.subscription_plan_id', '=', 'subscription_plans.id')
        ->where('customers.name', 'like', '%' . $query . '%')
        ->orWhere('subscription_plans.name', 'like', '%' . $query . '%')
        ->select('customers.name as customer_name', 'subscription_plans.name as plan_name')
        ->get();

    return response()->json($results);
}

}
