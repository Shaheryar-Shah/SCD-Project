<x-web-layout>
    <section class="text-gray-400 bg-gray-900 body-font overflow-hidden">
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-bold mb-6 text-center text-white">Edit Subscription Plan</h1>
            <form action="{{ route('subscription-plans.update', $plan->id) }}" method="POST" class="bg-gray-900 shadow-md rounded-lg p-6">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-100 font-semibold mb-2">Name</label>
                    <input type="text" class="form-input w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="name" name="name" value="{{ $plan->name }}" required>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-100 font-semibold mb-2">Price</label>
                    <input type="number" step="0.01" class="form-input w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="price" name="price" value="{{ $plan->price }}" required>
                </div>
                <div class="mb-4">
                    <label for="features" class="block text-gray-100 font-semibold mb-2">Features</label>
                    <textarea class="form-textarea w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="features" name="features" rows="3" required>{{ $plan->features }}</textarea>
                </div>
                <div class="mb-4">
                    <!-- Hidden input to send default value when checkbox is unchecked -->
                    <input type="hidden" name="is_popular" value="0">
                    <label class="block text-gray-100 font-semibold mb-2">
                        <input type="checkbox" name="is_popular" value="1" {{ $plan->is_popular ? 'checked' : '' }}>
                        Mark as Popular
                    </label>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded shadow hover:bg-blue-600 transition duration-200 w-44">Update</button>
                </div>
            </form>
        </div>
    </section>
</x-web-layout>
