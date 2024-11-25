<x-web-layout>

    <div class="container">
        <h1>Available Subscription Plans</h1>

        <div class="row">
            @foreach($plans as $plan)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $plan->name }}</h5>
                            <p class="card-text">{{ $plan->features }}</p>
                            <h6 class="card-subtitle mb-2 text-muted">${{ number_format($plan->price, 2) }}</h6>
                            <a href="{{ route('subscribe', $plan->id) }}" class="btn btn-primary">Subscribe</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-web-layout>
