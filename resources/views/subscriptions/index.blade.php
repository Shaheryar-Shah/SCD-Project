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

            <div class="bg-gray-800 p-4 rounded mb-4">
                <input
                    type="text"
                    id="search-bar"
                    placeholder="Search by customer or subscription plan..."
                    class="w-full p-3 rounded text-gray-300 bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                />
                <ul
                    id="search-results"
                    class="bg-gray-900 text-gray-100 border border-gray-600 mt-2 rounded shadow-lg hidden"
                >
                    <!-- Search results will appear here dynamically -->
                </ul>
            </div>

            <script>
                document.getElementById('search-bar').addEventListener('keyup', function () {
                    const query = this.value;

                    if (query.length > 1) {
                        fetch(`/search-subscriptions?q=${encodeURIComponent(query)}`)
                            .then(response => response.json())
                            .then(data => {
                                const resultsContainer = document.getElementById('search-results');
                                resultsContainer.innerHTML = '';

                                if (data.length > 0) {
                                    resultsContainer.classList.remove('hidden');
                                    data.forEach(result => {
                                        const li = document.createElement('li');
                                        li.classList.add('p-2', 'border-b', 'hover:bg-gray-800', 'cursor-pointer');
                                        li.textContent = `${result.customer_name} (${result.plan_name})`;
                                        resultsContainer.appendChild(li);
                                    });
                                } else {
                                    resultsContainer.innerHTML = '<li class="p-2 text-gray-400">No results found</li>';
                                }
                            });
                    } else {
                        document.getElementById('search-results').classList.add('hidden');
                    }
                });
            </script>

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
