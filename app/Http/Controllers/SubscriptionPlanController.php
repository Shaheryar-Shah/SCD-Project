<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;


class SubscriptionPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = SubscriptionPlan::all();

        return view('subscription_plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subscription_plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'features' => 'required|string',
        ]);

        SubscriptionPlan::create($request->all());

        return redirect()->route('subscription-plans.index')->with('success', 'Subscription Plan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $plan = SubscriptionPlan::findOrFail($id);

        return view('subscription_plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'features' => 'required|string',
            'is_popular' => 'boolean', // Validate as a boolean field
        ]);

        $plan = SubscriptionPlan::findOrFail($id);
        $plan->update($request->all());

        return redirect()->route('subscription-plans.index')->with('success', 'Subscription Plan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plan = SubscriptionPlan::findOrFail($id);
        $plan->delete();

        return redirect()->route('subscription-plans.index')->with('success', 'Subscription Plan deleted successfully.');
    }

}


