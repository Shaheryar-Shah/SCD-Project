<x-web-layout>
    <section class="text-gray-400 bg-gray-900 body-font overflow-hidden">
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-bold mb-4 text-center">Subscription Plans</h1>
            <div class="flex justify-end mb-4">
                <a href="{{ route('subscription-plans.create') }}" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded shadow hover:bg-blue-600 transition duration-200">Add New Plan</a>
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
                            <th class="py-2 px-4 border-b text-left text-gray-100">Name</th>
                            <th class="py-2 px-4 border-b text-left text-gray-100">Price</th>
                            <th class="py-2 px-4 border-b text-left text-gray-100">Features</th>
                            <th class="py-2 px-4 border-b text-left text-gray-100">Is Popular</th>
                            <th class="py-2 px-4 border-b text-left text-gray-100">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plans as $plan)
                            <tr class="hover:bg-gray-500">
                                <td class="py-2 px-4 border-b text-gray-100">{{ $plan->id }}</td>
                                <td class="py-2 px-4 border-b text-gray-100">{{ $plan->name }}</td>
                                <td class="py-2 px-4 border-b text-gray-100">${{ number_format($plan->price, 2) }}</td>
                                <td class="py-2 px-4 border-b text-gray-100">{{ $plan->features }}</td>
                                <td class="py-2 px-4 border-b text-gray-100">
                                    {{ $plan->is_popular ? 'Yes' : 'No' }}
                                </td>
                                <td class="py-2 px-4 border-b">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('subscription-plans.edit', $plan->id) }}" class="bg-yellow-600 text-white font-semibold py-1 px-3 rounded hover:bg-yellow-500 transition duration-200">Edit</a>
                                        <form action="{{ route('subscription-plans.destroy', $plan->id) }}" method="POST" style="display:inline;">
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
