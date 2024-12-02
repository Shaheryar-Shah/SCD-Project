<x-web-layout>
    <section class="text-gray-400 bg-gray-900 body-font overflow-hidden">
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-bold mb-6 text-center text-white">Create New Customer</h1>

            <!-- Show Success Message -->
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form to Create New Customer -->
            <form action="{{ route('admin.customers.store') }}" method="POST" class="bg-gray-900 shadow-md rounded-lg p-6">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-100 font-semibold mb-2">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-input w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-100 font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-input w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-100 font-semibold mb-2">Password</label>
                    <input type="password" id="password" name="password" class="form-input w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-100 font-semibold mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-input w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded shadow hover:bg-blue-600 transition duration-200 w-44">Save Customer</button>
                </div>
            </form>
        </div>
    </section>
</x-web-layout>
