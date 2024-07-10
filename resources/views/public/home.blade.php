<x-layout>
    <x-navbar/>
    <div class="d-flex flex-wrap">
        @forelse($events as $event)
            <div class="card m-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->category }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $event->status }}</h6>
                    <p class="card-text">{{ $event->description }}</p>
                    <p class="card-text">{{ $event->cost }} $</p>
                    <a href="{{route('event.show', ['event'=>$event])}}" class="card-link">View Event</a>
                </div>
            </div>
        @empty
            <div>No events available</div>
        @endforelse
    </div>
</x-layout>
