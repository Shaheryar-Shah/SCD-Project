<x-web-layout>
    <section class="text-gray-400 bg-gray-900 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-white">Pricing</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">
                    We offer several plans with different pricing and features.
                </p>
                <div class="flex mx-auto border-2 border-blue-600 rounded overflow-hidden mt-6">
                    <button class="py-1 px-4 bg-blue-600 text-white focus:outline-none">Monthly</button>
                    <button class="py-1 px-4 text-gray-300 focus:outline-none">Annually</button>
                </div>
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach($plans as $plan)
                    <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                        <div class="h-full p-6 rounded-lg border-2 {{ $plan->is_popular ? 'border-blue-600' : 'border-gray-700' }} flex flex-col relative overflow-hidden">
                            @if($plan->is_popular)
                                <span class="bg-blue-600 text-white px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl">POPULAR</span>
                            @endif
                            <h2 class="text-sm tracking-widest text-gray-400 title-font mb-1 font-medium">{{ strtoupper($plan->name) }}</h2>
                            <h1 class="text-5xl text-white leading-none flex items-center pb-4 mb-4 border-b border-gray-800">
                                <span>{{ $plan->price === 0 ? 'Free' : '$' . $plan->price }}</span>
                                @if($plan->price > 0)
                                    <span class="text-lg ml-1 font-normal text-gray-400">/mo</span>
                                @endif
                            </h1>
                            @foreach(explode(',', $plan->features) as $feature)
                                <p class="flex items-center text-gray-400 mb-2">
                                    <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-800 text-gray-500 rounded-full flex-shrink-0">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                            <path d="M20 6L9 17l-5-5"></path>
                                        </svg>
                                    </span>{{ $feature }}
                                </p>
                            @endforeach
                            <button class="flex items-center mt-auto text-white {{ $plan->is_popular ? 'bg-blue-900' : 'bg-gray-800' }} border-0 py-2 px-4 w-full focus:outline-none hover:{{ $plan->is_popular ? 'bg-blue-600' : 'bg-gray-700' }} rounded">
                                {{ $plan->price === 0 ? 'Get Free' : 'Get ' . ucfirst($plan->name) }}
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </button>
                            <p class="text-xs text-gray-400 mt-3">T&C and GST apply and are subject to change.</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-web-layout>
