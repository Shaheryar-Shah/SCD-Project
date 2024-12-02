<x-web-layout>
    <section class="text-gray-400 bg-gray-900 body-font overflow-hidden">
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-bold mb-4 text-center">Customers List</h1>
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.customers.create') }}" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded shadow hover:bg-blue-600 transition duration-200">Add New Customer</a>
            </div>

            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full bg-gray-700 border border-gray-500 rounded-lg shadow">
                    <thead class="bg-gray-900">
                        <tr>
                            <th class="py-2 px-4 border-b text-left text-gray-100">ID</th>
                            <th class="py-2 px-4 border-b text-left text-gray-100">Name</th>
                            <th class="py-2 px-4 border-b text-left text-gray-100">Email</th>
                            <th class="py-2 px-4 border-b text-left text-gray-100">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                            <tr class="hover:bg-gray-500">
                                <td class="py-2 px-4 border-b text-gray-100">{{ $customer->id }}</td>
                                <td class="py-2 px-4 border-b text-gray-100">{{ $customer->name }}</td>
                                <td class="py-2 px-4 border-b text-gray-100">{{ $customer->email }}</td>
                                <td class="py-2 px-4 border-b">
                                    <div class="flex space-x-2">
                                        <!-- Delete Button Form -->
                                        <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 text-white font-semibold py-1 px-3 rounded hover:bg-red-500 transition duration-200">Delete</button>
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
