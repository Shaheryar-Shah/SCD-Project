<x-web-layout>

    <section class="text-gray-400 bg-gray-900 body-font overflow-hidden">
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-bold mb-4 text-center">Subscriptions</h1>
            <div class="flex justify-end mb-4">
                <a href="{{ route('subscriptions.create') }}" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded shadow hover:bg-blue-600 transition duration-200">Add New Subscription</a>
            </div>

            @if(session('success'))
                <div class="bg-green-900 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full bg-gray-700 border border-gray-500 rounded-lg shadow">
                    <thead class="bg-gray-900">
                        <tr>
                            <th class="py-2 px-4 border-b text-left text-gray-100">ID</th>
                            <th class="py-2 px-4 border-b text-left text-gray-100">Customer</th>
                            <th class="py-2 px-4 border-b text-left text-gray-100">Subscription Plan</th>
                            <th class="py-2 px-4 border-b text-left text-gray-100">Start Date</th>
                            <th class="py-2 px-4 border-b text-left text-gray-100">End Date</th>
                            <th class="py-2 px-4 border-b text-left text-gray-100">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscriptions as $subscription)
                            <tr class="hover:bg-gray-500">
                                <td class="py-2 px-4 border-b text-gray-100">{{ $subscription->id }}</td>
                                <td class="py-2 px-4 border-b text-gray-100">{{ $subscription->customer->name ?? 'No User Assigned' }}</td>
                                <td class="py-2 px-4 border-b text-gray-100">{{ $subscription->subscriptionPlan?->name ?? 'No Plan Assigned' }}</td>
                                <td class="py-2 px-4 border-b text-gray-100">
                                    {{ $subscription->start_date ? $subscription->start_date->format('Y-m-d') : 'N/A' }}
                                </td>
                                <td class="py-2 px-4 border-b text-gray-100">
                                    {{ $subscription->end_date ? $subscription->end_date->format('Y-m-d') : 'N/A' }}
                                </td>
                                <td class="py-2 px-4 border-b">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('subscriptions.edit', $subscription->id) }}" class="bg-yellow-600 text-white font-semibold py-1 px-3 rounded hover:bg-yellow-500 transition duration-200">Edit</a>
                                        <form action="{{ route('subscriptions.destroy', $subscription->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-900 text-white font-semibold py-1 px-3 rounded hover:bg-red-700 transition duration-200" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</x-web-layout>
