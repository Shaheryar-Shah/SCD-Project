<x-web-layout>

    <section class="text-gray-400 bg-gray-900 body-font overflow-hidden">
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-bold mb-6 text-center text-white">Edit Subscription</h1>

            <!-- Display validation errors -->
            @if($errors->any())
                <div class="bg-red-700 text-white p-4 rounded mb-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('subscriptions.update', $subscription->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Customer selection -->
                <div class="mb-4">
                    <label for="user_id" class="block text-sm font-medium text-gray-100">Customer</label>
                    <select id="user_id" name="user_id" class="block w-full mt-2 p-2 bg-gray-800 text-gray-100 rounded-md" required>
                        <option value="" disabled>Select Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" {{ $subscription->user_id == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Subscription Plan selection -->
                <div class="mb-4">
                    <label for="subscription_plan_id" class="block text-sm font-medium text-gray-100">Subscription Plan</label>
                    <select id="subscription_plan_id" name="subscription_plan_id" class="block w-full mt-2 p-2 bg-gray-800 text-gray-100 rounded-md" required>
                        <option value="" disabled>Select Subscription Plan</option>
                        @foreach($subscriptionPlans as $plan)
                            <option value="{{ $plan->id }}" {{ $subscription->subscription_plan_id == $plan->id ? 'selected' : '' }}>
                                {{ $plan->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Start Date -->
                <div class="mb-4">
                    <label for="start_date" class="block text-sm font-medium text-gray-100">Start Date</label>
                    <input type="date" id="start_date" name="start_date" class="block w-full mt-2 p-2 bg-gray-800 text-gray-100 rounded-md" value="{{ $subscription->start_date->format('Y-m-d') }}" required>
                </div>

                <!-- End Date (Optional) -->
                <div class="mb-4">
                    <label for="end_date" class="block text-sm font-medium text-gray-100">End Date</label>
                    <input type="date" id="end_date" name="end_date" class="block w-full mt-2 p-2 bg-gray-800 text-gray-100 rounded-md" value="{{ $subscription->end_date ? $subscription->end_date->format('Y-m-d') : '' }}">
                </div>

                <div class="mb-4 flex justify-center">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-md shadow hover:bg-blue-600 transition duration-200">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </section>

</x-web-layout>
